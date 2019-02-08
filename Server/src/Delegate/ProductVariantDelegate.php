<?php

namespace App\Delegate;
use App\DAO\UserDao;
use App\DAO\ProductVariantDao;
use App\DAO\VariantDao;
use App\DAO\VariantValueDao;
use App\DAO\ProductDao;
use App\Utils\Response;

class ProductVariantDelegate{
    private $variant;
    private $product;
    private $productVariant;
    private $response;

    public function __construct(){
        $this->product          = new ProductDao();
        $this->variant          = new VariantDao();
        $this->variantValue     = new VariantValueDao();
        $this->productVariant   = new ProductVariantDao();
        $this->response         = new Response();
    }


    /**
     *   Retailer can add a variant to product
     */
    public function addProductVariants($user,$prodId,$skuId,$newvariants){
        
        $ownerId  = $user->getUserId();
        $authuser = new UserDao();
        $authuser->setUserId($ownerId);
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        
        if($authuser->verifyUserToken() && $this->product->checkOwnerId($prodId,$ownerId)){
            $newvariantNames = array_keys($newvariants);
            $response = $this->variant->addVariants($newvariantNames);
            
             if($response['response']==1){
                $response =$this->variant->getVariantsByNames($newvariantNames);
                if($response['response']==1 && count($response['data'])>=1){
                    $variantNames  = $response['data'];
                    $variantValues = array();
                    $values        = array();
                    foreach ($variantNames as $variantname) {
                        $variantId   = $variantname['variant_id'];
                        $variantname = $variantname['variant_name'];
                        \array_push($values,$newvariants[$variantname]);
                        array_push($variantValues,array($variantId,$newvariants[$variantname]));
                    }
                    $response = $this->variantValue->addVariantValues($variantValues);
                    if($response['response']==1){
                        $response = $this->variantValue->getVariantValuesIdByValues($values);
                        if($response['response']==1 && count($response['data'])>=1){
                            $valuesId = $response['data'];
                            $productValues = array();   
                            foreach ($valuesId as $valueId) {
                                $valueId   = $valueId['value_id'];
                                array_push($productValues,array($skuId,$valueId));
                            }
                            $response = $this->productVariant->addProductVariants($productValues);
                            
                        }
                    }
                }
                
            }
            
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Any user can fetch all Product Variants
     */
    public function getProductVariants($prodId,$skuId){
        $this->productVariant->setSkuId($skuId);
        $response = $this->productVariant->getProductVariants();
        return $response;
    }

    /**
     * Retailer can remove a productVariant
     */
     public function removeProductVariant($user,$prodId,$skuId,$variantname){
        
        $ownerId  = $user->getUserId();
        $authuser = new UserDao();
        $authuser->setUserId($ownerId);
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken() && $this->product->checkOwnerId($prodId,$ownerId) ){
            $this->productVariant->setSkuId($skuId);
            $response = $this->productVariant->getProductVariantValueId($variantname);
            
            if( $response['response'] == 1){
                if(count($response['data']) >= 1){

                    $valueId = $response['data'][0]['value_id'];
                    $this->productVariant->setValueId($valueId);        
                    $response = $this->productVariant->removeProductVariant();
                    return $response;
                }
                else{
                    $this->response->setResponse(0);
                    $this->response->setMessage("Error variant does not exist");    
                }
            }
            else{
                $this->response->setResponse(0);
                $this->response->setMessage("Error in fetching variant");
            }
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>
