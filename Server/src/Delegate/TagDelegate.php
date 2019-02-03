<?php
namespace App\Delegate;
use App\DAO\TagDao;
use App\DAO\UserDao;
use App\Utils\Response;

class TagDelegate{
    private $tag;
    private $response;

    public function __construct(){
        $this->tag       = new TagDao();
        $this->response  = new Response();
    }


    /**
     *  Both Admin and Retailer can add a Tag to product
     */
    public function addTag($user,$newTag){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $this->tag->setName($newTag->getName());
            $response = $this->tag->addTag();
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Both Admin and Retailer fetch all Tags
     */
    public function getTags($user){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        if($authuser->verifyUserToken()){
            return $this->tag->getTags();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }

    /**
     *  Both Admin and Retailer can delete a Tag by name
     */
     public function removeTag($user,$tagName){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        $this->tag->setName($tagName);
        if($authuser->verifyUserToken()){
            return $this->tag->removeTag();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>