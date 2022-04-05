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
use Doctrine\ORM\QueryBuilder;


use App\Entity\EspaceDeCoworking;
use App\Entity\User;
use App\Entity\Reservation;
use App\Entity\Facture;
use App\Entity\EspaceSearch;
use App\Entity\Paiement;

use App\Repository\EspaceDeCoworkingRepository;
use App\Repository\UserRepository;
use App\Repository\ReservationRepository;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\EspaceDeCoworking1Type;
use App\Form\UserType;
use App\Form\UserModifType;
use App\Form\Reservation1Type;
use App\Form\EspaceSearchType;
use App\Form\PaiementType;
use App\Form\SearchEspaceType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class SearchController extends AbstractController
{
    /**
     * @Route("/espace/search", name="search_espace")
     */
    public function searchEspace(Request $request, EspaceDeCoworkingRepository $espaceRepository): Response
    {
        $searchEspaceForm = $this->createForm(SearchEspaceType::class);

        $vueFormulaireRecherche=$searchEspaceForm->createView();

        if($searchEspaceForm->handleRequest($request)->isSubmitted() && $searchEspaceForm->isValid())
        {
            $criteria = $searchEspaceForm->getData();
            
            $espaces = $espaceRepository->SearchEspace($criteria);

            return $this -> redirectToRoute('resultatRecherche',['espace' => $espaces]);
        }

        return $this->render('search/espace.html.twig', ['search_form'=>$vueFormulaireRecherche]);
    }
}

?>