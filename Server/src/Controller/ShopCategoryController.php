<?php
namespace App\Controller;
use App\Delegate\ShopCategoryDelegate;
use App\Models\User;
use App\Models\Category;

class ShopCategoryController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $shopcategory;

    public function __construct($request, $arguments, $logger){
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->shopcategory      = new ShopCategoryDelegate();
    
    }

    public function addShopCategory(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $shopId      = $this->arguments['shopId'];
        $newCategory = $this->body['name'];

        $response = $this->shopcategory->addShopCategory($user,$shopId,$newCategory);

        if($response['response']==0){
            $logMessage='Error in adding a  Category: '.$newCategory.' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getShopCategories(){
        $shopId      = $this->arguments['shopId'];
        $response = $this->shopcategory->getShopCategories($shopId);
        return $response;
    }

    public function removeShopCategory(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $user      = new User();
        $user->setUserId($userID);
        $user->setToken($token);
        $shopId      = $this->arguments['shopId'];
        $categoryName = $this->arguments['name'];
        $response = $this->shopcategory->removeShopCategory($user,$shopId,$categoryName);
        return $response;
    }

}
?>