<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = 'event';
    public function getEvents()
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' ORDER BY date ASC ';
        return $this->pdo->query($query)->fetchAll();
    }
}
