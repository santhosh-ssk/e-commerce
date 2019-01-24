<?php
	namespace App\Models;
	use App\Utils\SqlConn;

	class UserToken{
	
		private $token;
		private $tablename = "USER_TOKEN";
		const  TOKEN     = "token";
		const _TABLENAME_ = "USER_TOKEN";
	
		public function addToken($userId){
			$token  = $this->generateToken();
			$result = $this->db_connect->addTableData($this->__tablename__, array("user_id", "token"),array($userId, $token));
			return $result;
		}

		// public function getToken($userId){
			
		// 	$object = array("table_name" => $this->__tablename__, "fields" => array("*"), "where" => array("user_id" => $userId));
		// 	$result =$this->db_connect->query($object, 0);
		// 	if(count($result) == 1){
		// 			return $result[0]['token'];
		// 		}

		// 	else{
		// 			return null;
		// 	} 
		// }

		public function checkToken($userId, $token){
			
			$object = array("table_name" => $this->__tablename__, "fields" => array("*"),"where" => array("user_id" => $userId));
			$result = $this->db_connect->query($object, 0);
			if(count($result) == 1 && $result[0]['token'] == $token){
					return true;
				}
			
			else{
				return false;
			}
		}
		
		

		/**
		 * Get the value of token
		 */ 
		public function getToken()
		{
				return $this->token;
		}

		/**
		 * Set the value of token
		 *
		 * @return  self
		 */ 
		public function setToken($token)
		{
				$this->token = $token;

				return $this;
		}
	}
?>