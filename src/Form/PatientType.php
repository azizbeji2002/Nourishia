<?php
namespace App\Form;

use App\Entity\Patient;
use App\Entity\PlanNutritionnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Patient Name',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Patient Email',
            ])
            ->add('plan', EntityType::class, [
                'class' => PlanNutritionnels::class,
                'choice_label' => 'alimentRecommende', // Display meaningful field
                'placeholder' => 'Choose a plan',
                'required' => true,
            ])
            ->add('assign', SubmitType::class, [
                'label' => 'Assign Plan'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
