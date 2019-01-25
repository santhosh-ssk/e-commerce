<?php
	namespace App\Models;
	use App\Utils\SqlConn;

	class UserToken{
	
		private $token;
		private $tablename = "USER_TOKEN";

		const _TABLENAME_  = "USER_TOKEN";
		const  TOKEN       = "USER_TOKEN.token";
		const _USERID_     = "USER_TOKEN.user_id";
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