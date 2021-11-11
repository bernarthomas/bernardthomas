<?php

namespace App\Controller;

use App\Form\ExporterType;
use App\Repository\ExportTacheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \DateTime;

class ExportController extends AbstractController
{
    /**
     * @Route("/taches/export", name="export_taches")
     */
    public function exporter(Request $request, ExportTacheRepository $repositoryExportTache)
    {
        $aujourdhui = new DateTime('2020-12-22');
        $debut = (new DateTime('first day of this month'))->setTime(0,0,0);
        $fin = (new DateTime('last day of this month'))->setTime(23,59,59);
        $formulaire = $this->createForm(ExporterType::class, ['code' => 'export_' . $aujourdhui->format('Ymd'), 'debut' => $debut, 'fin' => $fin]);
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $donnees = $formulaire->getData();
            $donnees['debut'] = $donnees['debut']->format('Y-m-d H:i:s');
            $donnees['fin'] = $donnees['fin']->format('Y-m-d H:i:s');
            $repositoryExportTache->insertMultiple($donnees);

            return $this->redirectToRoute('admin_app_exporttache_list', ['filter' => ['code' => ['type' => null, 'value' => $donnees['code']]]]);
        }

        return $this->render('export/exporter.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    }
}
