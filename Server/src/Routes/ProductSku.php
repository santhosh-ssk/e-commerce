<?php

    use App\Controller\ProductSkuController;


    $app->get("/product/{prodId}/sku", function($request, $response, $arguments) { 	
        $productSkuController = new ProductSkuController($request,$arguments,$this->logger);
        $resp = $productSkuController->getProductSkus();
        return $response->withJson($resp);
    });

    
    $app->post("/user/{userId}/product/{prodId}/sku", function($request, $response, $arguments) { 	
        $productSkuController = new ProductSkuController($request,$arguments,$this->logger);
        $resp = $productSkuController->addProductSku();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/product/{prodId}/sku/{skuId}", function($request, $response, $arguments) { 	
        $productSkuController = new ProductSkuController($request,$arguments,$this->logger);
        $resp = $productSkuController->removeProductSku();
        return $response->withJson($resp);
    });



?>