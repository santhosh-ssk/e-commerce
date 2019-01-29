<?php
	namespace App\Models;
	use App\Utils\SqlConn;

	class Address{
		const _TABLENAME_ = "ADDRESS";
		const _ADDRID_    = "ADDRESS.addr_id";
		const   BLOCK     = "ADDRESS.block_name";
		const   STREET    = "ADDRESS.street_name";
		const   AREA      = "ADDRESS.area";
		const   PINCODE   = "ADDRESS.pincode";

		private $addrId, $block, $street, $area, $pincode, $db_connect;

		/**
		 * Get the value of addrId
		 */ 
		public function getAddrId()
		{
				return $this->addrId;
		}

		/**
		 * Set the value of addrId
		 *
		 * @return  self
		 */ 
		public function setAddrId($addrId)
		{
				$this->addrId = (int)$addrId;

				return $this;
		}
		
		/**
		 * Get the value of block
		 */ 
		public function getBlock()
		{
				return $this->block;
		}

		/**
		 * Set the value of block
		 *
		 * @return  self
		 */ 
		public function setBlock($block)
		{
				$this->block = $block;

				return $this;
		}

		/**
		 * Get the value of street
		 */ 
		public function getStreet()
		{
				return $this->street;
		}

		/**
		 * Set the value of street
		 *
		 * @return  self
		 */ 
		public function setStreet($street)
		{
				$this->street = $street;

				return $this;
		}

		/**
		 * Get the value of area
		 */ 
		public function getArea()
		{
				return $this->area;
		}

		/**
		 * Set the value of area
		 *
		 * @return  self
		 */ 
		public function setArea($area)
		{
				$this->area = $area;

				return $this;
		}

		/**
		 * Get the value of pincode
		 */ 
		public function getPincode()
		{
				return $this->pincode;
		}

		/**
		 * Set the value of pincode
		 *
		 * @return  self
		 */ 
		public function setPincode($pincode)
		{
				$this->pincode = $pincode;

				return $this;
		}

		
	}
?>