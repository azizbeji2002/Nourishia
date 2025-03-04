<?php

namespace App\Form;

use App\Entity\Events;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class EventsType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name', TextType::class, [
        'label' => 'Nom de l\'événement',
        'constraints' => [
          new NotBlank(['message' => 'Veuillez entrer un nom.']),
        ],
      ])
      ->add('description', TextType::class, [
        'label' => 'Description',
        'constraints' => [
          new NotBlank(['message' => 'Veuillez entrer une description.']),
        ],
      ])
      ->add('address', TextType::class, [
        'label' => 'Adresse',
        'constraints' => [
          new NotBlank(['message' => 'Veuillez entrer une adresse.']),
        ],
      ])
      ->add('capacity', IntegerType::class, [
        'label' => 'Capacité',
        'constraints' => [
          new NotBlank(['message' => 'Veuillez entrer une capacité.']),
        ],
      ])
      ->add('date', DateType::class, [
        'label' => 'Date de l\'événement',
        'widget' => 'single_text',
        'constraints' => [
          new NotBlank(['message' => 'Veuillez entrer une date.']),
        ],
      ])
      ->add('imageFile', FileType::class, [
        'label' => 'Image de l\'événement',
        'mapped' => false,
        'required' => false,
        'constraints' => [
          new File([
            'maxSize' => '100M',
            'mimeTypes' => ['image/jpeg', 'image/png'],
            'mimeTypesMessage' => 'Veuillez télécharger une image valide (JPG ou PNG).',
          ]),
        ],
      ]);

  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Events::class,
    ]);
  }
}
