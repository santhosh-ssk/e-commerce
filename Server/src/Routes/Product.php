<?php

    use App\Controller\ProductController;


    $app->get("/shop/{shopId}/products", function($request, $response, $arguments) { 	
        $productcontroller = new ProductController($request,$arguments,$this->logger);
        $resp = $productcontroller->getShopProducts();
        return $response->withJson($resp);
    });

    $app->get("/shop/category/{categoryId}/products", function($request, $response, $arguments) { 	
        $productcontroller = new ProductController($request,$arguments,$this->logger);
        $resp = $productcontroller->getProductsInCategory();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/shop/category/{categoryId}/product", function($request, $response, $arguments) { 	
        $productcontroller = new ProductController($request,$arguments,$this->logger);
        $resp = $productcontroller->addProduct();
        return $response->withJson($resp);
    });



?>