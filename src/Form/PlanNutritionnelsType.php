<?php

namespace App\Form;

use App\Entity\PlanNutritionnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class PlanNutritionnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('alimentRecommende', TextType::class, [
            'label' => 'Aliments Recommandés',
            'required' => false,
            'constraints' => [
                new Assert\NotBlank(['message' => 'Le champ des aliments recommandés ne peut pas être vide.']),
                new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Le nom des aliments recommandés ne doit pas dépasser 255 caractères.'
                ])
            ],
            'attr' => ['class' => 'form-input'],
        ])
        ->add('alimentEvite', TextType::class, [
            'label' => 'Aliments à éviter',
            'required' => false,
            'constraints' => [
                new Assert\NotBlank(['message' => 'Le champ des aliments à éviter ne peut pas être vide.']),
                new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Le nom des aliments à éviter ne doit pas dépasser 255 caractères.'
                ])
            ],
            'attr' => ['class' => 'form-input'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlanNutritionnels::class,
        ]);
    }
}
