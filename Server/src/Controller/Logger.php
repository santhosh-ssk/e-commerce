<?php
	use App\Utils\User;
	$app->post("/login", function($request, $response, $arguments) {
	    	
    	$data=$request->getParsedBody();
	    $user=new User();
	    $user->query($data['username']);
	    if($user->checkUser($data['password'])){
	        $response=$response->withJson(array("response"=>1,"message"=>"success","url"=>$user->getRole().".html"));    
	    }
	    else{
	        $response=$response->withJson(array("response"=>0,"message"=>"unauthorized user"));   
	    }
			    
		return $response;
	});

	$app->post('/signup',function($request,$response,$arguments){
	    $data=$request->getParsedBody();
	    $user=new User();
	    $resp=$user->addUser($data['name'],$data['email'],$data["password"]);
	    echo var_dump($resp);
	    $response=$response->withJson($resp);
	    return $response;
	});

?>