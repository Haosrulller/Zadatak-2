<?php

namespace App\Command;

use App\Entity\Location;
use App\Entity\Weather;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\LocationRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UpdateWeatherCommand extends Command
{
    const APP_ID = '1ce49262beb33918a2ed7df04895c344';
    protected static $defaultName = 'app:update:weather';
    protected static $defaultDescription = 'Updates weather for all locations';
    private  LocationRepository $locationRepository;
    private  HttpClientInterface $client;

    public function __construct(
        LocationRepository $locationRepository,
        HttpClientInterface $client
    ){
        $this->locationRepository = $locationRepository;
        $this->client = $client;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('locationId', InputArgument::OPTIONAL, 'id of location to update')
            ->addOption('all', null, InputOption::VALUE_NONE, 'updates all locations')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $locationId = $input->getArgument('locationId');

        if ($locationId) {
            $io->success(sprintf('Updating Location: %s', $locationId));
            $location = $this->locationRepository->find($locationId);
            if ($location) {
                $this->updateWeather($location, $io);
                $this->locationRepository->save($location);
            }

        }

        if ($input->getOption('all')) {
            $locations = $this->locationRepository->findAll();
            foreach ($locations as $location) {
                $this->updateWeather($location, $io);
                $this->locationRepository->save($location);
            }
        }

        $io->success('Done.');

        return 0;
    }

    private function updateWeather(Location $location, SymfonyStyle $io) {
        $response = $this->client->request(
            'GET',
            'https://api.openweathermap.org/data/2.5/forecast?q='.$location->getName().'&cnt='.$location->getCount().'&appid=' . self::APP_ID
        );

        $statusCode = $response->getStatusCode();
//        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
//        $content = $response->getContent();
        $data = $response->toArray();
        if (count($data)) {
            if (isset($data['list'])) {
                $list = $data['list'];
                if (count($list)) {
                    $oldWeathers = $location->getWeathers();
                    foreach ($oldWeathers as $oldWeather) {
                        $location->removeWeather($oldWeather);
                    }
                }
                foreach ($list as $weatherItem) {
                    $weather = new Weather();
                    $weather->setDeltaTime($weatherItem['dt']??null);
                    $weather->setTemp($weatherItem['main']['temp']??null);
                    $weather->setFeelsLike($weatherItem['main']['feels_like']??null);
                    $weather->setTempMin($weatherItem['main']['temp_min']??null);
                    $weather->setTempMax($weatherItem['main']['temp_max']??null);
                    $weather->setPressure($weatherItem['main']['pressure']??null);
                    $weather->setHumidity($weatherItem['main']['humidity']??null);
                    $location->addWeather($weather);
                    $io->note('processing weather: ' .$weather);
                }
            }
            $location->setLatitude($data['city']['coord']['lat']??null);
            $location->setLongitude($data['city']['coord']['lon']??null);
            $location->setCountry($data['city']['country']??null);
            $io->success('Updated Location [' . $location->getId() . '] ' . $location->getName());
        }
    }
}
