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

    public function getEvents()
    {
        return $this->pdo->query('SELECT * FROM ' . static::TABLE . ' ORDER BY date DESC ')->fetchAll();
    }
}
