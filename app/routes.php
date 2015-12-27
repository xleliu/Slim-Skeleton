<?php

$app->get('/[{name}]', function ($request, $response, $args) {
    $view = $this->blade->make('index', $args);
    // Render index view
    $response->getBody()->write($view);
});

$app->any('/hello/{action}[/[{args}]]', 'App\Controllers\HelloController');
