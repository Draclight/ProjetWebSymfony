<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Personne;
use App\Form\AdresseType;
use App\Form\RechercheAdresseType;
use App\Repository\AdresseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/adresse")
 */
class AdresseController extends AbstractController
{
    /**
     * @Route("/", name="adresse_index", methods={"GET", "POST"})
     */
    public function index(AdresseRepository $adresseRepository, Request $request): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(RechercheAdresseType::class, $adresse); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ville = $adresse->getville();
            $repo = $this->getDoctrine()->getManager()->getRepository(Adresse::class);
            $adresses = $repo->findByVille($ville);

            return $this->render('adresse/index.html.twig', [
                'adresses' => $adresses,
                'form' => $form->createView(),
            ]);
        }

        return $this->render('adresse/index.html.twig', [
            'adresses' => $adresseRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="adresse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adresse);
            $entityManager->flush();

            return $this->redirectToRoute('adresse_index');
        }

        return $this->render('adresse/new.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adresse_show", methods={"GET"})
     */
    public function show(Adresse $adresse): Response
    {
        return $this->render('adresse/show.html.twig', [
            'adresse' => $adresse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adresse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adresse $adresse): Response
    {
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adresse_index');
        }

        return $this->render('adresse/edit.html.twig', [
            'adresse' => $adresse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adresse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Adresse $adresse): Response
    {
        $repo = $this->getDoctrine()->getManager()->getRepository(Personne::class);
        $personnes = $repo->findByAdresse($adresse);

        if(count($personnes) == 0) {
            if ($this->isCsrfTokenValid('delete'.$adresse->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($adresse);
                $entityManager->flush();
            }
        }
        return $this->redirectToRoute('adresse_index');
    }
}