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

    private function validate(array $partner): array
    {
        $errors = [];

        if (empty($partner['name'])) {
            $errors[] = 'Le champ nom est obligatoire';
        }

        $maxLength = 255;

        if (mb_strlen($partner['name']) > $maxLength) {
            $errors[] = 'Le champ nom doit faire moins de ' . $maxLength . ' caractères';
        }

        if (empty($partner['link'])) {
            $errors[] = 'Le champ lien est obligatoire';
        }

        $maxLength = 255;

        if (mb_strlen($partner['link']) > $maxLength) {
            $errors[] = 'Le champ nom doit faire moins de ' . $maxLength . ' caractères';
        }

        if (!filter_var($partner['link'], FILTER_VALIDATE_URL)) {
            $errors[] = "L'URL n'est pas valide";
        }

        return $errors;
    }

    public function update(int $id): string
    {

        $partnerManager = new PartnerManager();
        $partner = $partnerManager->selectOneById($id);

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partner = array_map('trim', $_POST);

            $errors = $this->validate($partner);

            if (empty($errors)) {
                $partnerManager = new PartnerManager();
                $partner['id'] = $id;
                $partnerManager->update($partner);
                header('Location: /admin/partenaire');
            }
        }

        return $this->twig->render('Admin/Partner/update.html.twig', ['errors' => $errors, 'partner' => $partner,]);
    }

    public function create()
    {
        $errors = $partner = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partner = array_map('trim', $_POST);

            $errors = $this->validate($partner);

            if (empty($errors)) {
                $partnerManager = new PartnerManager();
                $partnerManager->insert($partner);
                header('Location: /admin/partenaire');
            }
        }

        return $this->twig->render('Admin/Partner/create.html.twig', ['errors' => $errors, 'partner' => $partner]);
    }
}
