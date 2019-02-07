<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\Product;
    use App\Models\Brand;
    use App\Models\Shop;
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
                            Product::CATEGORYID,Product::NAME, Product::DESCRIPTION,Product::BRANDID, /*Product::SIZE,
                            Product::NETWEIGHT, Product::MRPPRICE,Product::BRANDID,Product::STOCK,
                            Product::RETAILPRICE,Product::IMAGES*/
                ),
                "values"    => array(
                            $this->getCategoryId(),$this->getName(), $this->getDescription(),$this->getBrandId(),
                            /*$this->getSize(), $this->getNetWeight(),   $this->getMrpPrice(),
                            $this->getStock(),$this->getRetailPrice(),
                            $this->getImages()*/
                )
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getAllProducts(){
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Product::PRODID,Product::NAME, Product::DESCRIPTION,
                            Product::SIZE, Product::NETWEIGHT, Product::MRPPRICE,
                            Product::ISACTIVE,Product::VIEWS,Product::RATING,Product::RATINGCOUNT
                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        } 

        public function getProductsInCategory(){
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Product::PRODID,Product::NAME, Product::DESCRIPTION,Brand::BRANDNAME . " AS BrandName",
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
                            Product::PRODID,Product::NAME, Product::DESCRIPTION,Brand::BRANDNAME . " AS BrandName", 
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

        public function getProductShopId(){
            $object = array(
                "tablename" => Product::TABLENAME,
                "fields"    => array(
                            Shop::OWNER_ID
                ),
                "join"      => array(
                                array("tablename"  => ShopCategory::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Product::CATEGORYID,ShopCategory::SHOPCATEGORYID)
                                ),
                                array("tablename"  => Shop::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Shop::SHOPID,ShopCategory::SHOPID)
                                ),
                            ),
                "where"    => array(
                                Product::PRODID => $this->getProdId()
                ),
                
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeProduct(){
            $object = array(
                "tablename" => Product::TABLENAME,
                "where"    => array(
                        "simple" =>array(
                             Product::PRODID => $this->getProdId()
                             )
                ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

        public function checkOwnerId($prodId,$testOwnerId)
        {
            $this->setProdId($prodId);
            $result   = $this->getProductShopId();
            $OwnerId  = $result['data'][0]['owner_id']; 
            if($result['data'] && $OwnerId == $testOwnerId){
                return true;
            }
            else{
                return false;
            }
        }
    }
    
?>