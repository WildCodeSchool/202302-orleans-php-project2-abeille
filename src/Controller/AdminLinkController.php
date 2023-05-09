<?php

namespace App\Controller;

use App\Model\LinkManager;

class AdminLinkController extends AbstractController
{
    public function index(): string
    {
        $linkManager = new LinkManager();
        $links = $linkManager->selectAll();

        return $this->twig->render('Admin/Link/adminIndex.html.twig', ['links' => $links]);
    }

    private function validate(array $link): array
    {
        $errors = [];

        if (empty($link['name'])) {
            $errors[] = 'Le champ nom est obligatoire';
        }

        $maxLength = 255;

        if (mb_strlen($link['name']) > $maxLength) {
            $errors[] = 'Le champ nom doit faire moins de ' . $maxLength . ' caractères';
        }

        if (empty($link['webAdress'])) {
            $errors[] = 'Le champ url est obligatoire';
        }

        $maxLength = 255;

        if (mb_strlen($link['webAdress']) > $maxLength) {
            $errors[] = 'Le champ url doit faire moins de ' . $maxLength . ' caractères';
        }

        if (!filter_var($link['webAdress'], FILTER_VALIDATE_URL)) {
            $errors[] = "L'URL n'est pas valide";
        }
        return $errors;
    }

    public function add(): ?string
    {
        $errors = [];
        $link = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $link = array_map('trim', $_POST);
            $errors = $this->validate($link);

            if (empty($errors)) {
                $linkManager = new LinkManager();
                $link = $linkManager->insert($link);

                header('Location:/admin/lien/ajouter');
            }
        }
        return $this->twig->render('Admin/Link/adminAdd.html.twig', ['errors' => $errors, 'link' => $link]);
    }
}
