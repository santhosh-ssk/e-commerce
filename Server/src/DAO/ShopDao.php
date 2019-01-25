<?php
namespace App\DAO;
use App\Models\Shop;
use App\Utils\SqlConn;
use App\DAO\UserDao;
use App\Utils\Response;

class ShopDao extends Shop{
	public $db_connect;
	
	public function __construct(){
		$this->db_connect = new SqlConn();		
	}


	public function AddShop(){
		$result = $this->addAddress();
		if($result['response'] == 1){
			$fields   = array(Shop::NAME, Shop::OWNER_ID, Shop::DESCRIPTION, Shop::PHONE, Shop::ADDRID);
			$values   = array($this->getName(), $this->getOwnerId(), $this->getDescription(), $this->getPhone(), $this->getAddrId());
			$response = $this->db_connect->addTableData(Shop::TABLENAME, $fields, $values);
			if($response['response']==1){
				$this->setShopId($result['last_id']);
				return $response;
			}
		}
		else{
			return $result;
		}
	}

	public function addAddress(){
		$fields=array(
				Shop::BLOCK, Shop::STREET, Shop::AREA, Shop::PINCODE
				);
		$values=array(
			$this->getBlock(), $this->getStreet(), $this->getArea(), $this->getPincode()
		);
		$result = $this->db_connect->addTableData(Shop::_TABLENAME_, $fields, $values);
		
		if($result['response'] == 1){
			$this->setAddrId($result['last_id']);
			unset($result['last_id']);
		}

		return $result;
	}

	public function fetchshops(){
		$object = array("tablename" => Shop::TABLENAME,
							"fields"    => array("*"),
							"where"     => array( Shop::OWNER_ID => $this->getOwnerId() ),
							"join"      => array(array("tablename"  => Shop::_TABLENAME_,
												 "joinType"   => "JOIN",
												 "on" =>array(Shop::ADDRID,Shop::_ADDRID_)))
						);

		return $this->db_connect->query($object,0);
	}

	/**
	 * This function is used to shops and user details for admin
	 */
	public function fetchUserShops($admin){
		$adminUser = new UserDao();
		$adminUser->setUserId($admin->getUserId());
		$adminUser->setToken($admin->getToken());
		$response = new Response(); 
		if($adminUser->verifyUserToken()){

			$object = array("tablename" => Shop::TABLENAME,
							"fields"    => array(Shop::ADDRID, Shop::AREA, Shop::BLOCK, Shop::DESCRIPTION, 
												 Shop::IS_AUTH, Shop::NAME.' AS ShopName', Shop::PHONE, Shop::SHOPID, Shop::STATUS, 
												 Shop::STREET,Shop::PINCODE),
							"join"      => array( array("tablename"  => Shop::_TABLENAME_,
												        "joinType"   => "JOIN",
														 "on" =>array(Shop::ADDRID,Shop::_ADDRID_)
													   ),
												   array("tablename"  => UserDao::TABLENAME,
												         "joinType"   => "JOIN",
														 "on" =>array(Shop::OWNER_ID,UserDao::USER_ID)
													     )
												)
						);

			return $this->db_connect->query($object,0);

		}
		else{
			$response->setResponse(0);
			$response->setMessage('UnAuthorized Access');
			return $response->getResponse();
		}
	}
}
?>