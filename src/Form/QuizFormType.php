<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $questions = $options["data"]['questions'];
        foreach ($questions as $key => $question) {
            $builder->add('question_' . $key, ChoiceType::class, [
                'label' => $question["question"],
                'choices' => [
                    'Vrai' => 1,
                    'Faux' => 0,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    // Add a custom class to each choice
                    return ['class' => 'mx-2'];
                },
                'expanded' => true,
                'multiple' => false,
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'questions' => [],
            'csrf_protection' => false,
        ]);
    }
}
