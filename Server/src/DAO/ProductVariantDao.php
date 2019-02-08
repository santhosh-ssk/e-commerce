<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\ProductVariant;
    use App\Models\Variant;
    use App\Models\VariantValue;

    class ProductVariantDao extends ProductVariant 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addProductVariants($productVariants)
        {
            $object = array(
                "tablename" => ProductVariant::TABLENAME,
                "fields"    => array(ProductVariant::SKUID,ProductVariant::VALUEID,
                                ),
                "values"    => $productVariants,
                "group"     => 1,
                "duplicateFlag" => 1,
                "getlastId" => ProductVariant::SKUID
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getProductVariants()
        {
            $object = array(
                "tablename" => ProductVariant::TABLENAME,
                "fields"    => array(Variant::NAME,VariantValue::VALUE
                                ),
                "join"      => array(
                            array("tablename"  => VariantValue::TABLENAME,
                            "joinType"   => "JOIN",
                            "on" =>array(ProductVariant::VALUEID,VariantValue::VALUEID)
                            ),
                            array("tablename"  => Variant::TABLENAME,
                            "joinType"   => "JOIN",
                            "on" =>array(Variant::VARIANTID,VariantValue::VARIANTID)
                            ),
                ),
                "where"     => array(
                        ProductVariant::SKUID  => $this->getSkuId(),
                ), 
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        }

        public function removeProductVariant(){
            $object = array(
                "tablename" => ProductVariant::TABLENAME,
                "where"     => array(
                    "complex"  => array(
                            'AND' => array(
                                ProductVariant::SKUID => $this->getSkuId(),
                                ProductVariant::VALUEID => $this->getValueId() 
                            ),  
                    )
                  ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

        public function getProductVariantValueId($variantName)
        {
            $object = array(
                "tablename" => ProductVariant::TABLENAME,
                "fields"    => array(ProductVariant::VALUEID
                                ),
                "join"      => array(
                            array("tablename"  => VariantValue::TABLENAME,
                            "joinType"   => "JOIN",
                            "on" =>array(ProductVariant::VALUEID,VariantValue::VALUEID)
                            ),
                            array("tablename"  => Variant::TABLENAME,
                            "joinType"   => "JOIN",
                            "on" =>array(Variant::VARIANTID,VariantValue::VARIANTID)
                            ),
                ),
                "where"     => array(
                    "AND"   =>array(
                              ProductVariant::SKUID  => $this->getSkuId(),
                              Variant::NAME  => $variantName,
                            )
                ), 
            );
            //var_dump($object['where']);
            $response = $this->db_connect->query($object,1);
            return $response;
        }
    }
    
?>