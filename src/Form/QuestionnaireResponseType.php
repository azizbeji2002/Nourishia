<?php

namespace App\Form;

use App\Entity\QuestionnaireResponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Question;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuestionnaireResponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $questionnaire = $options['questionnaire'];
        
        foreach ($questionnaire->getQuestions() as $question) {
            $fieldType = $this->getFieldTypeForQuestion($question);
            $fieldOptions = $this->getFieldOptionsForQuestion($question);
            
            $builder->add('question_' . $question->getId(), $fieldType, $fieldOptions);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null, // We'll handle the data manually
            'questionnaire' => null,
        ]);
        
        $resolver->setRequired('questionnaire');
    }
    
    private function getFieldTypeForQuestion($question): string
    {
        switch ($question->getType()) {
            case Question::TYPE_TEXTAREA:
                return TextareaType::class;
            case Question::TYPE_CHOICE:
                return ChoiceType::class;
            case Question::TYPE_MULTIPLE_CHOICE:
                return ChoiceType::class;
            case Question::TYPE_NUMBER:
                return NumberType::class;
            case Question::TYPE_DATE:
                return DateType::class;
            case Question::TYPE_TEXT:
            default:
                return TextType::class;
        }
    }
    
    private function getFieldOptionsForQuestion($question): array
    {
        $options = [
            'label' => $question->getText(),
            'required' => $question->isRequired(),
            'help' => $question->getHelpText(),
            'attr' => [
                'class' => 'form-control'
            ],
        ];
        
        if ($question->getType() === Question::TYPE_CHOICE || $question->getType() === Question::TYPE_MULTIPLE_CHOICE) {
            $choices = [];
            foreach ($question->getOptionsArray() as $option) {
                $choices[$option] = $option;
            }
            
            $options['choices'] = $choices;
            
            if ($question->getType() === Question::TYPE_MULTIPLE_CHOICE) {
                $options['multiple'] = true;
                $options['expanded'] = true;
            }
        }
        
        return $options;
    }
}