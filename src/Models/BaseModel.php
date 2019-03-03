<?php

abstract class BaseModel
{
    /**
     * @var PDO
     */
    protected static $pdo;

    public function __construct()
    {
        if (self::$pdo === null) {
            throw new RuntimeException('Not setup data for db');
        }
    }

    public static function init($config)
    {
        self::$pdo = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['username'],
            $config['password']
        );
    }
}