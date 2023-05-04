<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    public function index(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $this->validate($_POST);
        }
        return $this->twig->render('Contact/contact.html.twig', ['errors' => $errors ?? []]);
    }

    private function validate(array $contact)
    {
        $errors = [];

        foreach ($contact as $key => $value) {
            $contact[$key] = trim(($value));
        }

        if (empty($contact['user_firstname'])) {
            $errors[] = 'Le prénom est obligatoire';
        }
        if (empty($contact['user_lastname'])) {
            $errors[] = 'Le nom est obligatoire';
        }

        if (empty($contact['user_email'])) {
            $errors[] = 'L\'email est obligatoire';
        }
        if (!filter_var($contact['user_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email est incorrect";
        }
        if (empty($contact['user_number'])) {
            $errors[] = 'Le numéro de téléphone est obligatoire';
        }
        if (empty($contact['user_message'])) {
            $errors[] = 'Le message est obligatoire';
        }
        return $errors;
    }
}
