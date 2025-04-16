<?php

namespace App\Form;

use App\Entity\Docteur;
use App\Entity\Patient;
use App\Entity\RendezVous;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRdv', null, [
                'widget' => 'single_text',
            ]);

        if ($options['show_statut']) {
            $builder->add('statut', ChoiceType::class, [
                'choices' => [
                    'En attente' => 'en attente',
                    'Annulée' => 'annulée',
                    'Confirmée' => 'confirmée',
                ],
                'mapped' => false, 
            ]);
        }
        
        $builder
            ->add('patient', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'nom',
            ])
            ->add('docteur', EntityType::class, [
                'class' => Docteur::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
            'show_statut' => true,  
        ]);
    }
}
