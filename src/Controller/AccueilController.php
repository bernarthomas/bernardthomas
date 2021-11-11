<?php
/**
 *
 */
namespace App\Controller;

use App\Service\Helper\Accueil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use tidy;

/**
 * Class AccueilController
 * @package App\Controller
 */
class AccueilController extends Controller
{
    /**
     * AccueilController constructor.
     *
     * @param Accueil $helper
     */
    public function __construct(Accueil $helper)
    {
        parent::__construct($helper);
    }

    /**
     * http://bernardthomas/index.php/synthese_2020
     *
     * @Route("/", name="accueil")
     *
     * @return Response
     */
    public function billets(Request $request)
    {
        $formulaire = $this->helper->initialiseFormulaire();

        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $this->helper->setFiltre($formulaire->getData());
        }
        $this->helper->initialiseDonnees();
        $billet = $this->helper->getBillet();
        $donnees = $this->helper->getDonnees();

        return $this->render($billet->getTemplate(), [
            'donnees' => $donnees,
            'formulaire' => $formulaire->createView()
        ]);
    }

    /**
     * @param $parametre
     *
     * @return Response
     */
    public function billet($parametre)
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
