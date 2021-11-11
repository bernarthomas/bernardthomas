<?php
/**
 *
 */
namespace App\EventListener;

use App\Entity\Recolte;
use App\Repository\RecolteRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class RecolteSubscriber
 * @package App\EventListener
 */
class RecolteSubscriber implements EventSubscriberInterface
{
    private $repositoryRecolte;

    public function __construct(RecolteRepository $repositoryRecolte)
    {
        $this->repositoryRecolte = $repositoryRecolte;
    }

    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'onPreSetData'];
    }

    public function onPreSetData(FormEvent $event)
    {
        $recolte = $event->getData();
        $derniereDate = $this->repositoryRecolte->findLastDate();
        $derniereCulture = $this->repositoryRecolte->findLastCulture();
        if (empty($recolte)) {
            $recolte = new Recolte();
        }
        $recolte
            ->setDate($derniereDate)
            ->setCulture($derniereCulture)
        ;
    }
}