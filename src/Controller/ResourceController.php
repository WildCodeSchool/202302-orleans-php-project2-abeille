<?php

namespace App\Controller;

use App\Model\FaqManager;

class ResourceController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $faqManager = new FaqManager();
        $faq = $faqManager->selectAll();

        return $this->twig->render('Resource/index.html.twig', ['faq' => $faq]);
    }
}
