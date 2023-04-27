<?php

namespace App\Controller;

use App\Model\AssociationManager;

class AssociationController extends AbstractController
{
    public function index(): string
    {
        $associationManager = new AssociationManager();
        $associations = $associationManager->selectAll('title');

        return $this->twig->render('Association/index.html.twig', ['associations' => $associations]);
    }
}
