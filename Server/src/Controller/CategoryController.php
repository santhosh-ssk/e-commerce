<?php
namespace App\Controller;
use App\Delegate\CategoryDelegate;
use App\Models\User;
use App\Models\Category;

class CategoryController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $category;

    public function __construct($request, $arguments, $logger){
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->category      = new CategoryDelegate();
    
    }

    public function addCategory(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $newCategory = new Category();
        $newCategory->setName($this->body['name']);

        $response = $this->category->addCategory($user,$newCategory);

        if($response['response']==0){
            $logMessage='Error in adding a  Category: '.$newCategory->getName().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getCategoryNames(){

        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->category->getAllCategories($user);
        return $response;
    }

    public function removeCategory(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $categoryName = $this->arguments['name'];
        $user      = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->category->removeCategory($user,$categoryName);
        return $response;
    }

}
?>