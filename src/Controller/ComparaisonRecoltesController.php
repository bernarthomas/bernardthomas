<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Helper\ComparaisonRecolte;

class ComparaisonRecoltesController extends AbstractController
{
    /** @var ComparaisonRecolte  */
    private $helper;

    public function __construct(ComparaisonRecolte $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @Route("/comparaison/recoltes", name="comparaison_recoltes")
     */
    public function index(Request $request)
    {
        $idCulture = $request->query->get('culture');
        if (!empty($idCulture)) {
            $this->helper
                ->setIdCulture($idCulture)
            ;
        }
        $this->helper
            ->initialiseFiltre()
            ->initialiseDonnees()
            ->decore()
        ;

        return $this->render('comparaison_recoltes/index.html.twig', [
            'culture' => $idCulture,
            'donnees' => $this->helper->getDonnees(),
            'filtre' => $this->helper->getFiltre()
        ]);
    }
}
