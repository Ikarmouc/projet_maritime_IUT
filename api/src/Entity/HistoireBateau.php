<?php

namespace App\Entity;

use App\Repository\HistoireBateauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoireBateauRepository::class)
 */
class HistoireBateau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $anneeLancement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $constructeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $anneeEntreeCollection;

    /**
     * @ORM\Column(type="date")
     */
    private $dateMonumentHistorique;

    /**
     * @ORM\Column(type="date")
     */
    private $anneeRestauration;

    /**
     * @ORM\Column(type="array")
     */
    private $historique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temoignage;

    /**
     * @ORM\OneToOne(targetEntity=Bateau::class, inversedBy="histoireBateau", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bateau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeLancement(): ?int
    {
        return $this->anneeLancement;
    }

    public function setAnneeLancement(int $anneeLancement): self
    {
        $this->anneeLancement = $anneeLancement;

        return $this;
    }

    public function getConstructeur(): ?string
    {
        return $this->constructeur;
    }

    public function setConstructeur(string $constructeur): self
    {
        $this->constructeur = $constructeur;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getAnneeEntreeCollection(): ?int
    {
        return $this->anneeEntreeCollection;
    }

    public function setAnneeEntreeCollection(int $anneeEntreeCollection): self
    {
        $this->anneeEntreeCollection = $anneeEntreeCollection;

        return $this;
    }

    public function getDateMonumentHistorique(): ?string
    {
        return $this->dateMonumentHistorique;
    }

    public function setDateMonumentHistorique(string $dateMonumentHistorique): self
    {
        $this->dateMonumentHistorique = $dateMonumentHistorique;

        return $this;
    }

    public function getAnneeRestauration(): ?int
    {
        return $this->anneeRestauration;
    }

    public function setAnneeRestauration(int $anneeRestauration): self
    {
        $this->anneeRestauration = $anneeRestauration;

        return $this;
    }

    public function getHistorique(): ?string
    {
        return $this->historique;
    }

    public function setHistorique(string $historique): self
    {
        $this->historique = $historique;

        return $this;
    }

    public function getTemoignage(): ?string
    {
        return $this->temoignage;
    }

    public function setTemoignage(string $temoignage): self
    {
        $this->temoignage = $temoignage;

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
