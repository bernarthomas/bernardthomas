<?php
/**
 *
 */
declare(strict_types=1);

namespace App\Admin;

use App\EventListener\EntiteSubscriber;
use App\EventListener\TacheSubscriber;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

/**
 * Class TacheAdmin
 * @package App\Admin
 */
final class TacheAdmin extends AbstractAdmin
{
    private $tacheSubscriber;

    /** @var array  */
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'date' // field name
    );

    public function __construct($code, $class, $baseControllerName, TacheSubscriber $tacheSubscriber)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->tacheSubscriber = $tacheSubscriber;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('actif')
            ->add('date')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('heureDebut')
            ->add('heureFin')
            ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('date')
            ->add('activites', null, ['associated_property' => 'libelle'])
            ->add('libelle', null, ['label' => 'Tache'])
            ->add('heureDebut')
            ->add('heureFin')


            ->add('projets', null, ['associated_property' => 'libelle'])
            ->add('type', null, ['associated_property' => 'libelle'])
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
            ->add('actif')
            ->add('date', DateType::class, ['widget' => 'single_text'])
            ->add('heureDebut', TimeType::class, ['widget' => 'single_text'])
            ->add('heureFin', TimeType::class, ['widget' => 'single_text'])
            ->add('activites', ModelType::class, ['multiple' => true, 'property' => 'libelle'])
            ->add('libelle', null, ['label' => 'tache'])
            ->add('projets', ModelType::class, ['multiple' => true, 'property' => 'libelle'])
            ->add('type',ModelType::class, ['property' => 'libelle'])
            ->getFormBuilder()->addEventSubscriber($this->tacheSubscriber)
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
            ->add('date')
            ->add('dateCreation')
            ->add('dateDerniereMaj')
            ->add('heureDebut')
            ->add('heureFin')
            ;
    }
}
