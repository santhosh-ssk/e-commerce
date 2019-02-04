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
            if($response['response']==1){
           
                $this->product->setCategoryId($newProduct->getCategoryId());
                $this->product->setName($newProduct->getName());
                $this->product->setDescription($newProduct->getDescription());
                $this->product->setColor($newProduct->getColor());
                $this->product->setSize($newProduct->getSize());
                $this->product->setNetWeight($newProduct->getNetWeight());
                $this->product->setMrpPrice($newProduct->getMrpPrice());
                $this->product->setBrandId($response['last_id']);
                $this->product->setStock($newProduct->getStock());
                $this->product->setRetailPrice($newProduct->getRetailPrice());
                $this->product->setImages($newProduct->setImages());
                
                $response = $this->product->addProduct();
                unset($response['last_id']);
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
    
    public function getAllProducts($user){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        if($authuser->verifyUserToken()){
            return $this->product->getAllProducts();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>