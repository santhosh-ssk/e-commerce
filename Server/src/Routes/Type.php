<?php

    use App\Controller\TypeController;
    
    
    $app->get("/user/{userId}/types", function($request, $response, $arguments) { 	
        $typeController = new TypeController($request,$arguments,$this->logger);
        $resp = $typeController->getTypes();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/type", function($request, $response, $arguments) { 	
        $typeController = new TypeController($request,$arguments,$this->logger);
        $resp = $typeController->addType();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/type/{name}", function($request, $response, $arguments) { 	
        $typeController = new TypeController($request,$arguments,$this->logger);
        $resp = $typeController->removeType();
        return $response->withJson($resp);
    });


?>