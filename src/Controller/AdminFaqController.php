<?php

namespace App\Controller;

use App\Model\FaqManager;

class AdminFaqController extends AbstractController
{
    public function index(): string
    {
        $faqManager = new FaqManager();
        $faqs = $faqManager->selectAll();

        return $this->twig->render('Admin/Faq/adminIndex.html.twig', ['faq' => $faqs]);
    }

    private function validate(array $faq): array
    {
        $errors = [];

        if (empty($faq['question'])) {
            $errors[] = 'Le champ question est obligatoire';
        }

        if (empty($faq['answer'])) {
            $errors[] = 'Le champ réponse est obligatoire';
        }
        return $errors;
    }

    public function add(): ?string
    {
        $errors = [];
        $faq = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $faq = array_map('trim', $_POST);
            $errors = $this->validate($faq);

            if (empty($errors)) {
                $faqManager = new FaqManager();
                $faq = $faqManager->insert($faq);

                header('Location:/admin/faq/ajouter');
            }
        }
        return $this->twig->render('Admin/Faq/adminAdd.html.twig', ['errors' => $errors, 'faq' => $faq]);
    }
}
