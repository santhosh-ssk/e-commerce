<?php
    namespace App\DAO;
    use App\Utils\SqlConn;
    use App\Models\Tag;

    class TagDao extends Tag 
    {
        public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addTag()
        {
            $object = array(
                "tablename" => Tag::TABLENAME,
                "fields"    => array(Tag::NAME
                                ),
                "values"    => array( $this->getName()
                                ),
                "duplicateFlag" => 1,
                "getlastId" => Tag::TAGID

            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getTags()
        {
            $object = array(
                "tablename" => Tag::TABLENAME,
                "fields"    => array(Tag::NAME
                                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function removeTag(){
            $object = array(
                "tablename" => Tag::TABLENAME,
                "where"     => array(
                  "simple"  => array(
                    Tag::NAME => $this->getName()
                  )
                ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

 
    }
    
?>