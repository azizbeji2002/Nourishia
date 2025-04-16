<?php

namespace App\Form;

use App\Entity\Docteur;
use App\Entity\DossiersMedicaux;
use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Types de champ
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

// Validation
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Choice;

// Pour EntityType
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DossiersMedicauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Diagnostic
            ->add('diagnostic', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Le diagnostic est obligatoire.']),
                ],
            ])

            // Traitement
            ->add('traitement', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Le traitement est obligatoire.']),
                ],
            ])

            // Fichier
            ->add('fichier', FileType::class,  [
                'label' => 'Fichier (PDF uniquement)',
                'required' => false,
                'data_class' => null, // important pour autoriser un upload
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => ['application/pdf'],
                        'mimeTypesMessage' => 'Veuillez uploader un fichier PDF valide.',
                    ])
                ],
            ])

            // Groupe Sanguin
            ->add('groupeSanguin', TextType::class, [
                'label' => 'Groupe sanguin',
                'constraints' => [
                ],
            ])

            // Taille
            ->add('taille', NumberType::class, [
                'label' => 'Taille (en cm)',
                'constraints' => [
                    new Positive(['message' => 'La taille doit être un nombre positif.']),
                ],
            ])

            // Sexe du Bébé
            ->add('sexeBebe', ChoiceType::class, [
                'label' => 'Sexe du bébé',
                'choices' => [
                    'Masculin' => 'Masculin',
                    'Féminin' => 'Féminin',
                ],
                'constraints' => [
                    new Choice([
                        'choices' => ['Masculin', 'Féminin'],
                        'message' => "Le sexe doit être 'Masculin' ou 'Féminin'.",
                    ]),
                ],
            ])

            // Allergie
            ->add('allergie', TextType::class, [
                'label' => 'Allergie',
                'required' => false, // champ optionnel
            ])

            // Contact d'urgence
            ->add('contactUrgence', TextType::class, [
                'label' => 'Contact d\'urgence',
                'constraints' => [
                    new Length([
                        'min' => 8,
                        'max' => 15,
                        'minMessage' => 'Le numéro doit contenir au moins 8 chiffres.',
                        'maxMessage' => 'Le numéro ne peut pas dépasser 15 chiffres.'
                    ])
                ],
            ])

            // Patient
            ->add('patient_id', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'nom',
            ])

            // Docteur
            ->add('docteur_id', EntityType::class, [
                'class' => Docteur::class,
                'choice_label' => 'nom',
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DossiersMedicaux::class,
        ]);
    }
}
