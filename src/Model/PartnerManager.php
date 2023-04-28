<?php

namespace App\Model;

use PDO;

class PartnerManager extends AbstractManager
{
    public const TABLE = 'partner';


    public function insert(array $partner): void
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `link`, `logo`)
        VALUES (:name, :link, :logo)");
        $statement->bindValue('name', $partner['name'], PDO::PARAM_STR);
        $statement->bindValue('link', $partner['link'], PDO::PARAM_STR);
        $statement->bindValue('logo', $partner['logo'], PDO::PARAM_STR);


        $statement->execute();
    }

    public function update(array $partner): void
    {
        $statement = $this->pdo->prepare(
            "UPDATE " . self::TABLE . " SET `name`=:name, `link`=:link WHERE id=:id"
        );

        $statement->bindValue('name', $partner['name'], PDO::PARAM_STR);
        $statement->bindValue('link', $partner['link'], PDO::PARAM_STR);
        $statement->bindValue('id', $partner['id'], PDO::PARAM_STR);

        $statement->execute();
    }
}
