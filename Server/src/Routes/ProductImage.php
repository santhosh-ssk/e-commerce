<?php

    use App\Controller\ProductImageController;

    $app->get("/product/{prodId}/sku/{skuId}/images", function($request, $response, $arguments) { 	
        $productImageController = new ProductImageController($request,$arguments,$this->logger);
        $resp = $productImageController->getProductDescriptions();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/product/{prodId}/sku/{skuId}/images", function($request, $response, $arguments) { 	
        $productImageController = new ProductImageController($request,$arguments,$this->logger);
        $resp = $productImageController->addProductImages();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/product/{prodId}/sku/{skuId}/image/{title}", function($request, $response, $arguments) { 	
        $productImageController = new ProductImageController($request,$arguments,$this->logger);
        $resp = $productImageController->removeProductImage();
        return $response->withJson($resp);
    });


?>