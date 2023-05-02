<?php

namespace App\Controller;

use App\Model\AssociationManager;

class AssociationController extends AbstractController
{
    public function index(): string
    {
        $associationManager = new AssociationManager();
        $events = $associationManager->getEvents();

        return $this->twig->render('Association/association.html.twig', ['events' => $events]);
    }
}
