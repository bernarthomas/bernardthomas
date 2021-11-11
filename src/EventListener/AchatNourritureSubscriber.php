<?php
/**
 *
 */
namespace App\EventListener;

use App\Entity\AchatNourriture;
use App\Repository\AchatNourritureRepository;
use App\Repository\FournisseurRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class AchatNourritureSubscriber
 * @package App\EventListener
 */
class AchatNourritureSubscriber implements EventSubscriberInterface
{
    /** @var AchatNourritureRepository  */
    private $repositoryAchatNourriture;
    /** @var  */
    private $repositoryFournisseur;

    /**
     * AchatNourritureSubscriber constructor.
     *
     * @param AchatNourritureRepository $repositoryAchatNourriture
     * @param FournisseurRepository $repositoryFournisseur
     */
    public function __construct(AchatNourritureRepository $repositoryAchatNourriture, FournisseurRepository $repositoryFournisseur)
    {
        $this->repositoryAchatNourriture = $repositoryAchatNourriture;
        $this->repositoryFournisseur = $repositoryFournisseur;
    }

    /**
     * @return array|string[]
     */
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'onPreSetData'];
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetData(FormEvent $event)
    {
        $this
            ->initialiseDate($event)
            ->initialiseFournisseur($event);
        ;
    }

    /**
     * Dans le formulaire de creation, reprend la dernière date de création
     *
     * @param FormEvent $event
     *
     * @return $this
     */
    private function initialiseDate(FormEvent $event)
    {
        $achatNourriture = $event->getData();
        $derniereDate = $this->repositoryAchatNourriture->findLastDate();
        if (empty($achatNourriture)) {
            $achatNourriture = new AchatNourriture();
        }
        $achatNourriture->setDate($derniereDate);

        return $this;
    }

    /**
     * Dans le formulaire de création reprend le dernier fournisseur choisi
     *
     * @param FormEvent $event
     *
     * @return $this
     */
    private function initialiseFournisseur(FormEvent $event)
    {
        $achatNourriture = $event->getData();
        $dernierFournisseur = $this->repositoryFournisseur->findLastDate();
        if (empty($achatNourriture)) {
            $achatNourriture = new AchatNourriture();
        }
        $achatNourriture->setFournisseur($dernierFournisseur);

        return $this;
    }
}