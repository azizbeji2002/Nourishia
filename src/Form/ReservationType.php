<?php

namespace App\Form;

use App\Entity\Events;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Votre nom'
                ],
                'label_attr' => ['class' => 'form-label']
            ])
            ->add('dateReservation', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control mb-3'
                ],
                'label_attr' => ['class' => 'form-label']
            ])
            ->add('nbrPlaceReserve', NumberType::class, [
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Nombre de places'
                ],
                'label_attr' => ['class' => 'form-label']
            ])
            ->add('event', EntityType::class, [
                'class' => Events::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-select mb-3'
                ],
                'label_attr' => ['class' => 'form-label']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
