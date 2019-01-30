<?php
$app->get('/swagger', function ($request, $response, $args) {
    $dir = __DIR__.'/../src/Routes'; 
    $openapi = \OpenApi\scan($dir);
    header('Content-Type: application/x-yaml');
    echo $openapi->toYaml();
    return $response;
});
?>