<?php

namespace App\Controller;

use App\Model\PartnerManager;

class AdminPartnerController extends AbstractController
{
    public function index(): string
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll();

        return $this->twig->render('Admin/Partner/index.html.twig', ['partners' => $partners]);
    }

    public function create(): string
    {
        $errors = $partner = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partner = array_map('trim', $_POST);

            if (empty($partner['logo'])) {
                $errors[] = 'Le champ logo est obligatoire';
            }

            $maxLenght = 255;
            if (mb_strlen($partner['logo']) > $maxLenght) {
                $errors[] = 'Le champ logo doit faire moins de ' . $maxLenght . ' caractères';
            }

            if (empty($partner['link'])) {
                $errors[] = 'Le champ lien est obligatoire';
            }

            $maxLenght = 255;
            if (mb_strlen($partner['link']) > $maxLenght) {
                $errors[] = 'Le champ lien doit faire moins de ' . $maxLenght . ' caractères';
            }

            if (empty($errors)) {
                $partnerManager = new PartnerManager();
                $partnerManager->insert($partner);
                header('Location: /admin/partenaire');
            }
        }
        return $this->twig->render('Admin/Partner/create.html.twig', [
            'errors' => $errors,
            'partner' => $partner,
        ]);
    }
}
