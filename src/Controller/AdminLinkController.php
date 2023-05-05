<?php

namespace App\Model;

use App\Controller\AbstractController;
use App\Model\LinkManager;

class AdminLinkController extends AbstractController
{
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $link = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $linkManager = new LinkManager();
            $id = $linkManager->insert($link);

            header('Location:/items/show?id=' . $id);
            return null;
        }
        return $this->twig->render('Item/add.html.twig');
    }
}
