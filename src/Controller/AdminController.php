<?php

namespace App\Controller;

use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Admin/Index/index.html.twig');
    }
}
