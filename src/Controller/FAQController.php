<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\FAQ;
use App\Repository\FAQRepository;

class FAQController extends AbstractController
{
    #[Route('/faq', name: 'app_faq')]
    public function index(FAQRepository $faqRepository): Response
    {
        $faq = $faqRepository->findAll();
        // dd($faq);
        return $this->render('faq/index.html.twig', [
            'controller_name' => 'FAQController',
            'faqList' => $faq,
        ]);
    }
}
