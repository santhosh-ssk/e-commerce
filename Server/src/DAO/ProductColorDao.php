<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\ProductColor;
    use App\Models\Color;

    class ProductColorDao extends ProductColor 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addProductColors($productColors)
        {
            $object = array(
                "tablename" => ProductColor::TABLENAME,
                "fields"    => array(ProductColor::PRODUCTID, ProductColor::COLORID
                                ),
                "values"    => $productColors,
                "group"     => 1
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getProductColors()
        {
            $object = array(
                "tablename" => ProductColor::TABLENAME,
                "fields"    => array(Color::COLOR
                                ),
                "join"      => array(
                                array("tablename"  => Color::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Color::COLORID,ProductColor::COLORID)
                                ),
                ),
                "where"    => array(
                                ProductColor::PRODUCTID => $this->getProdId()
                ),
                "distinct" => 1,
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeProductColor(){
            $object = array(
                "tablename" => ProductColor::TABLENAME,
                "where"     => array(
                  "complex"  => array(
                          'AND' => array(
                                      ProductColor::PRODUCTID  => $this->getProdId(),
                                      ProductColor::COLORID    => $this->getColorId() 
                          ),  
                  )
                ),
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

    }
    
?>