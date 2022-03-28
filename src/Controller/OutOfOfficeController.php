<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\EspaceDeCoworking;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\EspaceDeCoworking;
use App\Repository\EspaceDeCoworkingRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


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
     * @Route("/options/modifierReservation/{id}", name="modifierReservation")
     */
    public function modifierReservation(): Response
    {
        return $this->render('out_of_office/modifierReservation.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Annuler une réservation--------------------------------------
    /**
     * @Route("/options/annulerReservation/{id}", name="annulerReservation")
     */
    public function annulerReservation(): Response
    {
        return $this->render('out_of_office/annulerReservation.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            
        ]);
    }
    //--------------------------Consulter factures reçues--------------------------------------
    /**
     * @Route("/options/consulterFactures/{id}", name="consulterFactures")
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

    //--------------------------Ajout d'un espace--------------------------------------
    /**
     * @Route("/options/ajoutEspace", name="ajoutEspace")
     */
    public function ajoutEspace(Request $request, EntityManagerInterface $manager): Response
    {
        $espace = new EspaceDeCoworking();

        $formulaireEspace= $this->createFormBuilder($espace)

        ->add('url', UrlType::class)
        ->add('titre', TextareaType::class)
        ->add('prix', NumberType::class)
        ->add('adresse', TextareaType::class)
        ->add('descriptif', TextareaType::class)
        ->add('imprimante', CheckboxType::class)
        ->add('parking', CheckboxType::class)
        ->add('cafe', CheckboxType::class)
        ->add('heureOuverture', TextareaType::class)
        ->add('heureFermeture', TextareaType::class)
        ->add('nombrePlace', NumberType::class)
        ->add('nombrePlaceLibre', NumberType::class)


        ->getForm();

        $formulaireEspace->handleRequest($request);

        if( $formulaireEspace->isSubmitted()  && $formulaireEspace->isValid())
        {
            $manager->persist($espace);
            $manager->flush();
            return $this -> redirectToRoute('ajoutEspace');
        }


        $vueFormulaireEspace=$formulaireEspace->createView();

        return $this->render('out_of_office/ajoutEspace.html.twig',['vueFormulaire'=> $vueFormulaireEspace]);
    }
}
