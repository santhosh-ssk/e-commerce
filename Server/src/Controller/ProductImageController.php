<?php
namespace App\Controller;
use App\Delegate\ProductImageDelegate;
use App\Models\User;
use Slim\Http\UploadedFile;


class ProductImageController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $productImage;

    public function __construct($request, $arguments, $logger){
        $this->logger              = $logger;
        $this->request             = $request;
        $this->body                = $request->getParsedBody();
        $this->headers             = $request->getHeaders();
        $this->arguments           = $arguments;
        $this->productImage        = new ProductImageDelegate();
    
    }

    public function addProductImages(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $prodId = $this->arguments['prodId'];
        $skuId  = $this->arguments['skuId'];

        $images = $this->request->getUploadedFiles()['images'];
        $response    = $this->productImage->addProductImages($user,$prodId,$skuId,$images);

        if($response['response']==0){
            $logMessage='Error in adding a product description with title: '.$title.' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getProductImages(){
        $prodId   = $this->arguments['prodId'];
        $response = $this->productImage->getProductImages($prodId);
        return $response;
    }

    public function removeProductImage(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $prodId    = $this->arguments['prodId'];
        $title     = $this->arguments['title'];
        $user      = new User();
        $user->setUserId($userID);
        $user->setToken($token);
        $response = $this->productImage->removeProductImage($user,$prodId,$title);
        return $response;
    }

}
?>