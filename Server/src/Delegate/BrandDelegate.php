<?php
namespace App\Delegate;
use App\DAO\BrandDao;
use App\DAO\UserDao;
use App\Utils\Response;

class BrandDelegate{
    private $brand;
    private $response;

    public function __construct(){
        $this->brand     = new BrandDao();
        $this->response  = new Response();
    }


    /**
     *  Both Admin and Retailer can add a brand
     */
    public function addBrand($user,$newBrand){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $this->brand->setBrandName($newBrand->getBrandName());
            $response = $this->brand->addBrand();
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Both Admin and Retailer fetch all brands
     */
    public function getAllBrands($user){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        if($authuser->verifyUserToken()){
            return $this->brand->getAllBrandNames();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }

    /**
     *  Both Admin and Retailer can delete a brand by name
     */
     public function removeBrand($user,$brandName){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        $this->brand->setBrandName($brandName);
        if($authuser->verifyUserToken()){
            return $this->brand->removeBrand();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>