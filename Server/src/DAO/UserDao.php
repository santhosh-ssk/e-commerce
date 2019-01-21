<?php
namespace App\DAO;
use App\Models\User;

class UserDao extends User{
	public function __construct(){
		parent::__construct();
	}

	public function login($username,$password){
	    if($this->query($username,$password)){
	        return array("response"=>1,"message"=>"success","url"=>$this->getRole().".html","userId"=>$this->getUserId());    
	    }
	    else{
	        return array("response"=>0,"message"=>"unauthorized user");   
	    }
	}
	public function signup($name,$email,$password){
		if($name=='' || $email=='' || $password=='')
			return array("response"=>0,"message"=>'invalid name or email or password');
		return $this->addUser($name,$email,$password);
	}		
}

?>