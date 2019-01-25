<?php
    
    namespace App\Delegate;
    use App\DAO\ShopDao;
    use App\Utils\Response;

    class AdminDelegate{
        
        private $user;
        private $shop;
        private $response;

        public function __construct(){
            $this->shop     = new ShopDao(); 
            $this->response = new Response();
        }        
        
        public function getUserShops($admin){
            $token    = $admin->getToken();
            $token    = explode(" ",$token)[1];
            $admin->setToken($token);
            $response = $this->shop->fetchUserShops($admin); 
            return $response;
        }
    }

?>