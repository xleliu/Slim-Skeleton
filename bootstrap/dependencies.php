<?php

// DIC configuration

$container = $app->getContainer();

// config
$container->singleton('settings', function () {
    return require __DIR__ . '/settings.php';
});

// Service factory for the ORM
$container->singleton('db', require __DIR__ . '/databases.php');
