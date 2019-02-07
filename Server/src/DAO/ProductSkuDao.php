<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\ProductSku;
    
    


    class ProductSkuDao extends ProductSku 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addProductSku()
        {
            $object = array(
                "tablename" => ProductSku::TABLENAME,
                "fields"    => array(
                            ProductSku::PRODID, ProductSku::MRPPRICE,ProductSku::RETAILPRICE,ProductSku::STOCK,
                            
                ),
                "values"    => array(
                            $this->getProdId(),$this->getMrpPrice(), $this->getRetailPrice(),$this->getStock(),
                )
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getProductSkus($prodId){
            $object = array(
                "tablename" => ProductSku::TABLENAME,
                "fields"    => array("*"
                ),
                "where"     => array(
                                ProductSku::PRODID => $prodId
                )
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        } 

        public function checkProdId($skuId,$testProdId)
        {
            $object = array(
                "tablename" => ProductSku::TABLENAME,
                "fields"    => array(ProductSku::PRODID
                ),
                "where"     => array(
                                ProductSku::SKUID => $skuId
                )
            );
            $result = $this->db_connect->query($object,0);
            $prodId  = $result['data'][0]['prod_id']; 
            
            if($result['data'] && $prodId == $testProdId){
                return true;
            }
            else{
                return false;
            }
        }



        public function getProductSkuDetails(){
            $object = array(
                "tablename" => ProductSku::TABLENAME,
                "fields"    => array(
                            ProductSku::PRODID,ProductSku::NAME, ProductSku::DESCRIPTION,Brand::BRANDNAME . " AS BrandName",
                ),
                "join"      => array(
                                array("tablename"  => Brand::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Brand::BRANDID,ProductSku::BRANDID)
                                ),
                            ),
                "where"    => array(
                                ProductSku::CATEGORYID => $this->getCategoryId()
                ),
                
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        
        public function removeProductSku($prodId,$skuId){
            $object = array(
                "tablename" => ProductSku::TABLENAME,
                "where"     => array(
                  "complex"  => array(
                          'AND' => array(
                                      ProductSku::PRODID  => $prodId,
                                      ProductSku::SKUID   => $skuId 
                          ),  
                  )
                ),
            );
            $response = $this->db_connect->deleteRecord($object);
            //var_dump($response);
            return $response;

        }
    }
    
?>