<?php
use App\Controller\AdminController;

$app->get("/admin/{adminId}/shops", function($request, $response, $arguments) { 	
	$adminController = new AdminController($request,$arguments,$this->logger);
	$result = $adminController->fetchUserShops();
	$response = $response->withJson($result);
	return $response;
});

?>