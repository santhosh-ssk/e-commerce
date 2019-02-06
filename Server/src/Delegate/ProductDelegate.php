<?php
namespace App\Delegate;

use App\DAO\ProductDao;
use App\DAO\UserDao;
use App\DAO\BrandDao;
use App\Utils\Response;

class ProductDelegate{
    private $product;
    private $response;

    public function __construct(){
        $this->product     = new ProductDao();
        $this->response = new Response();
    }


    /**
     *  Both Admin and Retailer can register a Product
     */
    public function registerProduct($user,$brandName,$newProduct){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            //registrer a brand
            $brandObj = new BrandDao();
            $brandObj->setBrandName($brandName);

            $response = $brandObj->addBrand();
            if($response['response'] == 1){
           
                $this->product->setCategoryId($newProduct->getCategoryId());
                $this->product->setName($newProduct->getName());
                $this->product->setDescription($newProduct->getDescription());
                $this->product->setSize($newProduct->getSize());
                $this->product->setNetWeight($newProduct->getNetWeight());
                $this->product->setMrpPrice($newProduct->getMrpPrice());
                $this->product->setBrandId($response['last_id']);
                $this->product->setStock($newProduct->getStock());
                $this->product->setRetailPrice($newProduct->getRetailPrice());
                $this->product->setImages($newProduct->getImages());
                
                $response = $this->product->addProduct();
                
                if($response['response'] == 1){
                        unset($response['last_id']);
                    }
                return $response;
            }
            else{
                return $response;
            }
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    public function getProductsInCategory($categoryId){
        $this->product->setCategoryId($categoryId);
        return $this->product->getProductsInCategory();
    }

    public function getShopProducts($shopId){
        return $this->product->getShopProducts($shopId);
    }

    public function removeProduct($user,$shopID,$product){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){
            $this->product->setProdId($product->getProdId());
            $response = $this->product->getProductShopId();
            
            if($response['response']==1){
                if(\count($response['data'])){
                    if($user->getUserId() == $response['data'][0]['owner_id']){
                        $this->product->setProdId($product->getProdId());
                        $response = $this->product->removeProduct();
                        return $response;
                    }
                    else{
                        $this->response->setResponse(0);
                        $this->response->setMessage("you don't have access");        
                    }
                }
                else{
                    $this->response->setResponse(0);
                    $this->response->setMessage("Shop/product does not exist");        
                }
            }
            else{
                return $response;
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