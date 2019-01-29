<?php 
	
	namespace App\Models;
	use App\Utils\SqlConn;
	use App\Models\UserToken;

	class User extends UserToken{
	
		private $__tablename__="USER";

		private $name, $email, $password, $role, $userId;

		const TABLENAME = "USER";
		const NAME      = "USER.name";
		const USER_ID   = "USER.user_id";
		const PASSWORD  = "USER.password";
		const EMAIL     = "USER.email";
		const ROLE      = "USER.role";
	

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
				$this->userId = (int)$userId;

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