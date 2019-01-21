<?php
	use App\DAO\UserDao;
	$app->post("/login", function($request, $response, $arguments) {
	    	
    	$data=$request->getParsedBody();
	    $user=new UserDao();
	    $resp=$user->login($data['username'],$data['password']);
		return $response->withJson($resp);
	});
?>