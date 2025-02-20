<?php

namespace App\Form;

use App\Entity\Consultation;
use App\Entity\Docteur;
use App\Entity\Patient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FloatType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Enum\StatutConsultation;  

class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_consultation', null, [
                'widget' => 'single_text',
            ])
            ->add('patient_id', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'nom',
            ])
            ->add('docteur_id', EntityType::class, [
                'class' => Docteur::class,
                'choice_label' => 'nom',
            ])
            ->add('conseils', TextType::class, [
                'label' => 'Conseils',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Entrez les conseils',
                ],
            ])
            ->add('poids', TextType::class, [
                'label' => 'Poids (kg)',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Entrez le poids en kg',
                ],
            ])
            ->add('tension', TextType::class, [
                'label' => 'Tension',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Entrez la tension',
                ],
            ])
            ->add('process_grossesse', DateType::class, [
                'label' => 'Processus de Grossesse',
                'required' => false,
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Consultation::class,
        ]);
    }
}
