<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\FAQ;
use App\Repository\FAQRepository;
use App\Entity\User;
use App\Repository\UserRepository;

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
    public function decouvrir(FAQRepository $faqRepository): Response
    {
        $faq = $faqRepository->findAll();
        return $this->render('faq.html.twig', [
            'controller_name' => 'AppController',
            'faqList' => $faq,
        ]);
    }

    #[Route('/quiz2', name: 'app_quiz2')]
    public function quiz(): Response
    {
        return $this->render('quiz.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/profil', name: 'app_profil')]
    public function profil(UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        return $this->render('profil.html.twig', [
            'controller_name' => 'AppController',
            'user_data' => $user,
        ]);
    }

    #[Route('/418', name: 'app_teapot')]
    public function teapot(): Response {
        return $this->render('bundles\TwigBundle\Exception\error418.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}