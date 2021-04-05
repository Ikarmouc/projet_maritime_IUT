<?php

namespace App\Entity;

use App\Repository\PlanningVisiteRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass=PlanningVisiteRepository::class)
 */
class PlanningVisite
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $heureDebut ;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPersonneInscrites;

    /**
     * @ORM\Column(type="date")
     */
    private $jour;

    /**
     * @ORM\ManyToOne(targetEntity=Bateau::class, inversedBy="planningVisites")
     */
    private $Bateau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTime $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getNbPersonneInscrites(): ?int
    {
        return $this->nbPersonneInscrites;
    }

    public function setNbPersonneInscrites(int $nbPersonneInscrites): self
    {
        $this->nbPersonneInscrites = $nbPersonneInscrites;

        return $this;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTime $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getBateau(): ?Bateau
    {
        return $this->Bateau;
    }

    public function setBateau(?Bateau $Bateau): self
    {
        $this->Bateau = $Bateau;

        return $this;
    }
}
