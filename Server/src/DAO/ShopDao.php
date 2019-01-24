<?php
namespace App\DAO;
use App\Models\Shop;
class ShopDao extends Shop{
	public function __construct(){
		parent::__construct();
	}
	public function registerShop($ownerId,$name,$phone,$description,$block,$street,$area,$pincode){
		$result=$this->addShop($ownerId,$name,$phone,$description,$block,$street,$area,$pincode);
		return $result;
	}
	public function userShop($userId){
		$result=$this->userShops($userId);
		return $result;
	}
	
}
?>