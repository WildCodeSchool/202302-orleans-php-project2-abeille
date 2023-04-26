<?php

namespace App\Controller;

use App\Model\PartnerManager;
use Symfony\Component\Config\Definition\VariableNode;

class AdminPartnerController extends AbstractController
{
    public function index(): string
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll();

        return $this->twig->render('Admin/Partner/index.html.twig', ['partners' => $partners]);
    }


    public function create()
    {
        $errors = $partner = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partner = array_map('trim', $_POST);

            if (empty($partner['logo'])) {
                $errors[] = 'Le champ logo est obligatoire';
            }

            $maxLength = 255;
            if (mb_strlen($partner['logo']) > $maxLength) {
                $errors[] = 'Le champ logo doit faire moins de ' . $maxLength . ' caractères';
            }

            if (!filter_var($partner, FILTER_VALIDATE_URL)) {
                $errors[] = "L'URL est invalide";
            }

            if (empty($partner['link'])) {
                $errors[] = 'Le champ lien est obligatoire';
            }

            $maxLength = 255;
            if (mb_strlen($partner['link']) > $maxLength) {
                $errors[] = 'Le champ lien doit faire moins de ' . $maxLength . ' caractères';
            }

            if (!filter_var($partner, FILTER_VALIDATE_URL)) {
                $errors[] = "L'URL est invalide";
            }

            if (empty($errors)) {
                $partnerManager = new PartnerManager();
                $partnerManager->insert($partner);
                header('Location: /admin/partenaire');
            }

            return $this->twig->render('Admin/Partner/create.html.twig', [
                'errors' => $errors,
                'partner' => $partner,
            ]);
        }
    }
}
