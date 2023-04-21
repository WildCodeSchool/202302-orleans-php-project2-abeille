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

    private function validate(array $faqs): array
    {
        $errors = [];

        if (empty($faqs['question'])) {
            $errors[] = 'Le champ question est obligatoire';
        }

        if (empty($faqs['answer'])) {
            $errors[] = 'Le champ réponse est obligatoire';
        }
        return $errors;
    }

    public function add(): ?string
    {
        $errors = [];
        $faqs = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $faqs = array_map('trim', $_POST);

            // TODO validations (length, format...)
            $errors = $this->validate($faqs);
            // if validation is ok, insert and redirection
            if (empty($errors)) {
                $faqManager = new FaqManager();
                $faqs = $faqManager->insert($faqs);

                header('Location:/admin/faq/ajouter');
            }
        }
        return $this->twig->render('Admin/Faq/adminAdd.html.twig', ['errors' => $errors, 'faq' => $faqs]);
    }
}
