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
     * @Groups({"ListeLivre"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ListeLivre"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ListeLivre"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ListeLivre"})
     */
    private $materiau;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ListeLivre"})
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ListeLivre"})
     */
    private $longueur;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ListeLivre"})
     */
    private $largeur;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ListeLivre"})
     */
    private $poids;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"ListeLivre"})
     */
    private $capacitePersonne;

    /**
     * @ORM\OneToOne(targetEntity=HistoireBateau::class, mappedBy="Bateau", cascade={"persist", "remove"})
     * @Groups({"ListeLivre"})
     */
    private $histoireBateau;

    /**
     * @ORM\OneToOne(targetEntity=LocalisationBateau::class, mappedBy="Bateau", cascade={"persist", "remove"})
     * @Groups({"ListeLivre"})
     */
    private $localisationBateau;

    /**
     * @ORM\OneToMany(targetEntity=PlanningVisite::class, mappedBy="Bateau")
     * @Groups({"ListeLivre"})
     */
    private $planningVisites;

    /**
     * @ORM\ManyToOne(targetEntity=Musee::class, inversedBy="Bateau")
     * @Groups({"ListeLivre"})
     */
    private $musee;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"temoignage","ListeLivre"})
     */
    private $temoignageAudio;

    /**
     * @ORM\Column(type="text")
     * @Groups({"ListeLivre","temoignage"})
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
