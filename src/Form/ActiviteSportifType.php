<?php

namespace App\Form;

use App\Entity\ActiviteSportif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActiviteSportifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('type', TextType::class, [
            'label' => "Type d'activité",
            'required' => false,
            'constraints' => [
                new Assert\NotBlank(['message' => "Le type d'activité est obligatoire."]),
                new Assert\Length([
                    'max' => 255,
                    'maxMessage' => "Le type d'activité ne doit pas dépasser 255 caractères."
                ])
            ],
            'attr' => ['class' => 'form-input'],
        ])
        ->add('duree', IntegerType::class, [
            'label' => "Durée (minutes)",
            'required' => false,
            'constraints' => [
                new Assert\NotBlank(['message' => "La durée est obligatoire."]),
                new Assert\Positive(['message' => "La durée doit être un nombre positif."]),
            ],
            'attr' => ['class' => 'form-input'],
        ])
        ->add('frequence', IntegerType::class, [
            'label' => "Fréquence (fois/semaine)",
            'required' => false,
            'constraints' => [
                new Assert\NotBlank(['message' => "La fréquence est obligatoire."]),
                new Assert\Positive(['message' => "La fréquence doit être un nombre positif."]),
            ],
            'attr' => ['class' => 'form-input'],
        ])
     ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActiviteSportif::class,
        ]);
    }
}
