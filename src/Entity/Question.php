<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_CHOICE = 'choice';
    const TYPE_MULTIPLE_CHOICE = 'multiple_choice';
    const TYPE_NUMBER = 'number';
    const TYPE_DATE = 'date';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column(length: 50)]
    private ?string $type = self::TYPE_TEXT;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $options = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questionnaire $questionnaire = null;

    #[ORM\Column]
    private ?int $position = 0;

    #[ORM\Column]
    private ?bool $required = true;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $helpText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function getOptionsArray(): ?array
    {
        return $this->options ? json_decode($this->options, true) : [];
    }

    public function setOptions(?string $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function setOptionsArray(?array $options): static
    {
        $this->options = $options ? json_encode($options) : null;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function isRequired(): ?bool
    {
        return $this->required;
    }

    public function setRequired(bool $required): static
    {
        $this->required = $required;

        return $this;
    }

    public function getHelpText(): ?string
    {
        return $this->helpText;
    }

    public function setHelpText(?string $helpText): static
    {
        $this->helpText = $helpText;

        return $this;
    }
}