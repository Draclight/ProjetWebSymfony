<?php

namespace App\Entity;

use App\Repository\CadeauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CadeauRepository::class)
 */
class Cadeau
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
    private $designation;

    /**
     * @ORM\Column(type="integer")
     */
    private $age_minimum;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="cadeaus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity=Liste::class, mappedBy="cadeau")
     */
    private $listes;

    public function __construct()
    {
        $this->listes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAgeMinimum(): ?int
    {
        return $this->age_minimum;
    }

    public function setAgeMinimum(int $age_minimum): self
    {
        $this->age_minimum = $age_minimum;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Liste[]
     */
    public function getListes(): Collection
    {
        return $this->listes;
    }

    public function addListe(Liste $liste): self
    {
        if (!$this->listes->contains($liste)) {
            $this->listes[] = $liste;
            $liste->addCadeau($this);
        }

        return $this;
    }

    public function removeListe(Liste $liste): self
    {
        if ($this->listes->removeElement($liste)) {
            $liste->removeCadeau($this);
        }

        return $this;
    }
    public function __toString() {
        return $this->getDesignation();
        }
}
