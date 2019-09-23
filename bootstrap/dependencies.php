<?php

// DIC configuration

$container = $app->getContainer();

// Service factory for the ORM
$container['db'] = require __DIR__ . '/databases.php';
