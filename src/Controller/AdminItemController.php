<?php

namespace App\Controller;

use App\Model\PartnerManager;

class AdminItemController extends AbstractController
{
    public function index(): string
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll();

        return $this->twig->render('Admin/Item/partner.html.twig', ['partners' => $partners]);
    }
}
