<?php

namespace App\DAO;
use App\Utils\SqlConn;
use App\Models\Variant;

class VariantDao extends Variant
{
    public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }


        public function addVariants($variants)
        {
            for($i=0;$i<count($variants);$i++){  
                $variants[$i] = array($variants[$i]);
            }

            $object = array(
                "tablename" => Variant::TABLENAME,
                "fields"    => array(Variant::NAME
                                ),
                "values"    =>  $variants,
                "group"     => 1,
                "duplicateFlag" => 1,
                "getlastId" => Variant::VARIANTID
            );
            $response = $this->db_connect->addTableData($object);
            return $response;
        }


        public function getVariantsByNames($variants)
        {

            $object = array(
                "tablename" => Variant::TABLENAME,
                "fields"    => array("*"),
                "where"     => array(
                                    "IN" => array(
                                        "key" => Variant::NAME,
                                        "values" => $variants
                                    )
                                )
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        }
        public function getVariantIdByName($variantname)
        {

            $object = array(
                "tablename" => Variant::TABLENAME,
                "fields"    => array(Variant::VARIANTID),
                "where"     => array(
                                Variant::NAME => $variantname
                                )
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        }

        public function removeVariant(){
            $object = array(
                "tablename" => Variant::TABLENAME,
                "where"     => array(
                  "simple"  => array(
                      Variant::NAME => $this->getName()
                  )
                ),
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

}

?>