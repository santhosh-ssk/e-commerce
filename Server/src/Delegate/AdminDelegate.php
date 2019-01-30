<?php
    
    namespace App\Delegate;
    use App\DAO\ShopDao;
    use App\Utils\Response;

    class AdminDelegate{
        
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

        public function setAuthShop($admin,$authshop){
            $token    = $admin->getToken();
            $token    = explode(" ",$token)[1];
            $admin->setToken($token);
            $this->shop->setShopId($authshop->getShopId());
            $this->shop->setIsAuth($authshop->getIsAuth());
            if($authshop->getIsAuth()){
                $this->shop->setStatus('Accepted');
            }
            else{
                $this->shop->setStatus('Not Accepted');
            }
            $response = $this->shop->authShops($admin);
            return $response;
        }
    }

?>