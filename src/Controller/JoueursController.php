<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Form\JoueurType;
use App\Repository\JoueurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/joueurs")
 */
class JoueursController extends AbstractController
{
    /**
     * @Route("/", name="joueurs_index", methods={"GET"})
     */
    public function index(JoueurRepository $joueurRepository): Response
    {
        return $this->render('joueurs/index.html.twig', [
            'joueurs' => $joueurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="joueurs_new", methods={"GET","POST"})
     * 
     */
    public function new(Request $request): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($joueur);
            $entityManager->flush();
            
            $this->addFlash(
                'notice',
                'Joueur créé avec succes!'
            );
            

            return $this->redirectToRoute('joueurs_index');
        }

        return $this->render('joueurs/new.html.twig', [
            'joueur' => $joueur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="joueurs_show", methods={"GET"})
     */
    public function show(Joueur $joueur): Response
    {
        return $this->render('joueurs/show.html.twig', [
            'joueur' => $joueur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="joueurs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Joueur $joueur): Response
    {
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'notice',
                'Joueur modifié avec succes!'
            );

            return $this->redirectToRoute('joueurs_index');
        }

        return $this->render('joueurs/edit.html.twig', [
            'joueur' => $joueur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="joueurs_delete", methods={"POST"})
     */
    public function delete(Request $request, Joueur $joueur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$joueur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($joueur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('joueurs_index');
    }
}
