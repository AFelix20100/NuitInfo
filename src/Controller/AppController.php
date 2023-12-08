<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\QuizFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\FAQ;
use App\Repository\FAQRepository;
use App\Entity\User;
use App\Repository\QuestionsRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

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

    #[Route('/quiz2', name: 'app_quiz')]
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

    // #[Route('/quiz-felix', name: 'app_quiz-felix')]
    // public function quizFelix(EntityManagerInterface $entityManager, Request $request): Response
    // {
    //     $connection = $entityManager->getConnection();
    //     $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10;";
    //     $result = $connection->fetchAllAssociative($sql);

    //     $form = $this->createForm(QuizFormType::class, ['questions' => $result]);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // Faites quelque chose avec le quiz (par exemple, enregistrez-le en base de données)

    //         // Redirigez ou affichez un message de succès
    //     }

    //     return $this->render('question/test.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
    #[Route('/quiz-felix', name: 'app_quiz-felix')]

    public function quizFelix(Request $request): Response
    {
        $form = $this->createForm(QuizFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des réponses du quiz, par exemple, enregistrement en base de données
            // $data = $form->getData();
            // Faites quelque chose avec les réponses
        }

        return $this->render('question/test.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}