<?php
namespace App\DAO;
use App\Models\User;
use App\Models\Shop;
class AdminDao extends User{
	public function __construct(){
		parent::__construct();
	}
	public function registerShop($ownerId,$name,$phone,$description,$block,$street,$area,$pincode){
		$result=$this->addShop($ownerId,$name,$phone,$description,$block,$street,$area,$pincode);
		return $result;
	}
	public function viewShops($userId,$token){
		$shop=new Shop();
		$result=$shop->viewShops($userId,$token);
		return $result;
	}
	
}
?>