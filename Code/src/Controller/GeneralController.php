<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class GeneralController extends AbstractController
{
    /**
     * @Route("/general", name="general")
     */
    public function accueil(): Response
    {
        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'GeneralController',
        ]);
    }

/**
* @Route("/menu", name="menu")
*/
public function menu() {
    return $this->render('general/menu.html.twig');
    }
}
