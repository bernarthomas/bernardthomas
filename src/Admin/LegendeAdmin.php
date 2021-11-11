<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class LegendeAdmin extends AbstractAdmin
{

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('actif')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('libelle')
            ->add('icone')
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
            ->add('actif')
            ->add('dateCreation', DateType::class, ['widget' => 'single_text'])
            ->add('dateDerniereMaj', DateType::class, ['required' => false, 'widget' => 'single_text'])
            ->add('libelle')
            ->add('icone')
            ;
    }
}
