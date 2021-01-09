<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeRepository::class)
 */
class Liste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Personne::class, mappedBy="liste")
     */
    private $personne;

    /**
     * @ORM\ManyToMany(targetEntity=Cadeau::class, inversedBy="listes")
     */
    private $cadeau;

    public function __construct()
    {
        $this->personne = new ArrayCollection();
        $this->cadeau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Personne[]
     */
    public function getPersonne(): Collection
    {
        return $this->personne;
    }

    public function addPersonne(Personne $personne): self
    {
        if (!$this->personne->contains($personne)) {
            $this->personne[] = $personne;
            $personne->setListe($this);
        }

        return $this;
    }

    public function removePersonne(Personne $personne): self
    {
        if ($this->personne->removeElement($personne)) {
            // set the owning side to null (unless already changed)
            if ($personne->getListe() === $this) {
                $personne->setListe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cadeau[]
     */
    public function getCadeau(): Collection
    {
        return $this->cadeau;
    }

    public function addCadeau(Cadeau $cadeau): self
    {
        if (!$this->cadeau->contains($cadeau)) {
            $this->cadeau[] = $cadeau;
        }

        return $this;
    }

    public function removeCadeau(Cadeau $cadeau): self
    {
        $this->cadeau->removeElement($cadeau);

        return $this;
    }
}
