<?php

namespace App\Core;

use App\Models\Database\Database;
use App\Models\QueryBuilder;
use App\Models\Auth\Person;

class Model{

    const DB_HOST = 'localhost';
    const DB_NAME = 'growthminds';
    const DB_USER = 'root';
    const DB_PASS = '';    

    private static $db;

    public static function getDB(): \PDO
    {
        if(self::$db === null){
            $db = new Database(self::DB_HOST, self::DB_NAME, self::DB_USER, self::DB_PASS);
            self::$db = $db::setDB();
        }
        return self::$db;
    }

    public static function find(string $field, string $table, string $condition, string $param): ?string
    {
        $query = new QueryBuilder;
        $query
            ->select($field)
            ->from($table)
            ->where($condition . " = ?")
            ->setParam(null, $param);
        $result = $query->fetch($field);

        return $result;
    }

    public static function getAll(string $table, string $condition, string $param, ?string $direction = null): ?Array{
        $query = new QueryBuilder;
        $query
            ->from($table)
            ->where($condition)
            ->setParam(null, $param);
            if($direction != null){
                $query->orderBy($direction, 'asc');
            }

        $result = $query->fetchAll();
        return $result;
    }

    public static function is_already_used(string $field, string $table, string $condition, string $param): bool
    {
        $result = self::find($field, $table, $condition, $param);
        if(!$result){
            return false;
        }
        return true;
    }

}