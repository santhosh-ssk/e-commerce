<?php

namespace App\DAO;
use App\Utils\SqlConn;
use App\Models\Color;

class ColorDao extends Color
{
    public $db_connect;
	
        public function __construct(){
            $this->db_connect = new SqlConn();		
        }

        public function addColor()
        {
            $object = array(
                "tablename" => Color::TABLENAME,
                "fields"    => array(Color::COLOR
                                ),
                "values"    => array( $this->getColor()
                                ),
                "duplicateFlag" => 1,
                "getlastId" => Color::COLORID

            );
           
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function addColors($colors)
        {
            $colors = explode(",",$colors);
            for($i=0;$i<count($colors);$i++){  
                $colors[$i] = array($colors[$i]);
            }

            $object = array(
                "tablename" => Color::TABLENAME,
                "fields"    => array(Color::COLOR
                                ),
                "values"    =>  $colors,
                "group"     => 1,
                "duplicateFlag" => 1,
                "getlastId" => Color::COLORID
            );
            $response = $this->db_connect->addTableData($object);
            return $response;
        }

        public function getColors()
        {
            $object = array(
                "tablename" => Color::TABLENAME,
                "fields"    => array(Color::COLOR
                                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function getColorByName()
        {
            $object = array(
                "tablename" => Color::TABLENAME,
                "fields"    => array("*"),
                "where"     => array(
                                    Color::COLOR => $this->getColor()
                                )
            );
            $response = $this->db_connect->query($object,0);
            return $response;
        }

        public function getColorByNames($colors)
        {
            $colors = explode(",",$colors);

            $object = array(
                "tablename" => Color::TABLENAME,
                "fields"    => array("*"),
                "where"     => array(
                                    "IN" => array(
                                        "key" => Color::COLOR,
                                        "values" => $colors
                                    )
                                )
            );
            $response = $this->db_connect->query($object,1);
            return $response;
        }

        public function removeColor(){
            $object = array(
                "tablename" => Color::TABLENAME,
                "where"     => array(
                  "simple"  => array(
                      Color::COLOR => $this->getColor()
                  )
                ),
                
            );
            $response = $this->db_connect->deleteRecord($object);
            return $response;
        }

}

?>