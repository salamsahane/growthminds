<?php
namespace App\Models;

use App\Core\Model;

class Register{

    public static function register(string $table, array $fields, string $values, array $params): bool
    {
        $query = new QueryBuilder;
        $query
            ->insertInTo($table)
            ->fields($fields)
            ->values($values)
            ->params($params);

        $q = $query->insert();

        return $q;
    }

}