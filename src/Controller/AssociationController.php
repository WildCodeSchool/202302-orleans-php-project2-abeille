<?php

namespace App\Controller;

use App\Model\EventManager;

class AssociationController extends AbstractController
{
    public function index(): string
    {
        $associationManager = new EventManager();
        $events = $associationManager->getEvents();

        return $this->twig->render('Association/association.html.twig', ['events' => $events]);
    }
}
