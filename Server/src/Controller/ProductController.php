<?php
namespace App\Controller;
use App\Delegate\ProductDelegate;
use App\Models\User;
use App\Models\Product;

class ProductController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;

    public function __construct($request, $arguments, $logger){
        $this->logger=$logger;
        $this->request = $request;
        $this->body    = $request->getParsedBody();
        $this->headers = $request->getHeaders();
        $this->arguments     = $arguments;
        $this->product = new ProductDelegate();
    
    }

    public function addProduct(){
        
        $userID = $this->body['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $product = new Product();
        $product->setName($this->body['name']);
        $product->setDescription($this->body['description']);
        $product->setColor($this->body['color']);
        $product->setSize($this->body['size']);
        $product->setNetWeight($this->body['netweight']);
        $product->setMrpPrice($this->body['mrpprice']);

        $response = $this->product->registerProduct($user,$product);
        
        if($response['response']==0){
            $logMessage='Error in registering product: '.$product->getName().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProducts(){

        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->product->getAllProducts($user);
        return $response;
    }

}
?>