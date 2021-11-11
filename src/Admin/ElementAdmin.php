<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Legende;
use App\Entity\SuiviCulture;
use App\Entity\Variete;
use App\Entity\Zone;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class ElementAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('variete.libelle', null, ['label' => 'Suivi'])
            ->add('legende.libelle', null, ['label' => 'Statut'])
            ->add('legende.zone', null, ['label' => 'Bande'])
            ->add('echec')
            ->add('date', null, ['format' => 'd/m/y'])
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('suiviCulture',EntityType::class, [
                'class' => SuiviCulture::class, 'choice_label' => 'commentaire', 'placeholder' => ''
            ])
            ->add('variete',EntityType::class, [
                'class' => Variete::class, 'choice_label' => 'libelle', 'placeholder' => ''
            ])
            ->add('zone',EntityType::class, [
                'class' => Zone::class, 'choice_label' => 'libelle', 'placeholder' => '', 'required' => false
            ])
             ->add('legende',EntityType::class, [
                'class' => Legende::class, 'choice_label' => 'libelle', 'placeholder' => ''
            ])
            ->add('legendes', ModelType::class, ['property' => 'libelle', 'multiple' => true, 'expanded' => true])
            ->add('echec')
            ->add('date', DateType::class, ['widget' => 'single_text'])
            ;
    }
}
