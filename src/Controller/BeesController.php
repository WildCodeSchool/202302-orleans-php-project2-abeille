<?php

namespace App\Controller;

class BeesController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Bees/index.html.twig');
    }
}
