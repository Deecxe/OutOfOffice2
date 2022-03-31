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
use App\Entity\Reservation;
use App\Entity\Facture;

use App\Repository\EspaceDeCoworkingRepository;
use App\Repository\UserRepository;
use App\Repository\ReservationRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\EspaceDeCoworkingType;
use App\Form\UserType;
use App\Form\UserModifType;
use App\Form\ReservationType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;


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
        $user = $this->getUser();
        $idUser = $user->getId();

        return $this->render('out_of_office/options.html.twig', [
            'controller_name' => 'OutOfOfficeController',
            'identifiant'=>$idUser,
 

            
        ]);
    }
    //--------------------------Modifier reservation--------------------------------------
    /**
     * @Route("/options/reservation/modifierReservation/{id}", name="modifierReservation")
     */
    public function modifierReservation(Request $request, EntityManagerInterface $manager,Reservation $reservation): Response
    {

        $formulaireReservation= $this->createForm(ReservationType::class,$reservation);

        $formulaireReservation->handleRequest($request);

        if( $formulaireReservation->isSubmitted())
        {
                $reservation = $formulaireReservation->getData();

                $manager->persist($reservation);
                $manager->flush();

                return $this -> redirectToRoute('Accueil');
            
        }
        $vueformulaireReservation=$formulaireReservation->createView();

        return $this->render('out_of_office/modifierReservation.html.twig', ['vueFormulaire'=> $vueformulaireReservation]);
            
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
     * @Route("/options/modifierProfil/{id}", name="modifierProfil")
     */
    public function modifierProfil(Request $request, EntityManagerInterface $manager,User $user): Response
    {
        if( !$this->getUser())
        {
            return $this->redirectToRoute('app_login');
        }

        $formulaireUser= $this->createForm(UserModifType::class,$user);

        $formulaireUser->handleRequest($request);

        if( $formulaireUser->isSubmitted())
        {
                $user = $formulaireUser->getData();

                $manager->persist($user);
                $manager->flush();
            
                $this->addFlash( 'succes', 'Profil modifié');

                return $this -> redirectToRoute('Accueil');
            
        }
        $vueFormulaireUser=$formulaireUser->createView();

        return $this->render('out_of_office/modifierProfil.html.twig', ['vueFormulaire'=> $vueFormulaireUser,]);
    }

    //--------------------------Ajout d'un espace--------------------------------------
    /**
     * @Route("/gerant/options/ajoutEspace", name="ajoutEspace")
     */
    public function ajoutEspace(Request $request, EntityManagerInterface $manager): Response
    {

        $espace = new EspaceDeCoworking();

        $user = $this->getUser();

        $formulaireEspace= $this->createForm(EspaceDeCoworkingType::class,$espace);

        $formulaireEspace->handleRequest($request); 

        if( $formulaireEspace->isSubmitted()  && $formulaireEspace->isValid())
        {
            $espace->setIdUser($user);
            $espace->setNombrePlaceLibre($espace->getNombrePlace());
            $manager->persist($espace);
            $manager->flush();
            return $this -> redirectToRoute('Accueil');
        }


        $vueFormulaireEspace=$formulaireEspace->createView();

        return $this->render('out_of_office/ajoutEspace.html.twig',['vueFormulaire'=> $vueFormulaireEspace,'action'=> "ajouter"]);
    }

      //--------------------------Modifier un espace--------------------------------------
    /**
     * @Route("/gerant/options/ModifierUnEspace", name="modifEspace")
     */
    public function modifEspace(Request $request, EntityManagerInterface $manager): Response
    {

        $formulaireEspace= $this->createForm(EspaceDeCoworkingType::class,$espace);

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

    //--------------------------Inscription--------------------------------------
    /**
     * @Route("/options/inscription", name="inscription")
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
    //--------------------------Liste reservation--------------------------------------
     /**
     * @Route("/options/reservation/{id}", name="reservation")
     */
    public function formation(ReservationRepository $repositoryReservation): Response
    {
        if( !$this->getUser())
        {
            return $this->redirectToRoute('app_login');
        }
        
        $reservations = $repositoryReservation->findAll();

        return $this->render('out_of_office/listeReservation.html.twig', ['controller_name' => 'MetierController','reservations'=>$reservations]);
    }
}
