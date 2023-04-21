<?php

namespace App\Controller;

use App\Model\HomeManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $homeManager = new HomeManager();
        $event = $homeManager->lastEvent();
        return $this->twig->render('Home/index.html.twig', ['events' => $event]);
    }
}
