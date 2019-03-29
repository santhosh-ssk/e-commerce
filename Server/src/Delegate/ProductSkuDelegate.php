<?php
namespace App\Delegate;

use App\DAO\ProductSkuDao;
use App\DAO\UserDao;
use App\DAO\ProductDao;
use App\Utils\Response;

class ProductSkuDelegate{
    private $productSku;
    private $response;
    private $product;

    public function __construct(){
        $this->productSku     = new ProductSkuDao();
        $this->response       = new Response();
        $this->product        = new ProductDao();
    }


    /**
     *  Retailer can add ProductSku
     */
    public function addProductSku($user,$newProductSku){
        
        $prodId  = $newProductSku->getProdId();
        $ownerId = $user->getUserId();

        $authuser = new UserDao();
        $authuser->setUserId($ownerId);
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken() && $this->product->checkOwnerId($prodId,$ownerId)){

                
                $this->productSku->setProdId($prodId);
                $this->productSku->setMrpPrice($newProductSku->getMrpPrice());
                $this->productSku->setRetailPrice($newProductSku->getRetailPrice());
                $this->productSku->setStock($newProductSku->getStock());
                
                
                $response = $this->productSku->addProductSku();
                
                if($response['response'] == 1){
                        unset($response['last_id']);
                    }
                return $response;
            }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    

    public function getProductSkus($prodId){
        return $this->productSku->getProductSkus($prodId);
    }

    public function removeProductSku($user,$prodId,$skuId){
        $prodId   = (int)$prodId;
        $skuId    = (int)$skuId; 
        $ownerId  = (int)$user->getUserId();
        $authuser = new UserDao();
        $authuser->setUserId($ownerId);
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken() && $this->product->checkOwnerId($prodId,$ownerId)){
            $response = $this->productSku->removeProductSku($prodId,$skuId);
            //var_dump($response);
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>