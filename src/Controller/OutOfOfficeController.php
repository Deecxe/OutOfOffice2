<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\EspaceDeCoworking;

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
        $repositoryEspaceDeCoworking = $this->getDoctrine()->getRepository(EspaceDeCoworking::class);
        
        $espaceDeCoworking = $repositoryEspaceDeCoworking->findAll();
    
        return $this->render('out_of_office/resultatRecherche.html.twig', ['espaceDeCoworking'=>$espaceDeCoworking]);
    }

    //--------------------------Options--------------------------------------
    /**
     * @Route("/options", name="options")
     */
    public function options(): Response
    {
        return $this->render('out_of_office/options.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Modifier reservation--------------------------------------
    /**
     * @Route("/options/modifierReservation", name="modifierReservation")
     */
    public function modifierReservation(): Response
    {
        return $this->render('out_of_office/modifierReservation.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Annuler une réservation--------------------------------------
    /**
     * @Route("/options/annulerReservation", name="annulerReservation")
     */
    public function annulerReservation(): Response
    {
        return $this->render('out_of_office/annulerReservation.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Consulter factures reçues--------------------------------------
    /**
     * @Route("/options/consulterFactures", name="consulterFactures")
     */
    public function consulterFactures(): Response
    {
        return $this->render('out_of_office/consulterFactures.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Modifier mon profil--------------------------------------
    /**
     * @Route("/options/modifierProfil", name="modifierProfil")
     */
    public function modifierProfil(): Response
    {
        return $this->render('out_of_office/modifierProfil.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Deconnexion--------------------------------------
    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion(): Response
    {
        return $this->render('out_of_office/deconnexion.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
}
