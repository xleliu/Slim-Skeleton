<?php

use Illuminate\Container\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// 加载配置文件
try {
    $dotenv = Dotenv\Dotenv::create(__DIR__ . '/../')->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    // do nothing
}

// Set container to create App with on AppFactory
AppFactory::setContainer(new Container());
$app = AppFactory::create();

// 开启全局session
// session_start();

// Instantiate the app
// $settings = require __DIR__ . '/settings.php';

// Set up dependencies
require __DIR__ . '/dependencies.php';
// Register middleware
require __DIR__ . '/middlewares.php';
// Register hepler functuions
require __DIR__ . '/helpers.php';

// Register routes
require __DIR__ . '/../app/routes.php';

return $app;
