<?php 
    namespace App\Controller;
    use App\Delgate\SignupDelegate;
    use App\Models\User;

    class SignupController{
        private $request;
        private $signup;
        private $body;
        private $headers;
        private $user;
        
        public function __construct($request){
            $this->request = $request;
            $this->body    = $request->getParsedBody();
            $this->headers = $request->getHeaders();
            $this->signup  = new SignupDelegate();
            $this->user    = new User;
        }

        public function registerUser(){
            $this->user->setName($this->body['name']);
            $this->user->setPassword($this->body['password']);
            $this->user->setEmail($this->body['email']);
            return $this->signup->registerUser($this->user);  
              
        }
    }
?>