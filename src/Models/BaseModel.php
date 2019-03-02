<?php

abstract class BaseModel
{
    protected static $pdo;

    public function __construct()
    {
        if (self::$pdo === null) {
            //throw new RuntimeException('Not setup data for db');
        }
    }

    public static function init($config)
    {
        echo '<pre>';
        print_r($config);
        phpinfo();
        self::$pdo = new PDO(
            'mysql:host=' . $config["host"] . ';dbname=' . $config["dbname"],
            $config["username"],
            $config["password"]
        );
        echo 123;
    }
}