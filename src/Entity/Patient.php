<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    /**
     * @var Collection<int, DossiersMedicaux>
     */
    #[ORM\OneToMany(targetEntity: DossiersMedicaux::class, mappedBy: 'patient_id')]
    private Collection $Docteur_id;

    /**
     * @var Collection<int, Consultation>
     */
    #[ORM\OneToMany(targetEntity: Consultation::class, mappedBy: 'patient_id')]
    private Collection $docteur_id;

    /**
     * @var Collection<int, Consultation>
     */
    #[ORM\OneToMany(targetEntity: Consultation::class, mappedBy: 'patient_id')]
    private Collection $patient_id;

    

    public function __construct()
    {
        $this->Docteur_id = new ArrayCollection();
        $this->docteur_id = new ArrayCollection();
        $this->patient_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, DossiersMedicaux>
     */
    public function getDocteurId(): Collection
    {
        return $this->Docteur_id;
    }

    public function addDocteurId(DossiersMedicaux $docteurId): static
    {
        if (!$this->Docteur_id->contains($docteurId)) {
            $this->Docteur_id->add($docteurId);
            $docteurId->setPatientId($this);
        }

        return $this;
    }

    public function removeDocteurId(DossiersMedicaux $docteurId): static
    {
        if ($this->Docteur_id->removeElement($docteurId)) {
            // set the owning side to null (unless already changed)
            if ($docteurId->getPatientId() === $this) {
                $docteurId->setPatientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getPatientId(): Collection
    {
        return $this->patient_id;
    }

    public function addPatientId(Consultation $patientId): static
    {
        if (!$this->patient_id->contains($patientId)) {
            $this->patient_id->add($patientId);
            $patientId->setPatientId($this);
        }

        return $this;
    }

    public function removePatientId(Consultation $patientId): static
    {
        if ($this->patient_id->removeElement($patientId)) {
            // set the owning side to null (unless already changed)
            if ($patientId->getPatientId() === $this) {
                $patientId->setPatientId(null);
            }
        }

        return $this;
    }
}
