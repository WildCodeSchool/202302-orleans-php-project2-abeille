<?php

namespace App\Controller;

use App\Model\PictureManager;

class AdminPictureController extends AbstractController
{
    public function index()
    {
        $picturemanager = new PictureManager();
        $pictures = $picturemanager->selectAll();
        return $this->twig->render('Admin/Picture/adminIndex.html.twig', ['pictures' => $pictures]);
    }
}
