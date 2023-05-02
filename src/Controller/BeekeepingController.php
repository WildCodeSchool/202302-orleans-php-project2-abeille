<?php

namespace App\Controller;

class BeekeepingController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Beekeeping/index.html.twig');
    }
}
