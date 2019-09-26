<?php

// DIC configuration

$container = $app->getContainer();

// config
$container->singleton('settings', function () {
    return require __DIR__ . '/settings.php';
});

// Service factory for the ORM
$container->singleton('db', require __DIR__ . '/databases.php');

// monolog
$container->bind('logger', function () {
    $logFile = __DIR__ . '/../storage/logs/app.log';

    $handler = new Monolog\Handler\StreamHandler($logFile, Monolog\Logger::WARNING);
    $handler->setFormatter(new Monolog\Formatter\LineFormatter(null, null, true, true));

    $logger = new Monolog\Logger('logger');
    $logger->pushHandler($handler);

    return $logger;
});
