<?php

namespace App\Model;

use PDO;

class FaqManager extends AbstractManager
{
    public const TABLE = 'faq';
    public function insert(array $faq): int
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE . " (`question`, `answer`)
             VALUES (:question, :answer)"
        );

        $statement->bindValue(':question', $faq['question'], PDO::PARAM_STR);
        $statement->bindValue(':answer', $faq['answer'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}