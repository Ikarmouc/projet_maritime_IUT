<?php

namespace App\Entity;

use App\Repository\MeteoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MeteoRepository::class)
 */
class Meteo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperature;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperature_ressentie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperature_min;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperature_max;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vitesse_vent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $humidite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTemperatureRessentie(): ?string
    {
        return $this->temperature_ressentie;
    }

    public function setTemperatureRessentie(string $temperature_ressentie): self
    {
        $this->temperature_ressentie = $temperature_ressentie;

        return $this;
    }

    public function getTemperatureMin(): ?string
    {
        return $this->temperature_min;
    }

    public function setTemperatureMin(string $temperature_min): self
    {
        $this->temperature_min = $temperature_min;

        return $this;
    }

    public function getTemperatureMax(): ?string
    {
        return $this->temperature_max;
    }

    public function setTemperatureMax(string $temperature_max): self
    {
        $this->temperature_max = $temperature_max;

        return $this;
    }

    public function getVitesseVent(): ?string
    {
        return $this->vitesse_vent;
    }

    public function setVitesseVent(string $vitesse_vent): self
    {
        $this->vitesse_vent = $vitesse_vent;

        return $this;
    }

    public function getHumidite(): ?string
    {
        return $this->humidite;
    }

    public function setHumidite(string $humidite): self
    {
        $this->humidite = $humidite;

        return $this;
    }
}
