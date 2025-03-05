<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idPatient = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(targetEntity: PlanNutritionnels::class, inversedBy: 'patients')]
    #[ORM\JoinColumn(name: "plan_id", referencedColumnName: "idplan", nullable: false)]
    private ?PlanNutritionnels $plan = null;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: QuestionnaireResponse::class)]
    private Collection $questionnaireResponses;

    public function __construct()
{
    // Make sure to add this to your constructor
    $this->questionnaireResponses = new ArrayCollection();
}
/**
 * @return Collection<int, QuestionnaireResponse>
 */
public function getQuestionnaireResponses(): Collection
{
    return $this->questionnaireResponses;
}

public function addQuestionnaireResponse(QuestionnaireResponse $questionnaireResponse): static
{
    if (!$this->questionnaireResponses->contains($questionnaireResponse)) {
        $this->questionnaireResponses->add($questionnaireResponse);
        $questionnaireResponse->setPatient($this);
    }

    return $this;
}

public function removeQuestionnaireResponse(QuestionnaireResponse $questionnaireResponse): static
{
    if ($this->questionnaireResponses->removeElement($questionnaireResponse)) {
        // set the owning side to null (unless already changed)
        if ($questionnaireResponse->getPatient() === $this) {
            $questionnaireResponse->setPatient(null);
        }
    }

    return $this;
}


    public function getIdPatient(): ?int
    {
        return $this->idPatient;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
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

    public function getPlan(): ?PlanNutritionnels
    {
        return $this->plan;
    }

    public function setPlan(?PlanNutritionnels $plan): static
    {
        $this->plan = $plan;
        return $this;
    }
}
