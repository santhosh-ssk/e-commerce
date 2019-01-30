<?php
use App\Controller\AdminController;

$app->get("/admin/{adminId}/shop", function($request, $response, $arguments) { 	
	$adminController = new AdminController($request,$arguments,$this->logger);
	$result = $adminController->fetchUserShops();
	$response = $response->withJson($result);
	return $response;
});

$app->put("/admin/{adminId}/shop", function($request, $response, $arguments) { 	
	$adminController = new AdminController($request,$arguments,$this->logger);
	$result = $adminController->authUserShop();
	$response = $response->withJson($result);
	return $response;
});

?>