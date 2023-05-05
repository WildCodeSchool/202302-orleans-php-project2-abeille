<?php

namespace App\Controller;

class BeeController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Bees/index.html.twig');
    }
}
