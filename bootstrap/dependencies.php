<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['blade'] = function ($c) {
    $settings = $c->get('settings')['blade'];

    $compiler = new \Xiaoler\Blade\Compilers\BladeCompiler($settings['cache_path']);
    $engine = new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
    $finder = new \Xiaoler\Blade\FileViewFinder($settings['view_path']);

    // if your view file extension is not php or blade.php, use this to add it
    $finder->addExtension('tpl');

    // get an instance of factory
    return new \Xiaoler\Blade\Factory($engine, $finder);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};
