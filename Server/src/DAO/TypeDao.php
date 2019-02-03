<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\Type;

    class TypeDao extends Type 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addType()
        {
            $object = array(
                "tablename" => Type::TABLENAME,
                "fields"    => array(Type::NAME
                                ),
                "values"    => array( $this->getName()
                                ),
                "duplicateFlag" => 1,
                "getlastId" => Type::TYPEID

            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getTypes()
        {
            $object = array(
                "tablename" => Type::TABLENAME,
                "fields"    => array(Type::NAME
                                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeType(){
            $object = array(
                "tablename" => Type::TABLENAME,
                "where"     => array(
                  "simple"  => array(
                    Type::NAME => $this->getName()
                  )
                ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

 
    }
    
?>