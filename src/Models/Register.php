<?php
namespace App\Models;

use App\Core\Model;

class Register{

    public static function register(array $fields, array $params): bool
    {
        $query = new QueryBuilder;
        $query
            ->insertInTo('persons')
            ->fields($fields)
            ->values('?,?,?,?,?,?,?,?')
            ->params($params);

        $q = $query->insert();

        return $q;
    }

}