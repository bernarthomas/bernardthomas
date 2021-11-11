<?php

namespace App\Form\Action;

use App\Entity\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjouterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('culture')

            ->add('date1Prevu', DateType::class, ['label' => 'Date 1 prévue', 'widget' => 'single_text'])
            ->add('activite1Prevu', null, ['label' => 'Activité 1 prévue', 'help' => 'semis, plantation, repiquage'])
            ->add('lieu1Prevu', null, ['label' => 'Lieu 1 prévu', 'help' => 'intérieur, miniserre, tunnel, pleine terre'])
            ->add('activite1Realise', null, ['label' => 'Activité 1 réalisée', 'help' => 'intérieur, miniserre, tunnel, pleine terre'])
            ->add('lieu1Realise', null, ['label' => 'Activité 1 réalisée', 'help' => 'intérieur, miniserre, tunnel, pleine terre'])
            ->add('date1RealiseLe', DateType::class, ['label' => 'Date 1 réalisé le', 'widget' => 'single_text'])

            ->add('date2Prevu', DateType::class, ['label' => 'Date 2 prévue', 'widget' => 'single_text'])
            ->add('activite2Prevu', null, ['label' => 'Activité 2 prévue', 'help' => 'semis, plantation, repiquage'])
            ->add('lieu2Prevu', null, ['label' => 'Lieu 2 prévu', 'help' => 'intérieur, miniserre, tunnel, pleine terre'])
            ->add('activite2Realise', null, ['label' => 'Activité 2 réalisée', 'help' => 'intérieur, miniserre, tunnel, pleine terre'])
            ->add('lieu2Realise', null, ['label' => 'Activité 2 réalisée', 'help' => 'intérieur, miniserre, tunnel, pleine terre'])
            ->add('date2RealiseLe', DateType::class, ['label' => 'Date 2 réalisé le', 'widget' => 'single_text'])

            ->add('premiereRecolteLe', DateType::class, ['widget' => 'single_text'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Action::class,
        ]);
    }
}
