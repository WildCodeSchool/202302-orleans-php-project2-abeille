<?php

namespace App\Model;

use PDO;

class AssociationManager extends AbstractManager
{
    public const TABLE = 'event';

    public function getEvents()
    {
        return $this->pdo->query('SELECT * FROM ' . static::TABLE . ' ORDER BY date ASC ')->fetchAll();
    }
}
