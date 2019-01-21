<?php
	namespace App\Models;
	use App\Utils\SqlConn;
	class Address{
		private $__tablename__="ADDRESS";
		private $addrId,$block,$street,$area,$pincode,$db_connect;
		public function __construct(){
			$this->db_connect= new SqlConn();
		}
		public function addAddress($block,$street,$area,$pincode){
			$resp=$this->db_connect->addTableData($this->__tablename__,['block_name','street_name','area','pincode'],[$block,$street,$area,$pincode]);
			if($resp['response']==1){
				$this->addrId=$resp['last_id'];
				$this->block=$block;
				$this->street=$street;
				$this->area=$area;
				$this->pincode=$pincode;
				return $resp;
			}
			else{
				return $resp;
			}

		}
	}
?>