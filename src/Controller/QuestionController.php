<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuestionsRepository;
use App\Entity\Questions;
use App\Form\QuestionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use App\Entity\User;
use App\Entity\UserQuiz;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class QuestionController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function quiz(QuestionsRepository $questionsRepository, Request $request,EntityManagerInterface $entityManager): Response
    {
        $questions = $questionsRepository->findAllQuestions();
        $finalQuestions = [];
        $range = (count($questions) > 19) ? 20 : count($questions); 
        $uniqueRandomNumbers = [];
    
        while (count($uniqueRandomNumbers) < $range) {
            $randomNumber = rand(0, count($questions) - 1);
    
            if (!in_array($randomNumber, $uniqueRandomNumbers)) {
                $uniqueRandomNumbers[] = $randomNumber;
                $finalQuestions[] = $questions[$randomNumber];
            }
        }
        $builder = $this->createFormBuilder(null,['allow_extra_fields' => true]);
        foreach($finalQuestions as $une_question){
            $builder->add($une_question->getId(), CheckboxType::class, [
                'label' => $une_question->getQuestion(),
                'required' => false,
            ]);
        }
        $builder->add('save', SubmitType::class, ['label' => 'Submit']);
        $form = $builder->getForm();
        $form->handleRequest($request);
        $score = 0;
        
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            #dd($data);
            foreach ($data as $key => $value) 
            {
                foreach($finalQuestions as $question){
                    if ($question->getId() == $key){
                        if($question->isAnswer() == $value){
                            $score += 1;
                        }      
                    }
                }
            }
            $user = $this->getUser();
            if($user){
                if ($score > 15){
                    $this->$user->setCertificat(true);
                }
                $date = new \DateTime();
                $quiz = new UserQuiz();
                $quiz->setDate($date);
                $quiz->setUser($user);
                $quiz->setResult($score);
                $entityManager->persist($quiz);
                $entityManager->flush();
            }
        }
    
        return $this->render('question/index.html.twig', [
            'form' => $form->createView(),
            'score' => $score
        ]);
    }
    
}