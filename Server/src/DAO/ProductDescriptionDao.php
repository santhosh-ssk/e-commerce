<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\ProductDescription;

    class ProductDescriptionDao extends ProductDescription 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addProductDescription($productDescription)
        {
            $object = array(
                "tablename" => ProductDescription::TABLENAME,
                "fields"    => array(ProductDescription::PRODID,ProductDescription::TITLE,
                                ProductDescription::DESCRIPTION
                                ),
                "values"    => $productDescription,
                "group"     => 1,
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getProductDescriptions()
        {
            $object = array(
                "tablename" => ProductDescription::TABLENAME,
                "fields"    => array(ProductDescription::TITLE,ProductDescription::DESCRIPTION
                                ),
                "where"    => array(ProductDescription::PRODID => $this->getProdId()), 
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeProductDescription(){
            $object = array(
                "tablename" => ProductDescription::TABLENAME,
                "where"     => array(
                    "complex"  => array(
                            'AND' => array(
                                ProductDescription::PRODID => $this->getProdId(),
                                ProductDescription::TITLE => $this->getTitle() 
                            ),  
                    )
                  ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }
    }
    
?>