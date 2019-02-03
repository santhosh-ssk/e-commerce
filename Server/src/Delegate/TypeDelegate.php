<?php
namespace App\Delegate;
use App\DAO\TypeDao;
use App\DAO\UserDao;
use App\Utils\Response;

class TypeDelegate{
    private $type;
    private $response;

    public function __construct(){
        $this->type     = new TypeDao();
        $this->response  = new Response();
    }


    /**
     *  Both Admin and Retailer can add a type
     */
    public function addType($user,$newType){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $this->type->setName($newType->getName());
            $response = $this->type->addType();
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Both Admin and Retailer fetch all Types
     */
    public function getTypes($user){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        if($authuser->verifyUserToken()){
            return $this->type->getTypes();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }

    /**
     *  Both Admin and Retailer can delete a Type by name
     */
     public function removeType($user,$typeName){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        $this->type->setName($typeName);
        if($authuser->verifyUserToken()){
            return $this->type->removeType();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>