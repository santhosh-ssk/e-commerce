<?php
return [
    'settings' => [
        'displayErrorDetails' => false, // set to false in production
        'determineRouteBeforeAppMiddleware' => true, //This Slim setting is required for the middleware to work
        
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' =>  __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
]];
