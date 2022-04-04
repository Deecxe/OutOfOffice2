<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facture")
 */
class FactureController extends AbstractController
{
    /**
     * @Route("/{id}", name="app_facture_index", methods={"GET"})
     */
    public function index(FactureRepository $factureRepository,$id): Response
    {

        $facture = $factureRepository->findByidUser($id);
        return $this->render('facture/index.html.twig', [
            'factures' => $facture,
        ]);
    }

    /**
     * @Route("/show/{id}", name="app_facture_show", methods={"GET"})
     */
    public function show(Facture $facture): Response
    {
        return $this->render('facture/show.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="app_facture_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Facture $facture, FactureRepository $factureRepository): Response
    {
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $factureRepository->add($facture);
            return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facture/edit.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="app_facture_delete", methods={"POST"})
     */
    public function delete(Request $request, Facture $facture, FactureRepository $factureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facture->getId(), $request->request->get('_token'))) {
            $factureRepository->remove($facture);
        }

        return $this->redirectToRoute('app_facture_index', [], Response::HTTP_SEE_OTHER);
    }
}
