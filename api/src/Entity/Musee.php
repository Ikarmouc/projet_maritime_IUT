<?php

namespace App\Entity;

use App\Repository\MuseeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MuseeRepository::class)
 */
class Musee
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
    private $addresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $joursFermeture;

    /**
     * @ORM\Column(type="integer")
     */
    private $horaireOuverture;

    /**
     * @ORM\Column(type="integer")
     */
    private $horaireFermeture;

    /**
     * @ORM\OneToMany(targetEntity=Bateau::class, mappedBy="musee")
     */
    private $Bateau;

    public function __construct()
    {
        $this->Bateau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getJoursFermeture(): ?string
    {
        return $this->joursFermeture;
    }

    public function setJoursFermeture(string $joursFermeture): self
    {
        $this->joursFermeture = $joursFermeture;

        return $this;
    }

    public function getHoraireOuverture(): ?int
    {
        return $this->horaireOuverture;
    }

    public function setHoraireOuverture(int $horaireOuverture): self
    {
        $this->horaireOuverture = $horaireOuverture;

        return $this;
    }

    public function getHoraireFermeture(): ?int
    {
        return $this->horaireFermeture;
    }

    public function setHoraireFermeture(int $horaireFermeture): self
    {
        $this->horaireFermeture = $horaireFermeture;

        return $this;
    }

    /**
     * @return Collection|Bateau[]
     */
    public function getBateau(): Collection
    {
        return $this->Bateau;
    }

    public function addBateau(Bateau $bateau): self
    {
        if (!$this->Bateau->contains($bateau)) {
            $this->Bateau[] = $bateau;
            $bateau->setMusee($this);
        }

        return $this;
    }

    public function removeBateau(Bateau $bateau): self
    {
        if ($this->Bateau->removeElement($bateau)) {
            // set the owning side to null (unless already changed)
            if ($bateau->getMusee() === $this) {
                $bateau->setMusee(null);
            }
        }

        return $this;
    }
}
