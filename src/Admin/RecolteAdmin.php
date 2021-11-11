<?php
/**
 *
 */
declare(strict_types=1);

namespace App\Admin;

use App\EventListener\RecolteSubscriber;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Class RecolteAdmin
 * @package App\Admin
 */
final class RecolteAdmin extends AbstractAdmin
{
    /** @var array  */
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'date' // field name
    );

    /** @var RecolteSubscriber  */
    private $recolteSubscriber;

    public function __construct($code, $class, $baseControllerName = null, RecolteSubscriber $recolteSubscriber)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->recolteSubscriber = $recolteSubscriber;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('culture.libelle', null, ['label' => 'Culture'])
            ->add('actif')
            ->add('commentaire')
            ->add('date', null, ['format' => 'd/m/y h:i:s'])
            ->add('poids')
            ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('date', null, ['format' => 'd/m/y'])
            ->add('culture.libelle', null, ['label' => 'Culture'])
            ->add('poids')
            ->add('commentaire')
            ->add('actif')
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
            ->add('date', DateType::class, ['widget' => 'single_text'])
//            ->add('actif')
            ->add('culture', ModelType::class, ['property' => 'libelle', 'placeholder' => ' '])
            ->add('poids')
            ->add('commentaire')
            ->getFormBuilder()->addEventSubscriber($this->recolteSubscriber)
            ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('date')
            ->add('culture.libelle', null, ['label' => 'Culture'])
            ->add('poids')
            ->add('commentaire')
            ->add('actif')
            ;
    }
}
