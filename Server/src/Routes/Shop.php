<?php
use App\DAO\ShopDao;
	$app->post("/user/shop", function($request, $response, $arguments) { 	
    	
    	$data = $request->getParsedBody();
	    $shop = new ShopDao();
	    
	    $resp = $shop->registerShop($data['userId'], $data['shopName'], $data['shopPhoneNO'], $data['shopDescription'], $data['block'], $data['street'], $data['area'], $data['pincode']);
		return $response->withJson($resp);
	});

	$app->get("/user/{userId}/shop", function($request, $response, $arguments) { 	
    	$data = $request->getParsedBody();
	    $shop = new ShopDao();
	    $resp = $shop->userShop($arguments['userId']);
		return $response->withJson($resp);
	});
?>