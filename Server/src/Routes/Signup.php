<?php
	use App\DAO\UserDao;
	$app->post('/signup', function($request,$response,$arguments){
	    $data = $request->getParsedBody();
	    $user = new UserDao();
	    $resp = $user->signup($data['name'], $data['email'], $data["password"]);
	    $response = $response->withJson($resp);
	    return $response;
	});

?>