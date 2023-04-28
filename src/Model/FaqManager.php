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

    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function update(array $faq): void
    {
        $statement = $this->pdo->prepare(
            "UPDATE " . self::TABLE . " 
            SET `question`= :question, `answer`= :answer
            WHERE id=:id"
        );

        $statement->bindValue('question', $faq['question'], PDO::PARAM_STR);
        $statement->bindValue('answer', $faq['answer'], PDO::PARAM_STR);
        $statement->bindValue('id', $faq['id'], PDO::PARAM_INT);

        $statement->execute();
    }
}
