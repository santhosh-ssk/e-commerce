<?php
namespace App\Controller;
use App\Delegate\ProductDescriptionDelegate;
use App\Models\User;

class ProductDescriptionController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $productDescription;

    public function __construct($request, $arguments, $logger){
        $this->logger              = $logger;
        $this->request             = $request;
        $this->body                = $request->getParsedBody();
        $this->headers             = $request->getHeaders();
        $this->arguments           = $arguments;
        $this->productDescription  = new ProductDescriptionDelegate();
    
    }

    public function addProductDescription(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $prodId = $this->arguments['prodId'];
        $description = $this->body;
        $response    = $this->productDescription->addProductDescription($user,$prodId,$description);

        if($response['response']==0){
            $logMessage='Error in adding a product description with title: '.$title.' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProductDescriptions(){
        $prodId   = $this->arguments['prodId'];
        $response = $this->productDescription->getProductDescriptions($prodId);
        return $response;
    }

    public function removeProductDescription(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $prodId    = $this->arguments['prodId'];
        $title     = $this->arguments['title'];
        $user      = new User();
        $user->setUserId($userID);
        $user->setToken($token);
        $response = $this->productDescription->removeProductDescription($user,$prodId,$title);
        return $response;
    }

}
?>