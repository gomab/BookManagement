<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'label'    => 'The book title'
            ])

            ->add('author', TextType::class, [
                'required' => true,
                'label'    => 'The book author'
            ])

            ->add('description', TextareaType::class, [
                'data' => 'The book description',
                'required'   => false,
                'empty_data' => 'Empty description book',
            ])

            ->add('price', MoneyType::class, [
                'scale' => 2,
                'currency' => false
            ])

            ->add('dateEdit', BirthdayType::class, [
                'widget' => 'choice',
                'format' => 'yyyy-MM-dd'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Book::class,
        ]);
    }
}
