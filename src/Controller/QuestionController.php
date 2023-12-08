<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuestionsRepository;
use App\Entity\Questions;
use App\Form\QuestionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;



class QuestionController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function quiz(QuestionsRepository $questionsRepository, Request $request): Response
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
        $builder = $this->createFormBuilder();
        foreach($finalQuestions as $une_question){
            $builder->add("Question".$une_question->getId(), RadioType::class, [
                'label' => $une_question->getQuestion(),
            ]);
        }
        $builder->add('save', SubmitType::class, ['label' => 'Submit']);
        
        $form = $builder->getForm();
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
        }
    
        return $this->render('question/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}