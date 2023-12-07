<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/decouvrir', name: 'app_decouvrir')]
    public function decouvrir(): Response
    {
        return $this->render('decouvrir.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/quiz', name: 'app_quiz')]
    public function quiz(): Response
    {
        return $this->render('quiz.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    
}