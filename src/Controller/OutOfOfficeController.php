<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OutOfOfficeController extends AbstractController
{
    //--------------------------Accueil--------------------------------------
    /**
     * @Route("/", name="Accueil")
     */
    public function index(): Response
    {
        return $this->render('out_of_office/index.html.twig', [
            'controller_name' => 'OutOfOfficeController',
        ]);
    }

    //--------------------------Résultats recherche--------------------------------------
    /**
     * @Route("/resultatRecherche", name="resultatRecherche")
     */
    public function resultatRecherche(): Response
    {
        return $this->render('out_of_office/resultatRecherche.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
}
