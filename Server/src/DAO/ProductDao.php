<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\Product;
    use App\Models\Brand;
    use App\Models\ShopCategory;

    class ProductDao extends Product 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addProduct()
        {
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Product::CATEGORYID,Product::NAME, Product::DESCRIPTION, Product::COLOR, Product::SIZE,
                            Product::NETWEIGHT, Product::MRPPRICE,Product::BRANDID,Product::STOCK,
                            Product::RETAILPRICE,Product::IMAGES
                ),
                "values"    => array(
                            $this->getCategoryId(),$this->getName(), $this->getDescription(), $this->getColor(),
                            $this->getSize(), $this->getNetWeight(),   $this->getMrpPrice(),
                            $this->getBrandId(),$this->getStock(),$this->getRetailPrice(),
                            $this->getImages()
                )
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getAllProducts(){
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Product::PRODID,Product::NAME, Product::DESCRIPTION, Product::COLOR,
                            Product::SIZE, Product::NETWEIGHT, Product::MRPPRICE,
                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        } 

        public function getProductsInCategory(){
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Product::PRODID,Product::NAME, Product::DESCRIPTION, Product::COLOR,
                            Product::SIZE, Product::NETWEIGHT, Product::MRPPRICE,Product::RETAILPRICE,
                            Brand::BRANDNAME . " AS BrandName",Product::STOCK,Product::IMAGES
                ),
                "join"      => array(
                                array("tablename"  => Brand::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Brand::BRANDID,Product::BRANDID)
                                ),
                            ),
                "where"    => array(
                                Product::CATEGORYID => $this->getCategoryId()
                ),
                
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function getShopProducts($shopId){
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Product::PRODID,Product::NAME, Product::DESCRIPTION, Product::COLOR,
                            Product::SIZE, Product::NETWEIGHT, Product::MRPPRICE,Product::RETAILPRICE,
                            Brand::BRANDNAME . " AS BrandName",Product::STOCK,Product::IMAGES
                ),
                "join"      => array(
                                array("tablename"  => Brand::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Brand::BRANDID,Product::BRANDID)
                                ),
                                array("tablename"  => ShopCategory::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Product::CATEGORYID,ShopCategory::SHOPCATEGORYID)
                                ),
                            ),
                "where"    => array(
                                ShopCategory::SHOPID => $shopId
                ),
                
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }
    }
    
?>