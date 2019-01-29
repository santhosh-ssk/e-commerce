<?php
	namespace App\Models;
	use App\Utils\SqlConn;
	use App\Models\Address;
	use App\Models\User;

	class Shop extends Address{
		const TABLENAME   = "SHOP";
		const SHOPID      = "SHOP.shop_id";
		const NAME        = "SHOP.name";
		const OWNER_ID    = "SHOP.owner_id";
		const DESCRIPTION = "SHOP.description";
		const PHONE       = "SHOP.phone";
		const IS_AUTH     = "SHOP.is_auth";
		const STATUS      = "SHOP.status";
		const ADDRID      = "SHOP.addr_id";
	
		private $shopId, $name, $ownerId, $description, $phone, $isAuth, $status;
		
		/**
		 * Get the value of shopId
		 */ 
		public function getShopId()
		{
				return $this->shopId;
		}

		/**
		 * Set the value of shopId
		 *
		 * @return  self
		 */ 
		public function setShopId($shopId)
		{
				$this->shopId = (int)$shopId;

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
		 * Get the value of ownerId
		 */ 
		public function getOwnerId()
		{
				return $this->ownerId;
		}

		/**
		 * Set the value of ownerId
		 *
		 * @return  self
		 */ 
		public function setOwnerId($ownerId)
		{
				$this->ownerId = (int)$ownerId;

				return $this;
		}

		/**
		 * Get the value of description
		 */ 
		public function getDescription()
		{
				return $this->description;
		}

		/**
		 * Set the value of description
		 *
		 * @return  self
		 */ 
		public function setDescription($description)
		{
				$this->description = $description;

				return $this;
		}

		/**
		 * Get the value of phone
		 */ 
		public function getPhone()
		{
				return $this->phone;
		}

		/**
		 * Set the value of phone
		 *
		 * @return  self
		 */ 
		public function setPhone($phone)
		{
				$this->phone = $phone;

				return $this;
		}

		/**
		 * Get the value of isAuth
		 */ 
		public function getIsAuth()
		{
				return $this->isAuth;
		}

		/**
		 * Set the value of isAuth
		 *
		 * @return  self
		 */ 
		public function setIsAuth($isAuth)
		{
				$this->isAuth = $isAuth;

				return $this;
		}

		/**
		 * Get the value of status
		 */ 
		public function getStatus()
		{
				return $this->status;
		}

		/**
		 * Set the value of status
		 *
		 * @return  self
		 */ 
		public function setStatus($status)
		{
				$this->status = $status;

				return $this;
		}
	}
?>