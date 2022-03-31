<?php

namespace App\Controller;

use App\Entity\EspaceDeCoworking;
use App\Form\EspaceDeCoworking1Type;
use App\Repository\EspaceDeCoworkingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/espace/de/coworking")
 */
class EspaceDeCoworkingController extends AbstractController
{
    /**
     * @Route("/{id}", name="app_espace_de_coworking_index", methods={"GET"})
     */
    public function index(EspaceDeCoworkingRepository $espaceDeCoworkingRepository): Response
    {
        return $this->render('espace_de_coworking/index.html.twig', [
            'espace_de_coworkings' => $espaceDeCoworkingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_espace_de_coworking_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EspaceDeCoworkingRepository $espaceDeCoworkingRepository): Response
    {
        $espaceDeCoworking = new EspaceDeCoworking();
        $form = $this->createForm(EspaceDeCoworking1Type::class, $espaceDeCoworking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $espaceDeCoworkingRepository->add($espaceDeCoworking);
            return $this->redirectToRoute('app_espace_de_coworking_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('espace_de_coworking/new.html.twig', [
            'espace_de_coworking' => $espaceDeCoworking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_espace_de_coworking_show", methods={"GET"})
     */
    public function show(EspaceDeCoworking $espaceDeCoworking): Response
    {
        return $this->render('espace_de_coworking/show.html.twig', [
            'espace_de_coworking' => $espaceDeCoworking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_espace_de_coworking_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EspaceDeCoworking $espaceDeCoworking, EspaceDeCoworkingRepository $espaceDeCoworkingRepository): Response
    {
        $form = $this->createForm(EspaceDeCoworking1Type::class, $espaceDeCoworking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $espaceDeCoworkingRepository->add($espaceDeCoworking);
            return $this->redirectToRoute('app_espace_de_coworking_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('espace_de_coworking/edit.html.twig', [
            'espace_de_coworking' => $espaceDeCoworking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_espace_de_coworking_delete", methods={"POST"})
     */
    public function delete(Request $request, EspaceDeCoworking $espaceDeCoworking, EspaceDeCoworkingRepository $espaceDeCoworkingRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espaceDeCoworking->getId(), $request->request->get('_token'))) {
            $espaceDeCoworkingRepository->remove($espaceDeCoworking);
        }

        return $this->redirectToRoute('app_espace_de_coworking_index', [], Response::HTTP_SEE_OTHER);
    }
}
