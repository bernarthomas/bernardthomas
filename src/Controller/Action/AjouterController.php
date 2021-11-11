<?php

namespace App\Controller\Action;

use App\Service\Action\Action;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AjouterController
{
    public function __invoke(Request $request, Environment $twig, Action $sfServ)
    {
        $form = $sfServ->getForm();
        if ($form->isSubmitted() && $form->isValid()) {
            $sfServ->update($form->getData());
        }
        return new Response($twig->render('action/ajouter.html.twig', [
            'form' => $form->createView(),
            'list' => $sfServ->getList()
        ]));
    }
}
