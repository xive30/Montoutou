<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewAnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType ::class , [
                'label' => 'Nom'
            ])
            ->add('birthday', DateType ::class, [
                'label' => 'Date de Naissance'
            ])
            ->add('type', TextType::class, [
                'label' => "Type d'animal"
            ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Ne sais pas' => 0,
                    'Male' => 1,
                    'Femelle' => 2,
                ],
            ])
            ->add('race', TextType::class, )
            ->add('submit' , SubmitType::class ,[
                'label' => 'Enregistrer'
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
