<?php

namespace App\Model;

use PDO;

class FaqManager extends AbstractManager
{
    public const TABLE = 'faq';
  
    public function insert(array $faqs): int
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE . " (`question`, `answer`)
             VALUES (:question, :answer)"
        );

        $statement->bindValue(':question', $faqs['question'], PDO::PARAM_STR);
        $statement->bindValue(':answer', $faqs['answer']);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
