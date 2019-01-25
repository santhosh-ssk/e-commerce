<?php
namespace App\Controller;
use App\Delegate\LoginDelegate;

class LoginController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $logger;

    public function __construct($request,$logger){
        $this->logger=$logger;
        $this->request = $request;
        $this->body    = $request->getParsedBody();
        $this->headers = $request->getHeaders();
        $this->login   = new LoginDelegate();
        //echo var_dump($this);

    }

    public function login(){
        $username = $this->body['username'];
        $password = $this->body['password'];
        $result   = $this->login->validateUser($username,$password);
        
        $logMessage = '';
        if($result['response']==1){
            $logMessage='Success User Username: '.$username.' as logged';
        }
        else{
            $logMessage='Unauthorized User Username: '.$username.' as tried to access';
        }
        $this->logger->info($logMessage);
        
        return $result;
    }

}
?>