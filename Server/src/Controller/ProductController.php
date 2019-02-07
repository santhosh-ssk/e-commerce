<?php
namespace App\Controller;
use App\Delegate\ProductDelegate;
use App\Models\User;
use App\Models\Product;

class ProductController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;

    public function __construct($request, $arguments, $logger){
        $this->logger=$logger;
        $this->request = $request;
        $this->body    = $request->getParsedBody();
        $this->headers = $request->getHeaders();
        $this->arguments     = $arguments;
        $this->product = new ProductDelegate();
    
    }

    public function addProduct(){
        
        $userID     = $this->arguments['userId'];
        $categoryId = $this->arguments['categoryId'];
        $brandName  = $this->body['brandName'];

        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $product = new Product();

        $product->setCategoryId($categoryId);
        $product->setName($this->body['name']);
        $product->setDescription($this->body['description']);
        
        /*
        $product->setSize($this->body['size']);
        $product->setNetWeight($this->body['netWeight']);
        $product->setMrpPrice($this->body['mrpPrice']);
        $product->setRetailPrice($this->body['retailPrice']);
        $product->setStock($this->body['stock']);
        $product->setImages($this->body['images']);
        */
        
        $response = $this->product->registerProduct($user,$brandName,$product);
        if($response['response']==0){
            $logMessage='Error in registering product: '.$product->getName().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProductsInCategory(){
        $categoryID = $this->arguments['categoryId'];
        $response = $this->product->getProductsInCategory($categoryID);
        return $response;
    }

    public function getShopProducts(){
        $shopID = $this->arguments['shopId'];
        $response = $this->product->getShopProducts($shopID);
        return $response;
    }

    public function removeProduct(){
        
        $userID     = $this->arguments['userId'];
        $prodId     = $this->arguments['prodId'];
        $shopId     = $this->arguments['shopId'];
        $brandName  = $this->body['brandName'];

        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $product = new Product();
        $product->setProdId($prodId);
     
        $response = $this->product->removeProduct($user,$shopID,$product);
        if($response['response']==0){
            $logMessage='Error in registering product: '.$product->getProdId().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

}
?>