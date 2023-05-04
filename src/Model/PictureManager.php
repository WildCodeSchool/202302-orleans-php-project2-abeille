<?php

namespace App\Model;

use PDO;

class PictureManager extends AbstractManager
{
    public const TABLE = 'picture';

    public function insert(array $picture): void
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `date`)
        VALUES (:name, :date)");
        $statement->bindValue('name', $picture['name'], PDO::PARAM_STR);
        $statement->bindValue('date', $picture['date'], PDO::PARAM_STR);
        $statement->execute();
    }
}
