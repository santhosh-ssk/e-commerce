<?php
	namespace App\Models;
	use App\Utils\SqlConn;
	use App\Models\Address;
	use App\Models\User;
	class Shop extends Address{
		private $__tablename__="SHOP";
		private $shopId,$name,$ownerId,$description,$phone,$addrId,$isAuth,$db_connect;
		public function __construct(){
			parent::__construct();
			$this->db_connect= new SqlConn();
		}
		public function addShop($ownerId,$name,$phone,$description,$block,$street,$area,$pincode){
			$resp=$this->addAddress($block,$street,$area,$pincode);
		
			if($resp['response']==1){
				$result=$this->db_connect->addTableData($this->__tablename__,['owner_id','name','description','phone','addr_id'],[$ownerId,$name,$description,$phone,$resp['last_id']]);
				if($result['response']==1){
					$this->shopId=$result['last_id'];
					$this->name=$name;
					$this->phone=$phone;
					$this->description=$description;
					$this->ownerId=$ownerId;
					//unset($result['last_id']);
					return $result;
				}
				else 
					return $result;
			}
			else return $resp;
		}
		public function userShops($userId){
			$object=array("table_name"=>$this->__tablename__,
						"fields"=>"*",
						"where"=>array("owner_id"=>$userId)
						);
			$result=$this->db_connect->query($object,0);
			return $result;
		}
		public function viewShops($username,$password){
			if($user->query($username,$password))
				return array('response'=>1,'message'=>'valid user');
			else
				return array('response'=>0,'message'=>'invalid user');
		}

	}
?>