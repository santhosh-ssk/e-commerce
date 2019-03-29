<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\ProductImage;

    class ProductImageDao extends ProductImage 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addProductImages($productImages)
        {
            $object = array(
                "tablename" => ProductImage::TABLENAME,
                "fields"    => array(ProductImage::SKUID,ProductImage::URL
                                ),
                "values"    => $productImages,
                "group"     => 1,
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getProductImages()
        {
            $object = array(
                "tablename" => ProductImage::TABLENAME,
                "fields"    => array(ProductImage::URL
                                ),
                "where"    => array(ProductImage::SKUID => $this->getSkuId()), 
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeProductImage(){
            $object = array(
                "tablename" => ProductImage::TABLENAME,
                "where"     => array(
                    "complex"  => array(
                            'AND' => array(
                                ProductImage::SKUID => $this->getSkuId(),
                                ProductImage::URL   => $this->getUrl() 
                            ),  
                    )
                  ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }
    }
    
?>