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

            if ($_FILES['image']['error'] !== 0) {
                $errors[] = 'Problème avec l\'upload, veuillez rééssayer';
            } else {
                $limitFileSize = 1000000;
                if ($_FILES['image']['size'] > $limitFileSize) {
                    $errors[] = 'Le fichier doit faire moins de ' . $limitFileSize / 1000000 . 'MO';
                }

                $authorizedMimes = ['logo/jpeg', 'logo/png', 'logo/jpg', 'logo/webp'];
                if (in_array(mime_content_type($_FILES['image']['tmp_name']), $authorizedMimes)) {
                    $errors[] = 'Le type de fichier est incorrect. Types autorisés: ' . implode(', ', $authorizedMimes);
                }
            }

            if (empty($errors)) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $baseFileName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
                $imageName = uniqid($baseFileName, more_entropy: true) . '.' . $extension;
                $partner['logo'] = $imageName;
                $partnerManager = new PartnerManager();
                $partnerManager->insert($partner);
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../public/uploads/' . $imageName);
                header('Location: /admin/partenaire');
            }
        }

        return $this->twig->render('Admin/Partner/create.html.twig', ['errors' => $errors, 'partner' => $partner]);
    }

    public function delete(int $id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partnerManager = new PartnerManager();
            $partnerManager->delete($id);
            header('Location: /admin/partenaire');
        }
    }
}
