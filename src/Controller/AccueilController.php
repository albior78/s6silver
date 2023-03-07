<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/')]
    public function index(): Response
    {
       return $this->redirectToRoute('RouteAccueil');
    }

    #[Route('/accueil', name: 'RouteAccueil')]
    public function accueil(): Response
    {
        return $this->render('accueil/accueil.html.twig', [
            
        ]);
    }
}
