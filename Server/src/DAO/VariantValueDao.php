<?php

namespace App\DAO;
use App\Utils\SqlConn;
use App\Models\VariantValue;

class VariantValueDao extends VariantValue
{
    public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }


        public function addVariantValues($variantValues)
        {
            for($i=0;$i<count($variants);$i++){  
                $variants[$i] = array($variants[$i]);
            }

            $object = array(
                "tablename" => VariantValue::TABLENAME,
                "fields"    => array(VariantValue::VARIANTID,VariantValue::VALUE
                                ),
                "values"    =>  $variantValues,
                "group"     => 1,
                "duplicateFlag" => 1,
                "getlastId" => VariantValue::VARIANTID
            );
            $response = $this->db_connect->addTableData($object);
            return $response;
        }


        public function getVariantValues($variantValues)
        {

            $object = array(
                "tablename" => VariantValue::TABLENAME,
                "fields"    => array("*"),
                "where"     => array(
                                    "IN" => array(
                                        "key" => VariantValue::VALUE,
                                        "values" => $variantValues
                                    )
                                )
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        }

        public function getVariantValuesIdByValues($variantValues)
        {

            $object = array(
                "tablename" => VariantValue::TABLENAME,
                "fields"    => array(VariantValue::VALUEID),
                "where"     => array(
                                    "IN" => array(
                                        "key" => VariantValue::VALUE,
                                        "values" => $variantValues
                                    )
                                )
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        }

        public function removeVariant(){
            $object = array(
                "tablename" => VariantValue::TABLENAME,
                "where"     => array(
                  "simple"  => array(
                      VariantValue::NAME => $this->getName()
                  )
                ),
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

}

?>