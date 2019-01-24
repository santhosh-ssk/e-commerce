<?php 
	
	namespace App\Models;
	use App\Utils\SqlConn;
	use App\Models\UserToken;

	class User extends UserToken{
	
		private $__tablename__="USER";

		private $name, $email, $password, $role, $userId;

		const TABLENAME = "USER";
		const NAME      = "name";
		const USER_ID   = "user_id";
		const PASSWORD  = "password";
		const EMAIL     = "email";
		const ROLE      = "role";
	
		
	
		public function addUser($name,$email,$password){
			$this->name  = $name;
			$this->email = $email;
			$this->tmp   = $password;
			$this->password=password_hash($password, PASSWORD_BCRYPT);
			$resp = $this->db_connect->addTableData($this->__tablename__, ['name', 'email', 'password'], [$this->name, $this->email, $this->password]);
			//echo var_dump($resp);
			if($resp['response'] == 1){
				
				$result = $this->addToken($resp['last_id']);
				unset($resp['last_id']);
				
				if($result['response'] == 1)
					return $resp;
				else{
					$resp['response'] = 0;
					$resp['message']  = $result['message'];
					return $resp;
				}
			}
			else {
					return $resp;
			}
		}

		/**
		 * Get the value of __tablename__
		 */ 
		public function getTablename()
		{
				return $this->__tablename__;
		}


		/**
		 * Get the value of userId
		 */ 
		public function getUserId()
		{
				return $this->userId;
		}

		/**
		 * Set the value of userId
		 *
		 * @return  self
		 */ 
		public function setUserId($userId)
		{
				$this->userId = $userId;

				return $this;
		}

		/**
		 * Get the value of name
		 */ 
		public function getName()
		{
				return $this->name;
		}

		/**
		 * Set the value of name
		 *
		 * @return  self
		 */ 
		public function setName($name)
		{
				$this->name = $name;

				return $this;
		}

		/**
		 * Get the value of password
		 */ 
		public function getPassword()
		{
				return $this->password;
		}

		/**
		 * Set the value of password
		 *
		 * @return  self
		 */ 
		public function setPassword($password)
		{
				$this->password = $password;

				return $this;
		}

		/**
		 * Get the value of email
		 */ 
		public function getEmail()
		{
				return $this->email;
		}

		/**
		 * Set the value of email
		 *
		 * @return  self
		 */ 
		public function setEmail($email)
		{
				$this->email = $email;

				return $this;
		}

		/**
		 * Get the value of role
		 */ 
		public function getRole()
		{
				return $this->role;
		}

		/**
		 * Set the value of role
		 *
		 * @return  self
		 */ 
		public function setRole($role)
		{
				$this->role = $role;

				return $this;
		}
	}
?>