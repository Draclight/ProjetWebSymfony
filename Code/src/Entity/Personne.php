<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne
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
    private $nom_prenom;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\ManyToOne(targetEntity=Adresse::class, inversedBy="personnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @ORM\OneToOne(targetEntity=Liste::class, mappedBy="personne", cascade={"persist", "remove"})
     */
    private $liste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nom_prenom;
    }

    public function setNomPrenom(string $nom_prenom): self
    {
        $this->nom_prenom = $nom_prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getListe(): ?Liste
    {
        return $this->liste;
    }

    public function setListe(Liste $liste): self
    {
        // set the owning side of the relation if necessary
        if ($liste->getPersonne() !== $this) {
            $liste->setPersonne($this);
        }

        $this->liste = $liste;

        return $this;
    }

    public function __toString() {
        return $this->getNomPrenom();
        }
}
