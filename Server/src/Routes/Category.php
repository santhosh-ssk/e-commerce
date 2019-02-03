<?php

    use App\Controller\CategoryController;
    
    
    $app->get("/user/{userId}/categories", function($request, $response, $arguments) { 	
        $categoryController = new CategoryController($request,$arguments,$this->logger);
        $resp = $categoryController->getCategoryNames();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/category", function($request, $response, $arguments) { 	
        $categoryController = new CategoryController($request,$arguments,$this->logger);
        $resp = $categoryController->addCategory();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/category/{name}", function($request, $response, $arguments) { 	
        $categoryController = new CategoryController($request,$arguments,$this->logger);
        $resp = $categoryController->removeCategory();
        return $response->withJson($resp);
    });


?>