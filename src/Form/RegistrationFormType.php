<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('adr')
            ->add('tel')
            ->add('date', DateType::class, [
                'widget' => 'single_text', // Affiche un input type="date"
                'format' => 'yyyy-MM-dd',
                'html5' => true, // Permet l'utilisation du datepicker natif
            ])            
            ->add('email')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'first_options' => ['label' => 'Password'],
                'second_options' => [
                    'label' => 'Confirm Password',
                    'attr' => ['class' => 'form-control'],
                    'constraints' => [
                        new Assert\NotBlank(['message' => 'Le mot de passe de confirmation est obligatoire.']),
                    ],
                ],
            ])
            
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Patiente' => 'ROLE_PATIENTE',
                    'Docteur' => 'ROLE_DOCTEUR',
                ],
                'expanded' => true,  // Affiche des boutons radio
                'multiple' => false,  // Permet de choisir un seul rôle
                'attr' => ['class' => 'form-check-inline'],
                'constraints' => [
            new Assert\NotBlank([
                'message' => 'Veuillez choisir un rôle.'
            ]),
        ],
            ])
            
            ->add('terms', CheckboxType::class, [
                'mapped' => false,  // Le champ n'est pas lié à une propriété de l'entité
                'constraints' => [
                    new Assert\IsTrue([
                        'message' => 'Vous devez accepter les termes et conditions.',
                    ]),
                ],
                'attr' => ['class' => 'form-check-input'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
