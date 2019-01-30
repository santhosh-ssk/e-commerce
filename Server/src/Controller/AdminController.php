<?php
namespace App\Controller;
use App\Delegate\AdminDelegate;
use App\Models\Shop;
use App\Models\User;


class AdminController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $logger;
    private $admindelegate;
    private $arguments;
    private $admin;

    public function __construct($request,$arguments,$logger){
        
        $this->logger        = $logger;
        $this->request       = $request;
        $this->body          = $request->getParsedBody();
        $this->headers       = $request->getHeaders();
        $this->arguments     = $arguments;
        $this->admindelegate  = new AdminDelegate();
        $this->admin          = new User();
    }

    public function fetchUserShops(){
        
        $adminId = $this->arguments['adminId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $this->admin->setUserId($adminId);
        $this->admin->setToken($token);
        $response=$this->admindelegate->getUserShops($this->admin);
        
        if($response['response']==1){
            return $response;
        }
        else{
            $this->logger->info('Error in fetching shop details by admin '.$adminId.' message: '.$response['message']);
            return $response;
        }
    }

    public function authUserShop()
    {
        $adminId  = $this->arguments['adminId'];
        $token    = $this->headers['HTTP_AUTHORIZATION'][0];
        $this->admin->setUserId($adminId);
        $this->admin->setToken($token);
        $shop     = new Shop();
        $shop->setShopId($this->body['shopId']);
        $shop->setIsAuth($this->body['isAuth']);
        $response = $this->admindelegate->setAuthShop($this->admin,$shop);

        if($response['response']==1){
            return $response;
        }
        else{
            $this->logger->info('Error in authorizing shop details by admin '.$adminId.' message: '.$response['message']);
            return $response;
        }
    }

     
}