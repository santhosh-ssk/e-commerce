<?php
namespace App\DAO;
use App\Models\User;
use App\Utils\SqlConn;

class UserDao extends User{
	private $db_connect;


	public function __construct(){
		$this->db_connect = new SqlConn();
	}


	public function verifyUser(){
		$object = array("tablename" => $this->getTablename(),
						   "fields" => array( User::PASSWORD),
					      	"where" => array( User::EMAIL => $this->getEmail() )
					);

		$result=$this->db_connect->query($object,0);
		if(count($result)==1 && password_verify($this->getPassword(), $result[0]['password'])){
			return true;
		}
		else{
			return false;
		}

	}

	public function fetchUser($username,$password){
		$this->setEmail($username);
		$this->setPassword($password);
		if($this->verifyUser()){
			$object = array("tablename" => $this->getTablename(),
							"fields"    => array("*"),
			   				"where"     => array( User::EMAIL => $this->getEmail() )
				);
			$result=$this->db_connect->query($object,0);
			
			if(count($result) == 1){
				$result=$result[0];
				$this->setUserId($result['user_id']);
				$this->setName($result['name']);
				$this->setPassword($result['password']);
				$this->setEmail($result['email']);
				$this->setRole($result['role']);
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

	public function addUser($user){
		$fields=array(User::NAME,User::EMAIL,User::PASSWORD);
		$values=array($user->getName(),$user->getEmail(),$user->getPassword());
		$resp=$this->db_connect->addTableData(User::TABLENAME,$fields,$values);
		if($resp['response'] == 1){
			
			$this->setUserId($resp['last_id']);
			$result = $this->addUserToken();
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

	public function addUserToken($userId){

	}

	
	
}

?>