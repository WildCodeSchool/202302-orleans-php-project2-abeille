<?php

namespace App\Controller;

use App\Model\PictureManager;
use DateTime;

class AdminPictureController extends AbstractController
{
    public function index()
    {
        $picturemanager = new PictureManager();
        $pictures = $picturemanager->selectAll();
        return $this->twig->render('Admin/Picture/adminIndex.html.twig', ['pictures' => $pictures]);
    }

    private function validate(array $picture): array
    {
        $errors = [];

        if (empty($picture['date'])) {
            $errors[] = 'Le champ date est obligatoire';
        }

        $dateTime =  new DateTime($picture['date']);

        if ($dateTime->getLastErrors() !== false) {
            $errors[] = 'le champ date doit être une date valide.';
        }

        return $errors;
    }

    public function add()
    {
        $errors = $picture = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $picture = array_map('trim', $_POST);

            $errors = $this->validate($picture);

            if ($_FILES['image']['error'] !== 0) {
                $errors[] = 'Problème avec l\'upload, veuillez rééssayer';
            } else {
                $limitFileSize = 1000000;
                if ($_FILES['image']['size'] > $limitFileSize) {
                    $errors[] = 'Le fichier doit faire moins de ' . $limitFileSize / 1000000 . 'MO';
                }

                $authorizedMimes = ['name/jpeg', 'name/png', 'name/jpg', 'name/webp'];
                if (in_array(mime_content_type($_FILES['image']['tmp_name']), $authorizedMimes)) {
                    $errors[] = 'Le type de fichier est incorrect. Types autorisés: ' . implode(', ', $authorizedMimes);
                }
            }

            if (empty($errors)) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $baseFileName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
                $imageName = uniqid($baseFileName, more_entropy: true) . '.' . $extension;
                $picture['name'] = $imageName;
                $pictureManager = new PictureManager();
                $pictureManager->insert($picture);
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../public/uploads/' . $imageName);
                header('Location: /admin/image');
            }
        }

        return $this->twig->render('admin/Picture/adminAdd.html.twig', ['errors' => $errors, 'picture' => $picture]);
    }

    // Efface un fichier (pour le delete et l'update)
    private function deleteFile(string $fileName)
    {
        if (
            !empty($fileName) && file_exists(__DIR__ . '/../../public/uploads/' . $fileName)
        ) {
            unlink(__DIR__ . '/../../public/uploads/' . $fileName);
        }
    }

    public function update(int $id): string
    {
        $pictureManager = new PictureManager();
        $picture = $pictureManager->selectOneById($id);
        $lastImage = $picture['name'];
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $picture = array_map('trim', $_POST);
            $errors = $this->validate($picture);

            if ($_FILES['image']['error'] !== 0) {
                $errors[] = 'Problème avec l\'upload, veuillez rééssayer';
            } else {
                $limitFileSize = 1000000;
                if ($_FILES['image']['size'] > $limitFileSize) {
                    $errors[] = 'Le fichier doit faire moins de ' . $limitFileSize / 1000000 . 'MO';
                }

                $authorizedMimes = ['name/jpeg', 'name/png', 'name/jpg', 'name/webp'];
                if (in_array(mime_content_type($_FILES['image']['tmp_name']), $authorizedMimes)) {
                    $errors[] = 'Le type de fichier est incorrect. Types autorisés: ' . implode(', ', $authorizedMimes);
                }
            }

            if (empty($errors)) {
                $pictureManager = new PictureManager();
                $picture['name'] = $lastImage;
                $picture['id'] = $id;

                if (!empty($_FILES['image']['tmp_name'])) {
                    $this->deleteFile($lastImage);
                    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $baseFileName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
                    $imageName = uniqid($baseFileName, more_entropy: true) . '.' . $extension;
                    $picture['name'] = $imageName;
                    move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../public/uploads/'  . $imageName);
                }

                $pictureManager->update($picture);
                header('Location: /admin/image');
            }
        }

        return $this->twig->render('Admin/Picture/adminUpdate.html.twig', ['errors' => $errors, 'picture' => $picture]);
    }

    public function delete(int $id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pictureManager = new PictureManager();
            $picture = $pictureManager->selectOneById($id);
            $this->deleteFile($picture['name']);
            $pictureManager->delete((int)$id);
            header('Location:/admin/image');
        }
    }
}
