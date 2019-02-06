<?php
namespace App\Delegate;
use App\DAO\ProductDescriptionDao;
use App\DAO\UserDao;
use App\Utils\Response;

class ProductDescriptionDelegate{
    private $productDescription;
    private $response;

    public function __construct(){
        $this->productDescription  = new ProductDescriptionDao();
        $this->response            = new Response();
    }


    /**
     *  Retailer can add a productDescription to product
     */
    public function addProductDescription($user,$prodId,$productDescriptions){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){
            $productDescription = array();
            foreach ($productDescriptions as $title => $description) {
                array_push($productDescription,array($prodId,$title,$description));
            }
            $response = $this->productDescription->addProductDescription($productDescription);
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Anyone can get Product Description
     */

    public function getProductDescriptions($prodId){  
        $this->productDescription->setProdId($prodId);      
        return $this->productDescription->getProductDescriptions();
    }

    /**
     *  Retailer can delete a productDescription by title
     */
     public function removeProductDescription($user,$prodId,$title){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        $this->productDescription->setProdId($prodId);
        $this->productDescription->setTitle($title);
        if($authuser->verifyUserToken()){
            return $this->productDescription->removeProductDescription();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>