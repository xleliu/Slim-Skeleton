<?php

// Application middleware

// Add Routing Middleware
$app->addRoutingMiddleware();

// Add Error Handling Middleware
$displayErrorDetails = env('APP_DEBUG') ?: false;
$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, true, true);
