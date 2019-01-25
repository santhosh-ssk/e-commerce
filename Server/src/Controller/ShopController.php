<?php
namespace App\Controller;
use App\Delegate\ShopDelegate;
use App\Models\Shop;

class ShopController{
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
        $this->shop       = new ShopDelegate();
        

    }

    public function register(){
        
        $name        = $this->body['shopName'];
        $owner_id    = $this->body['userId'];
        $phone_no    = $this->body['shopPhoneNO'];
        $description = $this->body['shopDescription'];
        $block       = $this->body['block'];
        $street      = $this->body['street'];
        $area        = $this->body['area'];
        $pincode     = $this->body['pincode'];
        
        $shopobj = new Shop();
        $shopobj->setName($name);
        $shopobj->setOwnerId($owner_id);
        $shopobj->setPhone($phone_no);
        $shopobj->setDescription($description);
        $shopobj->setBlock($block);
        $shopobj->setStreet($street);
        $shopobj->setArea($area);
        $shopobj->setPincode($pincode);
        //echo var_dump($shopobj);
        $result = $this->shop->registerShop($shopobj);
        
        $logMessage = '';
        if($result['response']==1){
            $logMessage='Successfully Registered shop Name: '.$name.'.';
        }
        else{
            $logMessage='Failed to register shop: '.$name.'.';
        }
        $this->logger->info($logMessage);
        
        return $result;
    }

    public function fetchUserShops(){
        $user_id = $this->arguments['userId'];
        $result  =  $this->shop->fetch($user_id);
        
        $logMessage = '';
        if($result['response']==1){
            $logMessage='Successfully fetched User : '.$user_id.' Shops.';
        }
        else{
            $logMessage='Failed to fetch User: '.$user_id.' Shops.';
        }
        $this->logger->info($logMessage);
        
        return $result['data'];

    }
}
?>