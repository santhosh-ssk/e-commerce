<?php
require  __DIR__. '/../vendor/autoload.php';
//require  __DIR__. '../../src/Utils/Models.php';

$settings = require __DIR__ . '../../src/settings.php';

$app = new Slim\App($settings);

//Register middlewares
require __DIR__.'../../src/middleware.php';

// Register routes
require __DIR__ . '../../src/Controller/index.php';

$app->run();
?>