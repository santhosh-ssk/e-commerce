<?php

    use App\Controller\ProductDescriptionController;

    $app->get("/user/{userId}/product/{prodId}/descriptions", function($request, $response, $arguments) { 	
        $productDescriptionController = new ProductDescriptionController($request,$arguments,$this->logger);
        $resp = $productDescriptionController->getProductDescriptions();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/product/{prodId}/description", function($request, $response, $arguments) { 	
        $productDescriptionController = new ProductDescriptionController($request,$arguments,$this->logger);
        $resp = $productDescriptionController->addProductDescription();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/product/{prodId}/description/{title}", function($request, $response, $arguments) { 	
        $productDescriptionController = new ProductDescriptionController($request,$arguments,$this->logger);
        $resp = $productDescriptionController->removeProductDescription();
        return $response->withJson($resp);
    });


?>