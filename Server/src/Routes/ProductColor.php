<?php

    use App\Controller\ProductColorController;

    $app->get("/user/{userId}/product/{prodId}/colors", function($request, $response, $arguments) { 	
        $productColorController = new ProductColorController($request,$arguments,$this->logger);
        $resp = $productColorController->getProductColors();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/product/{prodId}/colors", function($request, $response, $arguments) { 	
        $productColorController = new ProductColorController($request,$arguments,$this->logger);
        $resp = $productColorController->addProductColors();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/product/{prodId}/color/{color}", function($request, $response, $arguments) { 	
        $productColorController = new ProductColorController($request,$arguments,$this->logger);
        $resp = $productColorController->removeProductColor();
        return $response->withJson($resp);
    });


?>