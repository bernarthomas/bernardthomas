<?php
/**
 *
 */
namespace App\EventListener;

use App\Entity\Tache;
use App\Repository\TacheRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class TacheSubscriber
 * @package App\EventListener
 */
class TacheSubscriber implements EventSubscriberInterface
{
    private $repositoryTache;

    public function __construct(TacheRepository $repositoryTache)
    {
        $this->repositoryTache = $repositoryTache;
    }

    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'onPreSetData'];
    }

    public function onPreSetData(FormEvent $event)
    {
        $tache = $event->getData();
        $derniereDate = $this->repositoryTache->findLastDate();
        if (empty($tache)) {
            $tache = new Tache();
        }
        $tache->setDate($derniereDate);
    }
}