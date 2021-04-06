<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BateauRepository::class)
 */
class Bateau
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $materiau;

    /**
     * @ORM\Column(type="float")
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="float")
     */
    private $longueur;

    /**
     * @ORM\Column(type="float")
     */
    private $largeur;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacitePersonne;

    /**
     * @ORM\OneToOne(targetEntity=HistoireBateau::class, mappedBy="Bateau", cascade={"persist", "remove"})
     */
    private $histoireBateau;

    /**
     * @ORM\OneToOne(targetEntity=LocalisationBateau::class, mappedBy="Bateau", cascade={"persist", "remove"})
     */
    private $localisationBateau;

    /**
     * @ORM\OneToMany(targetEntity=PlanningVisite::class, mappedBy="Bateau")
     */
    private $planningVisites;

    /**
     * @ORM\ManyToOne(targetEntity=Musee::class, inversedBy="Bateau")
     */
    private $musee;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("temoignage")
     */
    private $temoignageAudio;

    /**
     * @ORM\Column(type="text")
     * @Groups("temoignage")
     */
    private $temoignageTexte;


    public function __construct()
    {
        $this->planningVisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMateriau(): ?string
    {
        return $this->materiau;
    }

    public function setMateriau(string $materiau): self
    {
        $this->materiau = $materiau;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(int $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getCapacitePersonne(): ?int
    {
        return $this->capacitePersonne;
    }

    public function setCapacitePersonne(int $capacitePersonne): self
    {
        $this->capacitePersonne = $capacitePersonne;

        return $this;
    }

    public function getHistoireBateau(): ?HistoireBateau
    {
        return $this->histoireBateau;
    }

    public function setHistoireBateau(HistoireBateau $histoireBateau): self
    {
        // set the owning side of the relation if necessary
        if ($histoireBateau->getBateau() !== $this) {
            $histoireBateau->setBateau($this);
        }

        $this->histoireBateau = $histoireBateau;

        return $this;
    }

    public function getLocalisationBateau(): ?LocalisationBateau
    {
        return $this->localisationBateau;
    }

    public function setLocalisationBateau(LocalisationBateau $localisationBateau): self
    {
        // set the owning side of the relation if necessary
        if ($localisationBateau->getBateau() !== $this) {
            $localisationBateau->setBateau($this);
        }

        $this->localisationBateau = $localisationBateau;

        return $this;
    }

    /**
     * @return Collection|PlanningVisite[]
     */
    public function getPlanningVisites(): Collection
    {
        return $this->planningVisites;
    }

    public function addPlanningVisite(PlanningVisite $planningVisite): self
    {
        if (!$this->planningVisites->contains($planningVisite)) {
            $this->planningVisites[] = $planningVisite;
            $planningVisite->setBateau($this);
        }

        return $this;
    }

    public function removePlanningVisite(PlanningVisite $planningVisite): self
    {
        if ($this->planningVisites->removeElement($planningVisite)) {
            // set the owning side to null (unless already changed)
            if ($planningVisite->getBateau() === $this) {
                $planningVisite->setBateau(null);
            }
        }

        return $this;
    }

    public function getMusee(): ?Musee
    {
        return $this->musee;
    }

    public function setMusee(?Musee $musee): self
    {
        $this->musee = $musee;

        return $this;
    }


    public function getTemoignageAudio(): ?string
    {
        return $this->temoignageAudio;
    }

    public function setTemoignageAudio(string $temoignageAudioAdd): self
    {
        $this->temoignageAudio = $temoignageAudioAdd;
        return $this;
    }

    public function getTemoignageTexte(): ?string
    {
        return $this->temoignageAudio;
    }

    public function setTemoignageTexte(string $temoignageTexteAdd): self
    {
        $this->temoignageTexte = $temoignageTexteAdd;
        return $this;
    }
}
