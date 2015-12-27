<?php

$app->get('/[{name}]', function ($request, $response, $args) {
    // Render index view
    $name = $request->getAttribute('name') ?: 'Slim';
    $response->getBody()->write("<h1>Hello, $name.</h1>");
});

$app->any('/hello/{action}[/[{args}]]', 'App\Controllers\HelloController');
