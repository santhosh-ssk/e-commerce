<?php
namespace App\Controller;
use App\Delegate\ProductVariantDelegate;
use App\Models\User;
use App\Models\Variant;

class ProductVariantController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $productVariant;

    public function __construct($request, $arguments, $logger){
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->productVariant      = new ProductVariantDelegate();
    
    }

    public function addProductVariants(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $newVariants   = $this->body;
        $prodId        = $this->arguments['prodId'];
        $skuId         = $this->arguments['skuId'];
        
        $response = $this->productVariant->addProductVariants($user,$prodId,$skuId,$newVariants);

        if($response['response']==0){
            $logMessage='Error in adding a  Variant to product: '.$prodId.' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProductVariants(){
        $prodId      = $this->arguments['prodId'];
        $skuId       = $this->arguments['skuId'];
        $response    = $this->productVariant->getProductVariants($prodId,$skuId);
        return $response;
    }

    public function removeProductVariant(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $user      = new User();
        $prodId    = $this->arguments['prodId'];
        $skuId     = $this->arguments['skuId'];
        $name      = $this->arguments['name'];
        
        $user->setUserId($userID);
        $user->setToken($token);
        $response  = $this->productVariant->removeProductVariant($user,$prodId,$skuId,$name);
        return $response;
    }

}
?>