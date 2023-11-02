<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $count;

    /**
     * @ORM\OneToMany(targetEntity=Weather::class, mappedBy="location",cascade={"persist"})
     */
    private $weathers;

    public function __construct()
    {
        $this->weathers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return Collection<int, Weather>
     */
    public function getWeathers(): Collection
    {
        return $this->weathers;
    }

    public function addWeather(Weather $weather): self
    {
        if (!$this->weathers->contains($weather)) {
            $this->weathers[] = $weather;
            $weather->setLocation($this);
        }

        return $this;
    }

    public function removeWeather(Weather $weather): self
    {
        if ($this->weathers->removeElement($weather)) {
            // set the owning side to null (unless already changed)
            if ($weather->getLocation() === $this) {
                $weather->setLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "[{$this->id}] City: {$this->name}";
    }
}
