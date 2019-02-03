<?php

    use App\Controller\BrandController;
    
    
    $app->get("/user/{userId}/brands", function($request, $response, $arguments) { 	
        $brandcontroller = new BrandController($request,$arguments,$this->logger);
        $resp = $brandcontroller->getBrandNames();
        return $response->withJson($resp);
    });

    $app->post("/user/{userId}/brand", function($request, $response, $arguments) { 	
        $brandcontroller = new BrandController($request,$arguments,$this->logger);
        $resp = $brandcontroller->addBrand();
        return $response->withJson($resp);
    });

    $app->delete("/user/{userId}/brand/{name}", function($request, $response, $arguments) { 	
        $brandcontroller = new BrandController($request,$arguments,$this->logger);
        $resp = $brandcontroller->removeBrand();
        return $response->withJson($resp);
    });


?>