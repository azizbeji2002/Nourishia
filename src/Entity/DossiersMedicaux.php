<?php

namespace App\Entity;

use App\Repository\DossiersMedicauxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DossiersMedicauxRepository::class)]
class DossiersMedicaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Assert\NotNull(message: "Le patient est obligatoire.")]
    private ?Patient $patient_id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Docteur $docteur_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column(length: 255)]
    private ?string $diagnostic = null;

    #[ORM\Column(length: 255)]
    private ?string $traitement = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\NotNull(message: "Le fichier est obligatoire.")]
    private ?string $fichier = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank(message: "Le groupe sanguin est obligatoire.")]
    private ?string $groupeSanguin = null;

    #[ORM\Column(type: Types::FLOAT)]
    #[Assert\NotBlank(message: "La taille est obligatoire.")]
    #[Assert\Positive(message: "La taille doit être un nombre positif.")]
    private ?float $taille = null;

    #[ORM\Column(length: 10)]
    #[Assert\Choice(choices: ["Masculin", "Féminin"], message: "Le sexe doit être 'Masculin' ou 'Féminin'.")]
    private ?string $sexeBebe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergie = null;

    #[ORM\Column(type: Types::INTEGER)]
    #[Assert\NotBlank(message: "Le contact d'urgence est obligatoire.")]
    #[Assert\Length(min: 8, max: 15, minMessage: "Le numéro doit contenir au moins 8 chiffres.", maxMessage: "Le numéro ne peut pas dépasser 15 chiffres.")]
    private ?int $contactUrgence = null;

    public function __construct()
    {
        $this->date_creation = new \DateTime();
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): static
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): static
    {
        $this->diagnostic = $diagnostic;
        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(string $traitement): static
    {
        $this->traitement = $traitement;
        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): static
    {
        $this->fichier = $fichier;
        return $this;
    }

    public function getGroupeSanguin(): ?string
    {
        return $this->groupeSanguin;
    }

    public function setGroupeSanguin(string $groupeSanguin): static
    {
        $this->groupeSanguin = $groupeSanguin;
        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): static
    {
        $this->taille = $taille;
        return $this;
    }

    public function getSexeBebe(): ?string
    {
        return $this->sexeBebe;
    }

    public function setSexeBebe(string $sexeBebe): static
    {
        $this->sexeBebe = $sexeBebe;
        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->allergie;
    }

    public function setAllergie(?string $allergie): static
    {
        $this->allergie = $allergie;
        return $this;
    }

    public function getContactUrgence(): ?int
    {
        return $this->contactUrgence;
    }

    public function setContactUrgence(int $contactUrgence): static
    {
        $this->contactUrgence = $contactUrgence;
        return $this;
    }
}
