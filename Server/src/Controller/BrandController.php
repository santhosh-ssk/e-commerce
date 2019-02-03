<?php
namespace App\Controller;
use App\Delegate\BrandDelegate;
use App\Models\User;
use App\Models\Brand;

class BrandController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $brand;

    public function __construct($request, $arguments, $logger){
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->brand      = new BrandDelegate();
    
    }

    public function addBrand(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $newBrand = new Brand();
        $newBrand->setBrandName($this->body['name']);

        $response = $this->brand->addBrand($user,$newBrand);

        if($response['response']==0){
            $logMessage='Error in adding a  brand: '.$newBrand->getBrandName().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getBrandNames(){

        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->brand->getAllBrands($user);
        return $response;
    }

    public function removeBrand(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $brandName = $this->arguments['name'];
        $user      = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->brand->removeBrand($user,$brandName);
        return $response;
    }

}
?>