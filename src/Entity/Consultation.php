<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\StatutConsultation;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Patient::class, inversedBy: 'consultations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Le patient est obligatoire.")]
    private ?Patient $patient_id = null;

    #[ORM\ManyToOne(targetEntity: Docteur::class, inversedBy: 'consultations')]
#[ORM\JoinColumn(nullable: false)]
#[Assert\NotNull(message: "Le docteur est obligatoire.")]
private ?Docteur $docteur_id = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThan(
        value: "today",
        message: "La date de consultation ne peut pas être dans le passé."
    )]
    private ?\DateTimeInterface $date_consultation = null;

    #[ORM\Column(type: 'string', enumType: StatutConsultation::class)]
    private StatutConsultation $statut;

    // New fields based on your image
    #[ORM\Column(type: Types::STRING)]
    #[Assert\NotBlank(message: "Les conseils sont obligatoires.")]
    private ?string $conseils = null;

    #[ORM\Column(type: Types::FLOAT)]
    #[Assert\NotNull(message: "Le poids est obligatoire.")]
    private ?float $poids = null;

    #[ORM\Column(type: Types::FLOAT)]
    #[Assert\NotNull(message: "La tension est obligatoire.")]
    private ?float $tension = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $process_grossesse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getPatientId(): ?Patient
    {
        return $this->patient_id;
    }

    public function setPatientId(?Patient $patient_id): static
    {
        $this->patient_id = $patient_id;
        return $this;
    }

    public function getDocteurId(): ?Docteur
    {
        return $this->docteur_id;
    }

public function setDocteurId(?Docteur $docteur_id): static
    {
        $this->docteur_id = $docteur_id;
        return $this;
    }

    public function getDateConsultation(): ?\DateTimeInterface
    {
        return $this->date_consultation;
    }

    public function setDateConsultation(\DateTimeInterface $date_consultation): static
    {
        $this->date_consultation = $date_consultation;
        return $this;
    }

    public function getStatut(): StatutConsultation
    {
        return $this->statut;
    }

    public function setStatut(StatutConsultation $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    // Getter and Setter for the new fields

    public function getConseils(): ?string
    {
        return $this->conseils;
    }

    public function setConseils(string $conseils): static
    {
        $this->conseils = $conseils;
        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;
        return $this;
    }

    public function getTension(): ?float
    {
        return $this->tension;
    }

    public function setTension(float $tension): static
    {
        $this->tension = $tension;
        return $this;
    }

    public function getProcessGrossesse(): ?\DateTimeInterface
    {
        return $this->process_grossesse;
    }

    public function setProcessGrossesse(\DateTimeInterface $process_grossesse): static
    {
        $this->process_grossesse = $process_grossesse;
        return $this;
    }
}
