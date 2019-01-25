<?php
use App\DAO\ShopDao;
use App\Controller\ShopController;

	$app->post("/user/shop", function($request, $response, $arguments) { 	
		$shopcontroller = new ShopController($request,$arguments,$this->logger);
		$resp = $shopcontroller->register();
		return $response->withJson($resp);
	});

	$app->get("/user/{userId}/shop", function($request, $response, $arguments) { 	
    	$shopcontroller = new ShopController($request,$arguments,$this->logger);
		$resp = $shopcontroller->fetchUserShops();
		return $response->withJson($resp);
	});
?>