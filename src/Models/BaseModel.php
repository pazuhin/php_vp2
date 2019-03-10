<?php

use Illuminate\Database\Capsule\Manager as Capsule;

abstract class BaseModel
{
    public static function setConnection()
    {
        $connect = require(__DIR__ . '/../Tools/config.php');
        $db = $connect['db'];
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $db['host'],
            'database'  => $db['dbname'],
            'username'  => $db['username'],
            'password'  => $db['password'],
            'charset'   => $db['charset'],
            'collation' => $db['collation'],
            'prefix'    => '',
        ]);
        // Setup the Eloquent ORM
        $capsule->bootEloquent();
    }
}