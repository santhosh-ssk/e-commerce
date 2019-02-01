<?php
namespace App\DAO;
use App\Models\User;
use App\Utils\SqlConn;

class UserDao extends User{
	private $db_connect;


	public function __construct(){
		$this->db_connect = new SqlConn();
	}

	/**
	 * verifies user using username and password
	 */
	public function verifyUser(){
		$object = array("tablename" => $this->getTablename(),
						   "fields" => array( User::PASSWORD),
					      	"where" => array( User::EMAIL => $this->getEmail() )
					);

		$result=$this->db_connect->query($object,0);
		if($result['data'] && password_verify($this->getPassword(), $result['data'][0]['password'])){
			return true;
		}
		else{
			return false;
		}

	}

	public function verifyUserToken(){
		$object = array("tablename" => User::_TABLENAME_,
						"fields"	=> array(User::TOKEN),	
						"where"     => array( User::_USERID_ => $this->getUserId())
					   );
		$result = $this->db_connect->query($object,0);
		$token  = $result['data'][0]['token']; 
		
		if($result['data'] && $token == $this->getToken()){
			return true;
		}
		else{
			return false;
		}
	} 

	/**
	 * retrives user data
	 */
	public function fetchUser($username,$password){
		$this->setEmail($username);
		$this->setPassword($password);
		if($this->verifyUser()){
			$object = array("tablename" => $this->getTablename(),
							"fields"    => array("*"),
							"where"     => array( User::EMAIL => $this->getEmail() ),
							"join"      => array(array("tablename"  => User::_TABLENAME_,
												 "joinType"   => "JOIN",
												 "on" =>array(User::USER_ID,User::_USERID_)),   
				));
			$result=$this->db_connect->query($object,0);
			//echo var_dump($result);
			if($result['response'] == 1){
				$result=$result['data'][0];
				$this->setUserId($result['user_id']);
				$this->setName($result['name']);
				$this->setPassword($result['password']);
				$this->setEmail($result['email']);
				$this->setRole($result['role']);
				$this->setToken($result['token']);
				return true;
			}
			else{
				return false;
			}
		}

		else{
			return false;
		}

	}

	/**
	 * THis function is used to register user
	 */
	public function addUser(){
		$fields=array(User::NAME,User::EMAIL,User::PASSWORD);
		$values=array($this->getName(),$this->getEmail(),$this->getPassword());
		$resp=$this->db_connect->addTableData(User::TABLENAME,$fields,$values);
		if($resp['response'] == 1){
			
			$this->setUserId($resp['last_id']);
			$result = $this->addUserToken();
			if($result['response'] == 1){
				return $result;
			}
				
			else{
				$result['response'] = 0;
				$result['message']  = $resp['message'].' '.$result['message'];
				return $result;
			}
		}
		else {
				return $resp;
		}
		
	}

	/**
	 * This function is used to add user token
	 */
	public function addUserToken(){
		$fields=array(User::_USERID_,User::TOKEN);
		$values=array($this->getUserId(),$this->getToken());
		//echo 'USER '.$this->getToken();
		return $this->db_connect->addTableData(User::_TABLENAME_,$fields,$values);
	}

}

?>