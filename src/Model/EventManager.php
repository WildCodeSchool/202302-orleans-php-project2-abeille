<?php

namespace App\Model;

use PDO;

class EventManager extends AbstractManager
{
    public const TABLE = 'event';
    public function lastEvent()
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE date>NOW() ORDER BY date ASC LIMIT 3';
        return $this->pdo->query($query)->fetchAll();
    }

    public function insert(array $event): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (name,location,date,description) VALUES (:name,:location,:date,:description)");
        $statement->bindValue('name', $event['name'], PDO::PARAM_STR);
        $statement->bindValue('location', $event['location'], PDO::PARAM_STR);
        $statement->bindValue('date', $event['date'], PDO::PARAM_STR);
        $statement->bindValue('description', $event['description'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
