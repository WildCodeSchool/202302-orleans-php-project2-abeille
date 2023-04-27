<?php

namespace App\Controller;

use App\Model\EventManager;
use DateTime;

class AdminEventController extends AbstractController
{
    public function index(): string
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();

        return $this->twig->render('Admin/Event/adminIndex.html.twig', ['events' => $events]);
    }

    private function validate(array $event): array
    {
        $errors = [];
        $lengthName = 255;
        if (empty($event['name'])) {
            $errors[] = 'Le champ name est obligatoire';
        }
        if (mb_strlen($event['name']) > $lengthName) {
            $errors[] = 'le champ nom ne doit pas faire plus de ' . $lengthName . ' caractères';
        }
        if (empty($event['description'])) {
            $errors[] = 'Le champ description est obligatoire';
        }
        if (empty($event['location'])) {
            $errors[] = 'Le champ location est obligatoire';
        }
        $lengthLocation = 150;
        if (mb_strlen($event['location']) > $lengthLocation) {
            $errors[] = 'le champ location ne doit pas faire plus de ' . $lengthLocation . ' caractères';
        }
        if (empty($event['date'])) {
            $errors[] = 'Le champ date est obligatoire';
        }
        $dateTime =  new DateTime($event['date']);


        if ($dateTime->getLastErrors() !== false) {
            $errors[] = 'le champ date doit être une date valide.';
        }
        return $errors;
    }

    public function add(): ?string
    {
        $errors = [];
        $event = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event = array_map('trim', $_POST);
            $errors = $this->validate($event);

            if (empty($errors)) {
                $eventManager = new EventManager();
                $event = $eventManager->insert($event);

                header('Location:/admin/event/ajouter');
            }
        }
        return $this->twig->render('Admin/Event/adminAdd.html.twig', ['errors' => $errors, 'event' => $event]);
    }

    public function update(int $id): string
    {
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event = array_map('trim', $_POST);
            $errors = $this->validate($event);

            if (empty($errors)) {
                $faqManager = new EventManager();
                $event['id'] = $id;
                $faqManager->update($event);

                header('Location: /admin/event/index');
            }
        }

        return $this->twig->render('Admin/Event/adminUpdate.html.twig', ['errors' => $errors, 'event' => $event,]);
    }
}
