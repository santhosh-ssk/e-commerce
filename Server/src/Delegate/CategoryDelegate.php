<?php
namespace App\Delegate;
use App\DAO\CategoryDao;
use App\DAO\UserDao;
use App\Utils\Response;

class CategoryDelegate{
    private $category;
    private $response;

    public function __construct(){
        $this->category     = new CategoryDao();
        $this->response  = new Response();
    }


    /**
     *  Both Admin and Retailer can add a Category
     */
    public function addCategory($user,$newCategory){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $this->category->setName($newCategory->getName());
            $response = $this->category->addCategory();
            return $response;
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Both Admin and Retailer fetch all Category
     */
    public function getAllCategories($user){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        if($authuser->verifyUserToken()){
            return $this->category->getAllCategoryNames();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }

    /**
     *  Both Admin and Retailer can delete a Category by name
     */
     public function removeCategory($user,$categoryName){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        $this->category->setName($categoryName);
        if($authuser->verifyUserToken()){
            return $this->category->removeCategory();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
}
?>