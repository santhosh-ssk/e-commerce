<?php
use App\DAO\ShopDao;
use App\Controller\UserController;

	$app->post("/user/shop", function($request, $response, $arguments) { 	
		$shopcontroller = new UserController($request,$arguments,$this->logger);
		$resp = $shopcontroller->register();
		return $response->withJson($resp);
	});

	$app->get("/user/{userId}/shop", function($request, $response, $arguments) { 	
    	$shopcontroller = new UserController($request,$arguments,$this->logger);
		$resp = $shopcontroller->fetchUserShops();
		return $response->withJson($resp);
	});

	$app->delete("/user/{userId}/shop/{shopId}", function($request, $response, $arguments) { 	
    	$shopcontroller = new UserController($request,$arguments,$this->logger);
		$resp = $shopcontroller->deleteUserShop();
		return $response->withJson($resp);
	});

?>