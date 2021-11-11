<?php
/**
 *
 */
declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class BilletAdmin
 * @package App\Admin
 */
final class BilletAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('actif')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('template')
            ->add('uri')
            ->add('decorateur')
            ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('actif')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('template')
            ->add('uri')
            ->add('decorateur')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('template', null, ['help' => 'chemin du fichier'])
            ->add('uri', null, ['help' => 'url de la page'])
            ->add('decorateur', null, [
                'help' => 'nom de la methode du service décorateur quand nécessaire',
                'label' => 'Décorateur'
            ])
            ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('actif')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('template')
            ->add('uri')
            ->add('decorateur')
            ;
    }
}
