<?php

namespace App\Entity;

use App\Repository\QuestionnaireResponseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionnaireResponseRepository::class)]
class QuestionnaireResponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Fix the patient relationship - make sure it references idPatient correctly
    #[ORM\ManyToOne(inversedBy: 'questionnaireResponses')]
    #[ORM\JoinColumn(name: "patient_id", referencedColumnName: "id_patient", nullable: false)]
    private ?Patient $patient = null;

    // Fix the questionnaire relationship
    #[ORM\ManyToOne(inversedBy: 'responses')]
    #[ORM\JoinColumn(name: "questionnaire_id", referencedColumnName: "id", nullable: false)]
    private ?Questionnaire $questionnaire = null;

    #[ORM\Column(type: Types::JSON)]
    private array $answers = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $submittedAt = null;

    // Fix the plan relationship
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "plan_id", referencedColumnName: "idplan", nullable: true)]
    private ?PlanNutritionnels $assignedPlan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $doctorNotes = null;

    public function __construct()
    {
        $this->submittedAt = new \DateTimeImmutable();
        $this->answers = [];
        $this->status = 'pending';
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestionnaire(): ?Questionnaire
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(?Questionnaire $questionnaire): static
    {
        $this->questionnaire = $questionnaire;
        return $this;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): static
    {
        $this->answers = $answers;
        return $this;
    }

    public function getSubmittedAt(): ?\DateTimeImmutable
    {
        return $this->submittedAt;
    }

    public function setSubmittedAt(\DateTimeImmutable $submittedAt): static
    {
        $this->submittedAt = $submittedAt;
        return $this;
    }

    public function getAssignedPlan(): ?PlanNutritionnels
    {
        return $this->assignedPlan;
    }

    public function setAssignedPlan(?PlanNutritionnels $assignedPlan): static
    {
        $this->assignedPlan = $assignedPlan;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getDoctorNotes(): ?string
    {
        return $this->doctorNotes;
    }

    public function setDoctorNotes(?string $doctorNotes): static
    {
        $this->doctorNotes = $doctorNotes;
        return $this;
    }
}