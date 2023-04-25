<?php

namespace App\Model;

use PDO;

class PartnerManager extends AbstractManager
{
    public const TABLE = 'partner';


    public function insert(array $partner): void
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`logo`, `link`) VALUES (:logo, :link)");
        $statement->bindValue('logo', $partner['logo'], PDO::PARAM_STR);
        $statement->bindValue('link', $partner['link'], PDO::PARAM_STR);

        $statement->execute();
    }
}
