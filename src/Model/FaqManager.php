<?php

namespace App\Model;

use PDO;

class FaqManager extends AbstractManager
{
    public const TABLE = 'faq';

    /**
     * Insert new item in database
     */
    public function insert(array $faq): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`question`) VALUES (:question)");
        $statement->bindValue('question', $faq['question'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
