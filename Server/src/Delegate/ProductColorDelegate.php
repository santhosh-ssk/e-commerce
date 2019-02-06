<?php

namespace App\Delegate;
use App\DAO\UserDao;
use App\DAO\ProductColorDao;
use App\DAO\ColorDao;
use App\Utils\Response;

class ProductColorDelegate{
    private $color;
    private $productColor;
    private $response;

    public function __construct(){
        $this->color          = new ColorDao();
        $this->productColor   = new ProductColorDao();
        $this->response       = new Response();
    }


    /**
     *   Retailer can add a Color to product
     */
    public function addProductColor($user,$prodId,$newColors){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){

            $response = $this->color->addColors($newColors);
            if($response['response']==1){
                $response =$this->color->getColorByNames($newColors);
                if($response['response']==1){
                    $productColors = array();
                    $colors = $response['data'];
                    foreach ($colors as $color) {
                        array_push($productColors,array($prodId,$color['color_id']));
                    }
                    return $this->productColor->addProductColors($productColors);
                }
                else{
                    return $response;
                }
                
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
     *  Any user can fetch all ProductColors
     */
    public function getProductColors($prodId){
        $this->productColor->setProdId($prodId);
        $response = $this->productColor->getProductColors();
        return $response;
    }

    /**
     * Retailer can remove a productColor
     */
     public function removeProductColor($user,$prodId,$color){
        
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken()){
            $this->color->setColor($color);
            $response = $this->color->getColorByName();
            
            if( $response['response'] == 1){
                if(count($response['data']) >= 1){

                    $colorId = $response['data'][0]['color_id'];
                    $this->productColor->setColorId($colorId);
                    $this->productColor->setProdId($prodId);
                    $response = $this->productColor->removeProductColor();
                    return $response;
                }
                else{
                    $this->response->setResponse(0);
                    $this->response->setMessage("Error color does not exist");    
                }
            }
            else{
                $this->response->setResponse(0);
                $this->response->setMessage("Error in fetching color");
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
