<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ExportTacheAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('actif')
            ->add('affectation')
            ->add('charge')
            ->add('code')
            ->add('fin')
            ->add('projets')
            ->add('taches')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
//            ->add('id')
//            ->add('actif')
            ->add('code')
            ->add('taches', null, ['label' => 'Tâches'])
            ->add('projets')
            ->add('charge', null, ['label' => 'Charge réelle (h)'])
            ->add('fin', null, ['label' => 'Date fin'])
            ->add('affectation')





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
            ->add('id')
            ->add('actif')
            ->add('affectation')
            ->add('charge')
            ->add('code')
            ->add('fin')
            ->add('projets')
            ->add('taches')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('actif')
            ->add('affectation')
            ->add('charge')
            ->add('code')
            ->add('fin')
            ->add('projets')
            ->add('taches')
            ;
    }

    /**
     * @return array|string[]
     */
    public function getExportFields()
    {
        return ['taches', 'projets', 'charge', 'fin', 'affectation'];
    }
}
