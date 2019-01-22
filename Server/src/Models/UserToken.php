<?php
	namespace App\Models;
	use App\Utils\SqlConn;
	class UserToken{
		private $db_connect;
		private $user_id,$token;
		private $__tablename__="USER_TOKEN";
		public function __construct(){
			$this->db_connect= new SqlConn();
		
		}
		public function addToken($userId){
			$token=$this->generateToken();
			$result=$this->db_connect->addTableData($this->__tablename__,array("user_id","token"),array($userId,$token));
			return $result;
		}
		public function getToken($userId){
			$object=array("table_name"=>$this->__tablename__,"fields"=>array("*"),"where"=>array("user_id"=>$userId));
			$result=$this->db_connect->query($object,0);
			if(count($result)==1)
				return $result[0]['token'];
			else
				return null; 
		}
		public function checkToken($userId,$token){
			$object=array("table_name"=>$this->__tablename__,"fields"=>array("*"),"where"=>array("user_id"=>$userId));
			$result=$this->db_connect->query($object,0);
			if(count($result)==1 && $result[0]['token']==$token)
				return true;
			else{
				return false;
			}
		}
		public function generateToken(){
			$token = openssl_random_pseudo_bytes(16);
			//Convert the binary data into hexadecimal representation.
			$token = bin2hex($token);
			return $token;
		}
	}
?>