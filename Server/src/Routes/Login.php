<?php
	use App\Controller\LoginController;

	$app->post("/login", function($request, $response, $arguments) {
		$resp = new LoginController($request);
		$resp = $resp->login();
		return $response->withJson($resp);
	});
?>