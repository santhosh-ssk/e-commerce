<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\Product;

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
                            Product::NAME, Product::DESCRIPTION, Product::COLOR, Product::SIZE,
                            Product::NETWEIGHT, Product::MRPPRICE,
                ),
                "values"    => array(
                            $this->getName(), $this->getDescription(), $this->getColor(),
                            $this->getSize(), $this->getNetWeight(),   $this->getMrpPrice(),
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
    }
    
?>