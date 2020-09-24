<?php

namespace App\Form;

use App\Entity\Danse;
use App\Entity\Eleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                //'attr' => ['class' => 'col-12']
            ])
            ->add('prenom', TextType::class, [
                'required' => true,
                //'attr' => ['class' => 'col-6']
            ])
            ->add('sexe', TextType::class, [
                'required' => true,
                //'attr' => ['class' => 'col-6']
            ])
            ->add('dateNaissance', DateType::class,  [
                'format' => 'dd-MM-yyyy'
            ])
            ->add('adresse', TextType::class, [
                //'attr' => ['class' => 'col-6']
            ])
            ->add('cp', TextType::class, [
                'label' => 'Code Postal',
                //'attr' => ['class' => 'col-6']
            ])
            ->add('ville', TextType::class, [
                //'attr' => ['class' => 'col-6']
            ])
            ->add('email', EmailType::class, [
                //'attr' => ['class' => 'col-6']
            ])
            ->add('telFixe', TextType::class, [
                'label' => 'Téléphone Fixe',
                //'attr' => ['class' => 'col-6']
            ])
            ->add('telPortable', TextType::class, [
                'label' => 'Téléphone Portable',
                //'attr' => ['class' => 'col-6']
            ])
            ->add('taille', IntegerType::class, [
                'attr' => [
                    //'class' => 'col-6',
                    'min' => 1,
                    'max' => 220,
                    'step' => 1
                    ]
            ])
            ->add('stationMetro', TextType::class, [
                'label' => 'Station de métro',
                //'attr' => ['class' => 'col-6']
            ])
            ->add('danses', EntityType::class, [
                'class' => Danse::class,
                'choice_label' => 'nom',
                'multiple' => true
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
