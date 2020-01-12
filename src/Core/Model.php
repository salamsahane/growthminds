<?php

namespace App\Core;

use App\Models\Database\Database;

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

}