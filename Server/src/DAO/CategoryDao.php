<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\Category;

    class CategoryDao extends Category 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addCategory()
        {
            $object = array(
                "tablename" => Category::TABLENAME,
                "fields"    => array(Category::NAME
                                ),
                "values"    => array( $this->getName()
                                ),
                "duplicateFlag" => 1,
                "getlastId" => Category::CATEGORYID

            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getAllCategoryNames()
        {
            $object = array(
                "tablename" => Category::TABLENAME,
                "fields"    => array(Category::NAME
                                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeCategory(){
            $object = array(
                "tablename" => Category::TABLENAME,
                "where"     => array(
                  "simple"  => array(
                    Category::NAME => $this->getName()
                  )
                ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

 
    }
    
?>