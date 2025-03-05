<?php

namespace App\Form;

use App\Entity\PlanNutritionnels;
use App\Entity\QuestionnaireResponse;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssignPlanWithQuestionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('assignedPlan', EntityType::class, [
                'class' => PlanNutritionnels::class,
                'label' => 'Select Nutritional Plan',
                'placeholder' => 'Choose a plan',
                'choice_label' => 'alimentRecommende',
                'attr' => ['class' => 'form-control']
            ])
            ->add('doctorNotes', TextareaType::class, [
                'label' => 'Notes for the Patient',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 5,
                    'placeholder' => 'Add any specific instructions or feedback based on the questionnaire responses'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuestionnaireResponse::class,
        ]);
    }
}