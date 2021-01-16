<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="projet")
     */
    public function accueil(): Response
    {
        return $this->render('projet/accueil.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }
}
