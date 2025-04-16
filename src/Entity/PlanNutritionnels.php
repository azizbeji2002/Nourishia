<?php

namespace App\Entity;

use App\Repository\PlanNutritionnelsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: PlanNutritionnelsRepository::class)]
class PlanNutritionnels
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $idplan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alimentRecommende = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alimentEvite = null;

    #[ORM\OneToMany(targetEntity: ActiviteSportif::class, mappedBy: 'plan')]
    private Collection $activites;

    public function getIdPlan(): ?int
    {
        return $this->idplan;
    }

    public function getAlimentRecommende(): ?string
    {
        return $this->alimentRecommende;
    }

    public function setAlimentRecommende(?string $alimentRecommende): static
    {
        $this->alimentRecommende = $alimentRecommende;
        return $this;
    }

    public function getAlimentEvite(): ?string
    {
        return $this->alimentEvite;
    }

    public function setAlimentEvite(?string $alimentEvite): static
    {
        $this->alimentEvite = $alimentEvite;
        return $this;
    }

    public function addActivite(ActiviteSportif $activite): static
    {
        if (!$this->activites->contains($activite)) {
            $this->activites->add($activite);
            $activite->setPlan($this);
        }
        return $this;
    }
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function removeActivite(ActiviteSportif $activite): static
    {
        if ($this->activites->removeElement($activite)) {
            if ($activite->getPlan() === $this) {
                $activite->setPlan(null);
            }
        }
        return $this;
    }
}
