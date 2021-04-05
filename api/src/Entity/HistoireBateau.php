<?php

namespace App\Entity;

use App\Repository\HistoireBateauRepository;
use Cassandra\Date;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Array_;
use function Sodium\add;

/**
 * @ORM\Entity(repositoryClass=HistoireBateauRepository::class)
 */
class HistoireBateau
{
    /**
     * @ORM\Id
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
     * @ORM\Column(type="date")
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
     * @ORM\Column(type="text")
     */
    private $historique;

    /**
     * @ORM\OneToOne(targetEntity=Bateau::class, inversedBy="histoireBateau", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bateau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id= $id;
        return $this;
    }

    public function getAnneeLancement(): ?\DateTimeInterface
    {
        return $this->anneeLancement;
    }

    public function setAnneeLancement(\DateTime $anneeLancement): self
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

    public function getAnneeEntreeCollection(): ?\DateTimeInterface
    {
        return $this->anneeEntreeCollection;
    }

    public function setAnneeEntreeCollection(\DateTime $anneeEntreeCollection): self
    {
        $this->anneeEntreeCollection = $anneeEntreeCollection;

        return $this;
    }

    public function getDateMonumentHistorique(): ?\DateTimeInterface
    {
        return $this->dateMonumentHistorique;
    }

    public function setDateMonumentHistorique(\DateTime $dateMonumentHistorique): self
    {
        $this->dateMonumentHistorique = $dateMonumentHistorique;

        return $this;
    }

    public function getAnneeRestauration(): ?\DateTimeInterface
    {
        return $this->anneeRestauration;
    }

    public function setAnneeRestauration(\DateTime $anneeRestauration): self
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
