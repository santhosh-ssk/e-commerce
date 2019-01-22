<?php
use App\DAO\AdminDao;
		$app->get("/admin/{adminId}/shops", function($request, $response, $arguments) { 	
    	$data=$request->getParsedBody();
	    $token=$request->getHeaders()['HTTP_AUTHORIZATION'];
	    if(count($token)==1){
	    	$token=explode(" ", $token[0])[1];
	    	$userId=$arguments['adminId'];
	    	$admin=new AdminDao();
	    	$resp=$admin->viewShops($userId,$token);
	    	return $response->withJson($resp);
	    }
	    else
	    	return $response->withJson(array("response"=>0,"error"=>"token not found"));
		});
?>