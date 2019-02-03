<?php

    use App\Controller\ProductController;
    $app->post("/user/{userId}/shop/{shopId}/product", function($request, $response, $arguments) { 	
        $productcontroller = new ProductController($request,$arguments,$this->logger);
        $resp = $productcontroller->addProduct();
        return $response->withJson($resp);
    });

    $app->get("/{userId}/products", function($request, $response, $arguments) { 	
        $productcontroller = new ProductController($request,$arguments,$this->logger);
        $resp = $productcontroller->getProducts();
        return $response->withJson($resp);
    });

    $app->get("/product/{prodId}", function($request, $response, $arguments) { 	
        //var_dump($this->logger);
        $productcontroller = new ProductController($request,$arguments,$this->logger);
        $resp = $productcontroller->addProduct();
        return $response->withJson($resp);
    });

?>