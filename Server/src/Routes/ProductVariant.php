<?php

    use App\Controller\ProductVariantController;

    $app->get("/product/{prodId}/sku/{skuId}/variants", function($request, $response, $arguments) { 	
        $productVariantController = new ProductVariantController($request,$arguments,$this->logger);
        $resp = $productVariantController->getProductVariants();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/product/{prodId}/sku/{skuId}/variants", function($request, $response, $arguments) { 	
        $productVariantController = new ProductVariantController($request,$arguments,$this->logger);
        $resp = $productVariantController->addProductVariants();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/product/{prodId}/sku/{skuId}/variant/{name}", function($request, $response, $arguments) { 	
        $productVariantController = new ProductVariantController($request,$arguments,$this->logger);
        $resp = $productVariantController->removeProductVariant();
        return $response->withJson($resp);
    });


?>