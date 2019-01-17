<?php
require  __DIR__. '/../vendor/autoload.php';
//require  __DIR__. '../../src/Utils/Models.php';

$settings = require __DIR__ . '../../src/settings.php';

$app = new Slim\App($settings);

// This is the middleware
// It will add the Access-Control-Allow-Methods header to every request
$app->add(function($request, $response, $next) {
    $response = $next($request, $response);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization,access-control-allow-origin')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');;
});

// Register routes
require __DIR__ . '../../src/Controller/index.php';

$app->run();
?>