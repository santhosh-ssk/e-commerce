<?php

    use App\Controller\ShopCategoryController;

    $app->get("/user/{userId}/shop/{shopId}/categories", function($request, $response, $arguments) { 	
        $shopcategoryController = new ShopCategoryController($request,$arguments,$this->logger);
        $resp = $shopcategoryController->getShopCategories();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/shop/{shopId}/category", function($request, $response, $arguments) { 	
        $shopcategoryController = new ShopCategoryController($request,$arguments,$this->logger);
        $resp = $shopcategoryController->addShopCategory();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/shop/{shopId}/category/{name}", function($request, $response, $arguments) { 	
        $shopcategoryController = new ShopCategoryController($request,$arguments,$this->logger);
        $resp = $shopcategoryController->removeShopCategory();
        return $response->withJson($resp);
    });


?>