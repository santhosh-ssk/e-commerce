<?php

namespace App\Delegate;
use App\DAO\UserDao;
use App\DAO\ShopCategoryDao;
use App\DAO\CategoryDao;
use App\Utils\Response;

class ShopCategoryDelegate{
    private $category;
    private $shopcategory;
    private $response;

    public function __construct(){
        $this->category       = new CategoryDao();
        $this->shopcategory   = new ShopCategoryDao();
        $this->response       = new Response();
    }


    /**
     *   Retailer can add a Category to is shop
     */
    public function addShopCategory($user,$shopId,$newCategory){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $this->category->setName($newCategory);
            $response = $this->category->addCategory();
            if($response['response']==1){
                
                $categoryId = $response['last_id'];
                $this->shopcategory->setCategoryId($categoryId);
                $this->shopcategory->setShopId($shopId);
                $response = $this->shopcategory->addShopCategory();
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
     *  Any user can fetch all shopCategory
     */
    public function getShopCategories($shopId){
        
        $this->shopcategory->setShopId($shopId);
        $response = $this->shopcategory->getShopCategory();
        return $response;
        
    }

    /**
     * Retailer can remove a shopcategory
     */
     public function removeShopCategory($user,$shopId,$CategeryName){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){
            $this->category->setName($CategeryName);
            $response = $this->category->getCategoryByName();
            
            if( $response['response'] == 1){
                if(count($response['data']) >= 1){

                    $categoryId = $response['data'][0]['category_id'];
                    $this->shopcategory->setCategoryId($categoryId);
                    $this->shopcategory->setShopId($shopId);
                    $response = $this->shopcategory->removeShopCategory();
                    return $response;
                }
                else{
                    $this->response->setResponse(0);
                    $this->response->setMessage("Error Category does not exist");    
                }
            }
            else{
                $this->response->setResponse(0);
                $this->response->setMessage("Error in fetching Category");
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
