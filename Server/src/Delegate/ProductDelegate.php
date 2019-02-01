<?php
namespace App\Delegate;
use App\DAO\ProductDao;
use App\DAO\UserDao;
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
    public function registerProduct($user,$newProduct){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $this->product->setName($newProduct->getName());
            $this->product->setDescription($newProduct->getDescription());
            $this->product->setColor($newProduct->getColor());
            $this->product->setSize($newProduct->getSize());
            $this->product->setNetWeight($newProduct->getNetWeight());
            $this->product->setMrpPrice($newProduct->getMrpPrice());

            $response = $this->product->addProduct();
            unset($response['last_id']);
            
            return $response;
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