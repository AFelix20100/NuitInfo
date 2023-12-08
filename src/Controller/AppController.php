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
use App\Entity\UserQuiz;
use App\Repository\QuestionsRepository;
use App\Repository\UserRepository;
use DateTime;
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

    // #[Route('/quiz', name: 'app_quiz')]
    // public function quiz(QuestionsRepository $questionsRepository): Response
    // {
    //     $data = $questionsRepository->findAll();
    //     $vingtPremiersElements = array_slice($data, 0, 20);
    //     return $this->render('quiz.html.twig', 
    //     [
    //         'vingtPremiersElements' => $vingtPremiersElements,
    //     ]);
    // }

    #[IsGranted('ROLE_USER')]
    #[Route('/profil', name: 'app_profil')]
    public function profil(UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        return $this->render('profil.html.twig', [
            'controller_name' => 'AppController',
            'user_data' => $user,
            'quiz' => $user->getQuiz(),
        ]);
    }

    #[Route('/quiz', name: 'app_quiz')]
    public function quizFelix(EntityManagerInterface $entityManager, Request $request): Response
    {
        $connection = $entityManager->getConnection();
        $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10;";
        $questions = $connection->fetchAllAssociative($sql);

        $form = $this->createForm(QuizFormType::class, ['questions' => $questions]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // Example to get only user answers from $form->getData()
            $formData = $form->getData();
            $userAnswers = [];

            foreach ($formData as $key => $value) {
                // Check if the key starts with "question_"
                if (strpos($key, 'question_') === 0) {
                    $userAnswers[$key] = $value;
                }
            }

            $score = $this->scoreCalculation($userAnswers, $formData["questions"]);

            $userQuiz = new UserQuiz();
            $userQuiz->setUser($this->getUser());   
            $userQuiz->setDate(new DateTime("now"));
            $userQuiz->setResult($score[0]);

            $entityManager->persist($userQuiz);
            $entityManager->flush();

            if($score[0] >= 8)
            {
                $user = $this->getUser();
                $user->setCertificat(1);
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('app_certificat');
            }

            //Render the results
            return $this->redirectToRoute('app_profil');
        }

        return $this->render('quiz.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    // #[Route('/quiz-felix', name: 'app_quiz-felix')]

    // public function quizFelix(Request $request): Response
    // {
    //     $form = $this->createForm(QuizFormType::class);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // Traitement des réponses du quiz, par exemple, enregistrement en base de données
    //         // $data = $form->getData();
    //         // Faites quelque chose avec les réponses
    //     }

    //     return $this->render('question/test.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
    

    #[Route('/418', name: 'app_teapot')]
    public function show(): Response {
        return $this->render('bundles\TwigBundle\Exception\error418.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    private function scoreCalculation($userAnswers, $answers)
    {
        $numberGoodAnswers = 0;
        $numberBadAnswers = 0;
        $counter = 0;
        
        foreach($userAnswers as $oneAnswer)
        {
            if($oneAnswer == $answers[$counter]["answer"])
            {
                $numberGoodAnswers++;
            }
            else
            {
                $numberBadAnswers++;
            }
            $counter++;
        }

        return [$numberGoodAnswers,$numberBadAnswers];
    }
}