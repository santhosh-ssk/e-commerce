<?php
	use App\Controller\SignupController;

	$app->post('/signup', function($request,$response,$arguments){
	    $signup = new SignupController($request,$this->logger);
	    $resp = $signup->registerUser();
	    $response = $response->withJson($resp);
	    return $response;
	});

?>