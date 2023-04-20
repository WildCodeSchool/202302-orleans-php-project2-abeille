<?php

namespace App\Model;

class HomeManager extends AbstractManager
{
    public const TABLE = 'event';
    public function lastEvent()
    {
        $query = 'SELECT name,description,location,date FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';
        return $this->pdo->query($query)->fetchAll();
    }
}
