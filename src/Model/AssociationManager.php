<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = 'event';
    public function getEvent()
    {
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE date>NOW() ORDER BY date ASC ';
        return $this->pdo->query($query)->fetchAll();
    }
}
