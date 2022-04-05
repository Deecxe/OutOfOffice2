<?php

namespace App\Controller;

use App\Entity\Paiement;
use App\Entity\Reservation;
use App\Entity\Facture;
use App\Form\PaiementType;
use App\Repository\PaiementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/paiement")
 */
class PaiementController extends AbstractController
{
    /**
     * @Route("/", name="app_paiement_index", methods={"GET"})
     */
    public function index(PaiementRepository $paiementRepository): Response
    {
        return $this->render('paiement/index.html.twig', [
            'paiements' => $paiementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="app_paiement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $manager, PaiementRepository $paiementRepository, Reservation $reservations): Response
    {
        $user = $this->getUser();

        $paiement = new Paiement();
        $form = $this->createForm(PaiementType::class, $paiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paiementRepository->add($paiement);

            $facture = new Facture();

            $facture->setIdUsers($user);
            
            $reservations->getId();
            $facture->setIdReservationn($reservations);

            $manager->persist($facture);
            $manager->flush();

            return $this->redirectToRoute('Accueil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('paiement/new.html.twig', [
            'paiement' => $paiement,
            'form' => $form->createView(),'reservation'=>$reservations
        ]);
    }

    /**
     * @Route("/show/{id}", name="app_paiement_show", methods={"GET"})
     */
    public function show(Paiement $paiement): Response
    {
        return $this->render('paiement/show.html.twig', [
            'paiement' => $paiement,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="app_paiement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Paiement $paiement, PaiementRepository $paiementRepository): Response
    {
        $form = $this->createForm(PaiementType::class, $paiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paiementRepository->add($paiement);
            return $this->redirectToRoute('app_paiement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('paiement/edit.html.twig', [
            'paiement' => $paiement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="app_paiement_delete", methods={"POST"})
     */
    public function delete(Request $request, Paiement $paiement, PaiementRepository $paiementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paiement->getId(), $request->request->get('_token'))) {
            $paiementRepository->remove($paiement);
        }

        return $this->redirectToRoute('app_paiement_index', [], Response::HTTP_SEE_OTHER);
    }
}
