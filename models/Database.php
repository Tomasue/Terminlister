<?php

namespace Models;

use PDO;

class Database
{

    private static $info = [
        'adapter' => 'mysql',
        'host' => '10.192.148.241',
        'port' => 3306,
        'database' => 'terminlister',
        'username' => 'optimale',
        'password' => 'La8pvDBLa8pv',
        'charset' => 'UTF8'
    ];

    private static $connection;
    private static $attributes = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public static function get(): \PDO
    {
        if (!self::$connection) {
            self::$connection = new PDO(
                self::$info['adapter'] . ':host=' . self::$info['host'] .
                ';dbname=' . self::$info['database'] .
                ';port=' . self::$info['port'] .
                ';charset=' . self::$info['charset'],
                self::$info['username'],
                self::$info['password'],
                self::$attributes
            );
        }
        return self::$connection;
    }

}
