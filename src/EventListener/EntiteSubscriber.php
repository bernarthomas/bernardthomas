<?php
/**
 *
 */
namespace App\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use \DateTime;
use Doctrine\ORM\Events;

/**
 * Class EntiteSubscriber
 * @package App\EventListener
 */
class EntiteSubscriber implements EventSubscriber
{
    /** @var DateTime  */
    private $maintenant ;

    /**
     * EntiteSubscriber constructor.
     */
    public function __construct()
    {
        $this->maintenant = new DateTime();
    }

    /**
     * @return array|string[]
     */
    public function getSubscribedEvents ()
    {
        return [
            Events::prePersist,
            Events::preUpdate
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entity
            ->setActif(true)
            ->setDateCreation($this->maintenant)
        ;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entity->setDateDerniereMaj($this->maintenant);
    }
}