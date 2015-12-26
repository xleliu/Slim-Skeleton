<?php
return [
    'settings' => [
        'displayErrorDetails' => true,

        // Renderer settings
        'blade' => [
            'view_path' => [__DIR__ . '/../app/views'],
            'cache_path' => __DIR__ . '/../storage/cache',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../storage/logs/app.log',
        ],
    ],
];
