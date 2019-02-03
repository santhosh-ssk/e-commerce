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

            // if($authshop->getIsAuth() && $response['response'] == 1 && $response['data']['affected rows'] == 1){
             if(true){
                $folderPath = __DIR__;
                $userFolder = '/User'.$authshop->getOwnerId();
                $shopFolder = '/Shop'.$authshop->getShopId();

                //user folder does not exist
                if(!is_dir($folderPath.$userFolder)){
                    $path = $folderPath.$userFolder;
                    echo $path;
                        mkdir('/home/dell02/sample1',0777,true);
                        //echo 'created userfolder in '.$folderPath.$userFolder;
                }
                else if( !is_dir($folderPath.$userFolder.$shopFolder)){
                    \mkdir($folderPath.$userFolder.$shopFolder,0777,true);
                    echo 'created shopfolder';
                }
                //echo ' '.$authshop->getOwnerId().' '.$authshop->getShopId();
            }

            return $response;
        }
    }

?>