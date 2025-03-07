<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints as Assert;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('adr')
            ->add('tel')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'html5' => true, 
            ])
            ->add('email')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'first_options' => ['label' => 'Password',
                'empty_data' => '',
            ],
                'second_options' => [
                    'label' => 'Confirm Password',
                    'empty_data' => '',
                    'attr' => ['class' => 'form-control'],
                    'constraints' => [
                        new Assert\NotBlank(['message' => 'Le mot de passe de confirmation est obligatoire.']),
                    ],
                ],
            ])
                      
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
