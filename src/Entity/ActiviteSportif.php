<?php

namespace App\Entity;

use App\Repository\ActiviteSportifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteSportifRepository::class)]
class ActiviteSportif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idActivite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $duree = null;

    #[ORM\Column(nullable: true)]
    private ?int $frequence = null;

    #[ORM\ManyToOne(targetEntity: PlanNutritionnels::class, inversedBy: 'activites')]
#[ORM\JoinColumn(name: "plan_id", referencedColumnName: "idplan", nullable: false, onDelete: "CASCADE")]
private ?PlanNutritionnels $plan = null;

    // ✅ Removed unnecessary constructor

    public function getIdActivite(): ?int
    {
        return $this->idActivite;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): static
    {
        $this->duree = $duree;
        return $this;
    }

    public function getFrequence(): ?int
    {
        return $this->frequence;
    }

    public function setFrequence(?int $frequence): static
    {
        $this->frequence = $frequence;
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
