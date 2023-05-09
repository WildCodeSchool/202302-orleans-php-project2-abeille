<?php

namespace App\Model;

use PDO;

class LinkManager extends AbstractManager
{
    public const TABLE = 'link';

    public function insert(array $link): int
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE . " (`name`, `webAdress`)
             VALUES (:name, :webAdress)"
        );

        $statement->bindValue(':name', $link['name'], PDO::PARAM_STR);
        $statement->bindValue(':webAdress', $link['webAdress'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
