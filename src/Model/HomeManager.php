<?php

namespace App\Model;

class HomeManager extends AbstractManager
{
    public const TABLE = 'event';
    public function lastEvent()
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE date>NOW() ORDER BY date ASC LIMIT 3';
        return $this->pdo->query($query)->fetchAll();
    }
}
