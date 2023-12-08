<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TetrisController extends AbstractController
{
    #[Route('/tetris', name: 'app_tetris')]
    public function index(): Response
    {
        
        return $this->render('bundles\TwigBundle\Exception\error404.html.twig', [
            'controller_name' => 'TetrisController',
        ]);
    }
}
