<?php
namespace App\Controller;
use App\Delegate\ProductColorDelegate;
use App\Models\User;
use App\Models\Color;

class ProductColorController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $productColor;

    public function __construct($request, $arguments, $logger){
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->productColor      = new ProductColorDelegate();
    
    }

    public function addProductColors(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $prodId      = $this->arguments['prodId'];
        $newColors    = $this->body['colors'];

        $response = $this->productColor->addProductColor($user,$prodId,$newColors);

        if($response['response']==0){
            $logMessage='Error in adding a  Color: '.$newColors.' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProductColors(){
        $prodId      = $this->arguments['prodId'];
        $response    = $this->productColor->getProductColors($prodId);
        return $response;
    }

    public function removeProductColor(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $user      = new User();
        $prodId    = $this->arguments['prodId'];
        $color     = $this->arguments['color'];
        
        $user->setUserId($userID);
        $user->setToken($token);
        $response  = $this->productColor->removeProductColor($user,$prodId,$color);
        return $response;
    }

}
?>