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

    public function update(array $picture): void
    {
        $statement = $this->pdo->prepare(
            "UPDATE " . self::TABLE . " 
            SET `name`= :name, `date`= :date
            WHERE id=:id"
        );

        $statement->bindValue('name', $picture['name'], PDO::PARAM_STR);
        $statement->bindValue('date', $picture['date'], PDO::PARAM_STR);
        $statement->bindValue('id', $picture['id'], PDO::PARAM_INT);
        $statement->execute();
    }

    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
