<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\StatutRendez; 
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Patient::class, inversedBy: 'rendezVous')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Le patient est obligatoire.")]
    private ?Patient $patient = null;

    #[ORM\ManyToOne(targetEntity: Docteur::class, inversedBy: 'rendezVous')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Le docteur est obligatoire.")]
    private ?Docteur $docteur = null;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotNull(message: "La date et l'heure du rendez-vous sont obligatoires.")]
    #[Assert\Type("\DateTimeInterface", message: "La date doit être une instance de DateTime.")]
    #[Assert\GreaterThan("today", message: "La date du rendez-vous doit être dans le futur.")]
    private ?\DateTimeInterface $dateRdv = null;

    #[ORM\Column(type: 'string', enumType: StatutRendez::class)]
    private StatutRendez $statut = StatutRendez::En_Attente; 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;
        return $this;
    }

    public function getDocteur(): ?Docteur
    {
        return $this->docteur;
    }

    public function setDocteur(?Docteur $docteur): static
    {
        $this->docteur = $docteur;
        return $this;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->dateRdv;
    }

    public function setDateRdv(\DateTimeInterface $dateRdv): static
    {
        $this->dateRdv = $dateRdv;
        return $this;
    }

    public function getStatut(): StatutRendez
    {
        return $this->statut;
    }

    public function setStatut(StatutRendez $statut): static
    {
        $this->statut = $statut;
        return $this;
    }
}
