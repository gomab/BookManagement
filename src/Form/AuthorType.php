<?php

namespace App\Form;

use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label'     => 'First Name'
            ])

            ->add('firstName', TextType::class, [
                'required' => true,
                'label'    => 'Last Name'
            ])

            ->add('bDate', DateType::HTML5_FORMAT, [
                'required' => true,
                'label'    => 'Birth Date'
            ])

            ->add('nationality', TextType::class, [
                'label' => 'Nationality'
            ])

            ->add('biography', TextareaType::class, [
                'label' => 'Biography'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Author::class,
        ]);
    }
}
