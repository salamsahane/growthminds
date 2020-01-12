<?php
namespace App\Models\Database;

use PDO;

class Database
{

    /**
     * @var string
     */
    private static $_host;
    /**
     * @var string
     */
    private static $_dbname;
    /**
     * @var string
     */
    private static $_username;
    /**
     * @var string
     */
    private static $_password;

    /**
     * @var PDO
     */
    private static $pdo;

    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        self::$_host = $host;
        self::$_dbname = $dbname;
        self::$_username = $username;
        self::$_password = $password;
    }

    public static function setDB(){
        self::$pdo = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_dbname, self::$_username, self::$_password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return self::$pdo;
    }

}