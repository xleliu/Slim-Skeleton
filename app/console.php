<?php

require __DIR__ . '/../bootstrap/app.php';

use Symfony\Component\Console\Application;

$console = new Application();

// ... register commands
$console->add(new App\Commands\ExampleCommand());

$console->run();
