<?php
namespace App\Delegate;
use App\DAO\ProductImageDao;
use App\DAO\ProductDao;
use App\DAO\UserDao;
use App\Utils\Response;
use Slim\Http\UploadedFile;

class ProductImageDelegate{
    private $productImage;
    private $response;
    private $product;

    public function __construct(){
        $this->productImage   = new ProductImageDao();
        $this->response       = new Response();
        $this->product        = new ProductDao();
    }


    /**
     *  Retailer can add a productImage to product
     */
    public function addProductImages($user,$prodId,$skuId,$productImages){
        
        $ownerId = $user->getUserId();

        $authuser = new UserDao();
        $authuser->setUserId($ownerId);
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);

        if($authuser->verifyUserToken() &&  $this->product->checkOwnerId($prodId,$ownerId)){
            $productImage = array();
            foreach ($productImages as $image) {
                 if ($image->getError() === UPLOAD_ERR_OK) {
                     $filename = $this->moveUploadedFile($image);
                     array_push($productImage,[$skuId,$filename]);
                 }
                
            }
            $response = $this->productImage->addProductImages($productImage);
            return $response;
           
        
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    
    /**
     *  Anyone can get Product Images
     */

    public function getProductImages($prodId){  
        $this->productImage->setProdId($prodId);      
        return $this->productImage->getProductDescriptions();
    }

    /**
     *  Retailer can delete a productImage by filename
     */
     public function removeProductImage($user,$prodId,$title){
        $authuser = new UserDao();
        $authuser->setUserId($user->getUserId());
        $token    = explode(" ",$user->getToken())[1];
        $authuser->setToken($token);
        $this->productImage->setProdId($prodId);
        $this->productImage->setTitle($title);
        if($authuser->verifyUserToken()){
            return $this->productImage->removeProductDescription();
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized user");
        }

        return $this->response->getResponse();
    }
    public function moveUploadedFile(UploadedFile $uploadedFile)
        {   
            $directory = __DIR__.'/../Asserts/Images';
            $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
            $filename  = $prodId.'-'.$skuId.'-'.\rand(100,1000).'-'.\date('h:i:s').'.'.$extension;
            $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
            return $filename;
        }

}
?>