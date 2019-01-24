<?php
namespace App\Controller;
use App\Delegate\LoginDelegate;

class LoginController{
    private $request;
    private $login;
    private $body;
    private $headers;

    public function __construct($request){
        $this->request = $request;
        $this->body    = $request->getParsedBody();
        $this->headers = $request->getHeaders();
        $this->login   = new LoginDelegate();
    }

    public function login(){
        $username=$this->body['username'];
        $password=$this->body['password'];
        return $this->login->validateUser($username,$password);
    }

}
?>