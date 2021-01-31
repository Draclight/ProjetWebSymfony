<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Entity\Adresse;
use App\Form\PersonneType;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RecherchePersonneType;

/**
 * @Route("/personne")
 */
class PersonneController extends AbstractController
{
    /**
     * @Route("/", name="personne_index", methods={"GET","POST"})
     */
    public function index(PersonneRepository $personneRepository, Request $request): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(RecherchePersonneType::class, $adresse); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ville = $adresse->getVille();
            $rue = $adresse->getRue();
            $repo = $this->getDoctrine()->getManager()->getRepository(Personne::class);
            $personnes = $repo->findParVilleParRue($ville, $rue);
            dump($personnes);

            return $this->render('personne/index.html.twig', [
                'personnes' => $personnes,
                'form' => $form->createView(),
            ]);
        }

        return $this->render('personne/index.html.twig', [
            'personnes' => $personneRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="personne_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personne);
            $entityManager->flush();

            return $this->redirectToRoute('personne_index');
        }

        return $this->render('personne/new.html.twig', [
            'personne' => $personne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personne_show", methods={"GET"})
     */
    public function show(Personne $personne): Response
    {
        return $this->render('personne/show.html.twig', [
            'personne' => $personne,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personne_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Personne $personne): Response
    {
        $form = $this->createForm(PersonneType::class, $personne, array('nom_prenom_disabled'=>true));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personne_index');
        }

        return $this->render('personne/edit.html.twig', [
            'personne' => $personne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personne_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Personne $personne): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personne->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personne);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personne_index');
    }
}
