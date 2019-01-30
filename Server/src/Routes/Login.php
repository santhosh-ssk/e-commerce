<?php
	use App\Controller\LoginController;
	$app->put("/login", function($request, $response, $arguments) {
		$resp = new LoginController($request, $this->logger);
		$resp = $resp->login();
		return $response->withJson($resp);
	});
?>