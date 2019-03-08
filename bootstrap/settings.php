<?php

return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => getenv('APP_DEBUG') ?: false,

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../storage/logs/app.log',
        ],
    ],
];
