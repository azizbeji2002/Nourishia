<?php

namespace App\Entity;

use App\Repository\DocteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocteurRepository::class)]
class Docteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\OneToMany(targetEntity: Consultation::class, mappedBy: 'docteur')]
    private Collection $consultations;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMotPasse(): ?string
    {
        return $this->mot_passe;
    }

    public function setMotPasse(string $mot_passe): static
    {
        $this->mot_passe = $mot_passe;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): static
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations->add($consultation);
            $consultation->setDocteurId($this);
        }
        return $this;
    }

    public function removeConsultation(Consultation $consultation): static
    {
        if ($this->consultations->removeElement($consultation)) {
            if ($consultation->getDocteurId() === $this) {
                $consultation->setDocteurId(null);
            }
        }
        return $this;
    }
}
