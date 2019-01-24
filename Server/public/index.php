<?php
require  __DIR__. '/../vendor/autoload.php';

$settings = require __DIR__ . '/../src/settings.php';

$app = new Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

//Register middlewares
require __DIR__.'../../src/middleware.php';



// Register routes
require __DIR__ . '../../src/Routes/index.php';


$app->run();
?>