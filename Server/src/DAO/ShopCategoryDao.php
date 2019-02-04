<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\ShopCategory;
    use App\Models\Category;

    class ShopCategoryDao extends ShopCategory 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addShopCategory()
        {
            $object = array(
                "tablename" => ShopCategory::TABLENAME,
                "fields"    => array(ShopCategory::SHOPID, ShopCategory::CATEGORYID
                                ),
                "values"    => array( $this->getShopId(),$this->getCategoryId()
                                ),
            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getShopCategory()
        {
            $object = array(
                "tablename" => ShopCategory::TABLENAME,
                "fields"    => array(Category::NAME
                                ),
                "join"      => array(
                                array("tablename"  => Category::TABLENAME,
                                "joinType"   => "JOIN",
                                "on" =>array(Category::CATEGORYID,ShopCategory::CATEGORYID)
                                ),
                ),
                "where"    => array(
                                ShopCategory::SHOPID => $this->getShopId()
                ),
                "distinct" => 1,

            );
            
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeShopCategory(){
            $object = array(
                "tablename" => ShopCategory::TABLENAME,
                "where"     => array(
                  "complex"  => array(
                          'AND' => array(
                              ShopCategoryDao::SHOPID     => $this->getShopId(),
                              ShopCategoryDao::CATEGORYID => $this->getCategoryId() 
                          ),  
                  )
                ),
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

    }
    
?>