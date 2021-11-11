<?php

declare(strict_types=1);

namespace App\Admin;

use App\EventListener\AchatNourritureSubscriber;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class AchatNourritureAdmin extends AbstractAdmin
{
    private $tacheSubscriber;

    public function __construct($code, $class, $baseControllerName, AchatNourritureSubscriber $achatNourritureSubscriber)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->achatNourritureSubscriber = $achatNourritureSubscriber;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('actif')
            ->add('date')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('poids')
            ->add('prixPaye')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('date', null, ['format' => 'd/m/y'])
            ->add('culture.libelle', null , ['label' => 'Achat'])
            ->add('poids')
            ->add('prixPaye', null , ['label' => 'Prix payé'])
            ->add('fournisseur.libelle', null , ['label' => 'Fournisseur'])
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
            ->add('date', DateType::class, ['widget' => 'single_text'])
            ->add('culture', ModelType::class, ['property' => 'libelle', 'placeholder' => ' '])
            ->add('fournisseur', ModelType::class, ['property' => 'libelle', 'placeholder' => ' '])
            ->add('poids')
            ->add('prixPaye')
            ->getFormBuilder()->addEventSubscriber($this->achatNourritureSubscriber);
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('actif')
            ->add('date')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('poids')
            ->add('prixPaye')
            ;
    }
}
