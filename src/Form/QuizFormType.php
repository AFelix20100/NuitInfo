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
        $builder
            ->add('questions', CollectionType::class, [
                'entry_type' => ChoiceType::class,
                'entry_options' => [
                    'choices' => ['Vrai' => true, 'Faux' => false],
                    'expanded' => true,
                    'multiple' => false,
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false, // Pour éviter l'affichage du label de la collection
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null, // Permet de ne pas lier le formulaire à une entité
        ]);
    }
}
