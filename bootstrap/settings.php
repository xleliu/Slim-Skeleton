<?php

return [
    // Redis Configure
    'redis' => [
        'scheme'   => 'tcp',
        'host'     => env('REDIS_HOST') ?: '127.0.0.1',
        'port'     => env('REDIS_PORT') ?: 6379,
        'password' => env('REDIS_PASSWORD') ?: null,
    ],
];
