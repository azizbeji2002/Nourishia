<?php

namespace App\Form;

use App\Entity\Category; // Use PascalCase for class names
use App\Entity\Produits;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType; // Correct class name for FileType
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Add this line
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('quantity')
            ->add('image', FileType::class, [ // Correct class name for FileType
                'required' => false,
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class, // Use PascalCase
                'choice_label' => 'name', // Use the 'name' property of the Category entity
            ])
            ->add('submit', SubmitType::class) // Add a submit button
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}