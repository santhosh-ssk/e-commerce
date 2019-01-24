<?php
namespace App\Delegate;
use App\DAO\UserDao;
use App\Utils\Response;

class LoginDelegate{
    private $user;
    private $response;

    public function __construct(){
        $this->user     = new UserDao();
        $this->response = new Response();
    }

    public function validateUser($username,$password){
        $result=$this->user->fetchUser($username,$password);
        if($result){
            $this->response->setResponse(1);
            $this->response->setMessage("Success");
            $this->response->setData(array("url" => $this->user->getRole() . '.html'));
        }
        else{
            $this->response->setResponse(0);
            $this->response->setMessage("Unauthorized User");
        }
        return $this->response->getResponse();
    }
    
}
?>