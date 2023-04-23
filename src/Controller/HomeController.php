<?php

namespace App\Controller;

use App\Model\PartnerManager;
use App\Model\HomeManager;

class HomeController extends AbstractController
{
    public function index(): string
    {
        $homeManager = new HomeManager();
        $event = $homeManager->lastEvent();
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll();
        return $this->twig->render('Home/index.html.twig', ['events' => $event, 'partners' => $partners]);
    }
}
