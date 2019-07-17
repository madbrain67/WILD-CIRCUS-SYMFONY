<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'email', RepeatedType::class, array(
                'type' => EmailType::class,
                'first_options' =>  array('label' => 'EMAIL', 'help' => 'FIELD-MANDATORY'),
                'second_options' => array('label' => 'REPEAT-EMAIL', 'help' => 'FIELD-MANDATORY'),
                )
            )
            ->add(
                'password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' =>  array('label' => 'PASSWORD', 'help' => 'FIELD-MANDATORY'),
                'second_options' => array('label' => 'REPEAT-PASSWORD', 'help' => 'FIELD-MANDATORY'),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
            'data_class' => User::class,
            ]
        );
    }
}
