<?php
namespace App\Controller;
use App\Delegate\UserDelegate;
use App\Models\Shop;
use App\Models\User;

class UserController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $logger;
    private $shop;
    private $arguments;

    public function __construct($request,$arguments,$logger){
        
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->shop       = new UserDelegate();
        

    }

    public function register(){
        $userId = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
       
        $name        = $this->body['shopName'];
        $phone_no    = $this->body['shopPhoneNO'];
        $description = $this->body['shopDescription'];
        $block       = $this->body['block'];
        $street      = $this->body['street'];
        $area        = $this->body['area'];
        $pincode     = $this->body['pincode'];
        
        $shopobj = new Shop();
        $shopobj->setName($name);
        $shopobj->setOwnerId($userId);
        $shopobj->setPhone($phone_no);
        $shopobj->setDescription($description);
        $shopobj->setBlock($block);
        $shopobj->setStreet($street);
        $shopobj->setArea($area);
        $shopobj->setPincode($pincode);

        $user = new User();
        $user->setToken($token);
        $user->setUserId($userId);

        $result = $this->shop->registerShop($user,$shopobj);
        
        $logMessage = '';
        if($result['response']==0){
            $logMessage='Failed to register shop: '.$name.'.';
        }
        $this->logger->info($logMessage);
        
        return $result;
    }

    public function fetchUserShops(){
        $user_id = $this->arguments['userId'];
        $result  =  $this->shop->fetch($user_id);
        
        $logMessage = '';
        if($result['response']==0){
            $logMessage='Failed to fetch User: '.$user_id.' Shops.';
        }
        $this->logger->info($logMessage);
        
        return $result;
    }
    
    public function deleteUserShop(){
        $userId = $this->arguments['userId'];
        $shopId = $this->arguments['shopId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user = new User();
        $user->setUserId($userId);
        $user->setToken($token);

        $result = $this->shop->deleteShop($user,$shopId);
        
        $logMessage = '';
        if($result['response']==0){
            $logMessage='Failed to delete shop Id:' . $shopId .' by  User Id: '.$user_id.' Error due to: ' . $result['message'] . '.';
        }
        $this->logger->info($logMessage);
        return $result;
    }
}
?>