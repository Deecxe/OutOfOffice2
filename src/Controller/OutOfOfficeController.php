<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\EspaceDeCoworking;
use App\Entity\User;

use App\Repository\EspaceDeCoworkingRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\EspaceDeCoworkingType;
use App\From\UserType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


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
     * @Route("/gerant/options/ajoutEspace", name="ajoutEspace")
     */
    public function ajoutEspace(Request $request, EntityManagerInterface $manager): Response
    {
        $espace = new EspaceDeCoworking();

        $formulaireEspace= $this->createForm(EspaceDeCoworkingType::class,$espace);

        $formulaireEspace->handleRequest($request); 

        if( $formulaireEspace->isSubmitted()  && $formulaireEspace->isValid())
        {
            $manager->persist($espace);
            $manager->flush();
            return $this -> redirectToRoute('Accueil');
        }


        $vueFormulaireEspace=$formulaireEspace->createView();

        return $this->render('out_of_office/ajoutEspace.html.twig',['vueFormulaire'=> $vueFormulaireEspace,'action'=> "ajouter"]);
    }

      //--------------------------Modifier un espace--------------------------------------
    /**
     * @Route("/gerant/options/Modifier un espace", name="modifEspace")
     */
    public function modifEspace(Request $request, EntityManagerInterface $manager): Response
    {

        $formulaireEntreprise= $this->createForm(EntrepriseType::class,$entreprise);

        $formulaireEspace->handleRequest($request); 

        if( $formulaireEspace->isSubmitted())
        {
            $manager->persist($espace);
            $manager->flush();
            return $this -> redirectToRoute('Accueil');
        }


        $vueFormulaireEspace=$formulaireEspace->createView();

        return $this->render('out_of_office/ajoutEspace.html.twig',['vueFormulaire'=> $vueFormulaireEspace,'action'=> "modifier"]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder): Response
    {

        $user= New User();

        $formulaireUser= $this->createForm(UserType::class,$user);


        $formulaireUser->handleRequest($request);

        if( $formulaireUser->isSubmitted() && $formulaireUser->isValid())
        {
            if($user->getEstGerant() == true)
            {
                $user->setRoles(['ROLE_CLIENT','ROLE_GERANT']);
                
            }
            else
            {
                $user->setRoles(['ROLE_CLIENT']);
            }
            
            $encodagePassword = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($encodagePassword);

            $manager->persist($user);
            $manager->flush();

            return $this -> redirectToRoute('app_login');
        }
        $vueformulaireUser=$formulaireUser->createView();


        return $this->render('out_of_office/inscription.html.twig',['vueFormulaire'=> $vueformulaireUser]);
    }
}
