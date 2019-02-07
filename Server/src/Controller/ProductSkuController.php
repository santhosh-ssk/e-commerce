<?php
namespace App\Controller;
use App\Delegate\ProductSkuDelegate;
use App\Models\User;
use App\Models\ProductSku;

class ProductSkuController{
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
        $this->productSku = new ProductSkuDelegate();
    
    }

    public function addProductSku(){
        
        $userID     = $this->arguments['userId'];
       
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $productSku = new ProductSku();

        $productSku->setProdId($this->arguments['prodId']);
        $productSku->setMrpPrice($this->body['mrpPrice']);
        $productSku->setRetailPrice($this->body['retailPrice']);
        $productSku->setStock($this->body['stock']);
        
        $response = $this->productSku->addProductSku($user,$productSku);
        if($response['response']==0){
            $logMessage='Error in adding productSku: '.$productSku->getProdId().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProductSkus(){
        $prodID = $this->arguments['prodId'];
        $response = $this->productSku->getProductSkus($prodID);
        return $response;
    }

    

    public function removeProductSku(){
        
        $userID     = $this->arguments['userId'];
        $prodId     = $this->arguments['prodId'];
        $skuId     = $this->arguments['skuId'];
        
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        
        $response = $this->productSku->removeProductSku($user,$prodId,$skuId);
        if($response['response']==0){
            $logMessage='Error in registering productSku: '.$prodId.' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

}
?>