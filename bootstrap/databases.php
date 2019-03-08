<?php

$capsule = new \Illuminate\Database\Capsule\Manager;

$dbConfig = [
    'host'      => 'localhost',
    'database'  => 'test',
    'username'  => 'root',
    'password'  => '',
    'driver'    => 'mysql',
    'port'      => 3306,
    'strict'    => false,
    'charset'   => 'utf8',
    'timezone'  => '+08:00',
    'collation' => 'utf8_general_ci',
];

$capsule->addConnection($dbConfig, 'default');

$capsule->setAsGlobal();
$capsule->bootEloquent();

return $capsule;
