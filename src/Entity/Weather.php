<?php

namespace App\Entity;

use App\Repository\WeatherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherRepository::class)
 */
class Weather
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deltaTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $temp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $feelsLike;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tempMin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tempMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pressure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $humidity;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="weathers")
     */
    private $location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeltaTime(): ?int
    {
        return $this->deltaTime;
    }

    public function setDeltaTime(?int $deltaTime): self
    {
        $this->deltaTime = $deltaTime;

        return $this;
    }

    public function getTemp(): ?string
    {
        return $this->temp;
    }

    public function setTemp(?string $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getFeelsLike(): ?string
    {
        return $this->feelsLike;
    }

    public function setFeelsLike(?string $feelsLike): self
    {
        $this->feelsLike = $feelsLike;

        return $this;
    }

    public function getTempMin(): ?string
    {
        return $this->tempMin;
    }

    public function setTempMin(?string $tempMin): self
    {
        $this->tempMin = $tempMin;

        return $this;
    }

    public function getTempMax(): ?string
    {
        return $this->tempMax;
    }

    public function setTempMax(?string $tempMax): self
    {
        $this->tempMax = $tempMax;

        return $this;
    }

    public function getPressure(): ?string
    {
        return $this->pressure;
    }

    public function setPressure(?string $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(?string $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "[{$this->id}] temp: {$this->temp}";
    }
}
