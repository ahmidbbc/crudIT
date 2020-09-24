<?php

namespace App\Controller;

use App\Entity\Danse;
use App\Form\DanseType;
use App\Repository\DanseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/danses")
 */
class DanseController extends AbstractController
{
    /**
     * @Route("/", name="danse_index", methods={"GET"})
     */
    public function index(DanseRepository $danseRepository): Response
    {
        return $this->render('danse/index.html.twig', [
            'danses' => $danseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="danse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $danse = new Danse();
        $form = $this->createForm(DanseType::class, $danse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($danse);
            $entityManager->flush();

            return $this->redirectToRoute('danse_index');
        }

        return $this->render('danse/new.html.twig', [
            'danse' => $danse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="danse_show", methods={"GET"})
     */
    public function show(Danse $danse): Response
    {
        return $this->render('danse/show.html.twig', [
            'danse' => $danse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="danse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Danse $danse): Response
    {
        $form = $this->createForm(DanseType::class, $danse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('danse_index');
        }

        return $this->render('danse/edit.html.twig', [
            'danse' => $danse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="danse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Danse $danse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$danse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($danse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('danse_index');
    }
}
