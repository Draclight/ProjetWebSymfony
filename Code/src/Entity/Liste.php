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
     * @ORM\OneToOne(targetEntity=Personne::class, inversedBy="liste", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    /**
     * @ORM\ManyToMany(targetEntity=Cadeau::class, inversedBy="listes")
     */
    private $cadeau;

    public function __construct()
    {
        $this->cadeau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(Personne $personne): self
    {
        $this->personne = $personne;

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

    public function __toString()
    {
        return (string) $this->getPersonne();
    }
}
