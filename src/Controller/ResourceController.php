<?php

namespace App\Controller;

use App\Model\LinkManager;
use App\Model\FaqManager;

class ResourceController extends AbstractController
{
    public function index(): string
    {
        $faqManager = new FaqManager();
        $faqs = $faqManager->selectAll();
        $linkManager = new LinkManager();
        $links = $linkManager->selectAll();

        return $this->twig->render('Resource/index.html.twig', ['faqs' => $faqs, 'links' => $links]);
    }
}
