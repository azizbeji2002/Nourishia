<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
#[ORM\HasLifecycleCallbacks] // Ajout pour les événements Doctrine
class Events
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank(message: "Le nom de l'événement est obligatoire.")]
  #[Assert\Length(max: 255, maxMessage: "Le nom ne doit pas dépasser 255 caractères.")]
  private ?string $name = null;

  #[ORM\Column(type: Types::TEXT)]
  #[Assert\NotBlank(message: "La description est obligatoire.")]
  private ?string $description = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank(message: "L'adresse est obligatoire.")]
  private ?string $address = null;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $image = null;

  #[ORM\Column]
  #[Assert\NotBlank(message: "La capacité est obligatoire.")]
  #[Assert\Positive(message: "La capacité doit être un nombre positif.")]
  private ?int $capacity = null;

  #[ORM\Column(type: Types::DATE_MUTABLE)]
  #[Assert\NotBlank(message: "La date est obligatoire.")]
  #[Assert\Type("\DateTimeInterface")]
  private ?\DateTimeInterface $date = null;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $createdAt = null;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $updateAt = null;

  /**
   * @var Collection<int, Reservation>
   */
  #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'event')]
  private Collection $reservations;

  public function __construct()
  {
      $this->reservations = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
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

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(string $description): static
  {
    $this->description = $description;
    return $this;
  }

  public function getAddress(): ?string
  {
    return $this->address;
  }

  public function setAddress(string $address): static
  {
    $this->address = $address;
    return $this;
  }

  public function getImage(): ?string
  {
    return $this->image;
  }

  public function setImage(?string $image): static
  {
    $this->image = $image;
    return $this;
  }

  public function getCapacity(): ?int
  {
    return $this->capacity;
  }

  public function setCapacity(int $capacity): static
  {
    $this->capacity = $capacity;
    return $this;
  }

  public function getDate(): ?\DateTimeInterface
  {
    return $this->date;
  }

  public function setDate(\DateTimeInterface $date): static
  {
    $this->date = $date;
    return $this;
  }

  public function getCreatedAt(): ?\DateTimeImmutable
  {
    return $this->createdAt;
  }

  public function getUpdateAt(): ?\DateTimeImmutable
  {
    return $this->updateAt;
  }

  #[ORM\PrePersist]
  public function setCreatedAtValue(): void
  {
    $this->createdAt = new \DateTimeImmutable();
  }

  #[ORM\PreUpdate]
  public function setUpdateAtValue(): void
  {
    $this->updateAt = new \DateTimeImmutable();
  }

  /**
   * @return Collection<int, Reservation>
   */
  public function getReservations(): Collection
  {
      return $this->reservations;
  }

  public function addReservation(Reservation $reservation): static
  {
      if (!$this->reservations->contains($reservation)) {
          $this->reservations->add($reservation);
          $reservation->setEvent($this);
      }

      return $this;
  }

  public function removeReservation(Reservation $reservation): static
  {
      if ($this->reservations->removeElement($reservation)) {
          // set the owning side to null (unless already changed)
          if ($reservation->getEvent() === $this) {
              $reservation->setEvent(null);
          }
      }

      return $this;
  }
}
