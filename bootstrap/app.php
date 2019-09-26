<?php

use Illuminate\Container\Container;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

require __DIR__ . '/../vendor/autoload.php';

// 加载配置文件
try {
    $dotenv = Dotenv::create(__DIR__ . '/../')->load();
} catch (InvalidPathException $e) {
    // do nothing
}

// Set container to create App with on AppFactory
AppFactory::setContainer(new Container());
$app = AppFactory::create();

// Set container instance
Container::setInstance($app->getContainer());
$app->getContainer()->instance('app', $app);

// Register hepler functuions
require __DIR__ . '/helpers.php';

// Set up dependencies
require __DIR__ . '/dependencies.php';

// Register middleware
require __DIR__ . '/middlewares.php';

// Register routes
require __DIR__ . '/../app/routes.php';

return $app;
