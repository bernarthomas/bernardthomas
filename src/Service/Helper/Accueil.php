<?php
namespace App\Service\Helper;

use App\Entity\Billet;
use App\Form\RecolteFiltreType;
use App\Repository\BilletRepository;
use App\Repository\RecolteRepository;
use App\Service\Decorateur;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

Class Accueil extends Helper implements HelperInterface
{
    /** @var Billet */
    private $billet;

    /** @var array */
    private $donnees;

    /** @var array */
    private $filtre;

    /** @var FormFactoryInterface  */
    private $formFactory;

    /** @var Request|null  */
    private $request;

    /** @var BilletRepository  */
    private $repositoryBillet;

    /** @var RecolteRepository  */
    private $repositoryRecolte;

    /**
     * Accueil constructor.
     *
     * @param Decorateur $decorateur
     * @param BilletRepository $repositoryBillet
     * @param FormFactoryInterface $formFactory
     * @param RecolteRepository $repositoryRecolte
     * @param RequestStack $requestStack
     */
    public function __construct(
        Decorateur $decorateur,
        BilletRepository $repositoryBillet,
        FormFactoryInterface $formFactory,
        RecolteRepository $repositoryRecolte,
        RequestStack $requestStack
    ) {
        parent::__construct($decorateur);
        $this->formFactory = $formFactory;
        $this->repositoryBillet = $repositoryBillet;
        $this->repositoryRecolte = $repositoryRecolte;
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return $this
     */
    public function initialiseDonnees()
    {
        $this->billet = $this->repositoryBillet->findOneBy(['uri' => '/' . $this->request->get('parametre'), 'actif' => true]);
        $this->decorateur->setBillet($this->billet);
        $uri = $this->billet->getUri();
        $annee = trim(strrchr($uri, '_'), '_');
        $this->donnees = $this->repositoryRecolte->findSynthese($annee, $this->filtre ?? []);

        return $this;
    }

    public function initialiseFormulaire()
    {
        return $this->formFactory->create(RecolteFiltreType::class);
    }

    /**
     * @return mixed
     */
    public function getBillet()
    {
        return $this->billet;
    }

    /**
     * @return array
     */
    public function getDonnees(): array
    {
        return $this->donnees;
    }

    public function setFiltre(array $filtre)
    {
        $this->filtre = $filtre;
    }
}
