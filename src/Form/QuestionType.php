<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', TextType::class, [
                'label' => 'Question Text',
                'attr' => ['class' => 'form-control question-text']
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Question Type',
                'choices' => [
                    'Short Answer' => Question::TYPE_TEXT,
                    'Long Answer' => Question::TYPE_TEXTAREA,
                    'Single Choice' => Question::TYPE_CHOICE,
                    'Multiple Choice' => Question::TYPE_MULTIPLE_CHOICE,
                    'Number' => Question::TYPE_NUMBER,
                    'Date' => Question::TYPE_DATE,
                ],
                'attr' => ['class' => 'form-control question-type']
            ])
            ->add('options', TextareaType::class, [
                'label' => 'Options (one per line, for choice questions)',
                'required' => false,
                'attr' => [
                    'class' => 'form-control question-options',
                    'rows' => 3,
                    'placeholder' => 'Enter one option per line'
                ]
            ])
            ->add('helpText', TextType::class, [
                'label' => 'Help Text',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Additional instructions for the patient'
                ]
            ])
            ->add('required', CheckboxType::class, [
                'label' => 'Required?',
                'required' => false,
            ])
            ->add('position', HiddenType::class, [
                'attr' => ['class' => 'question-position']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}