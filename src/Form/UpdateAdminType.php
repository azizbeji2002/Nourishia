<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UpdateAdminType extends AbstractType
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
    ->add('isVerified', ChoiceType::class, [
        'choices' => [
            'Vérifié' => true, // true pour 'Vérifié'
            'Non vérifié' => false, // false pour 'Non vérifié'
        ],
        'expanded' => true, // Utiliser des boutons radio
        'multiple' => false, // Assurez-vous que ce n'est pas une sélection multiple
        'label' => 'Vérification',
        'attr' => ['class' => 'form-check'], // Applique le 'form-check' au groupe
    ]);

}    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
