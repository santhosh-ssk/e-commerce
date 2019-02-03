<?php

    use App\Controller\TagController;
    
    
    $app->get("/user/{userId}/tags", function($request, $response, $arguments) { 	
        $tagController = new TagController($request,$arguments,$this->logger);
        $resp = $tagController->getTags();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/tag", function($request, $response, $arguments) { 	
        $tagController = new TagController($request,$arguments,$this->logger);
        $resp = $tagController->addTag();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/tag/{name}", function($request, $response, $arguments) { 	
        $tagController = new TagController($request,$arguments,$this->logger);
        $resp = $tagController->removeTag();
        return $response->withJson($resp);
    });


?>