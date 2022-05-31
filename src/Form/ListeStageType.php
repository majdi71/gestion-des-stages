<?php

namespace App\Form;

use App\Entity\ListeStage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListeStageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('specialite')
            ->add('titre')
            ->add('typestage')
            ->add('nomsocite')
            ->add('emailSocite')
            ->add('adresse')
            ->add('description')
            ->add('classe')
            ->add('user');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListeStage::class,
        ]);
    }
}
