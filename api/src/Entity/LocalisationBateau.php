<?php

namespace App\Entity;

use App\Repository\LocalisationBateauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalisationBateauRepository::class)
 */
class LocalisationBateau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuActuel;

    /**
     * @ORM\OneToOne(targetEntity=Bateau::class, inversedBy="localisationBateau", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bateau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?int
    {
        return $this->latitude;
    }

    public function setLatitude(int $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?int
    {
        return $this->longitude;
    }

    public function setLongitude(int $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLieuActuel(): ?string
    {
        return $this->lieuActuel;
    }

    public function setLieuActuel(string $lieuActuel): self
    {
        $this->lieuActuel = $lieuActuel;

        return $this;
    }

    public function getBateau(): ?Bateau
    {
        return $this->Bateau;
    }

    public function setBateau(Bateau $Bateau): self
    {
        $this->Bateau = $Bateau;

        return $this;
    }

}
