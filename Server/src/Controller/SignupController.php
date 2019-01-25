<?php 
    namespace App\Controller;
    use App\Delegate\SignupDelegate;
    use App\Models\User;

    class SignupController{
        private $request;
        private $signup;
        private $body;
        private $headers;
        private $logger;
        private $user;
        
        public function __construct($request,$logger){
            $this->logger=$logger;
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
            $response =  $this->signup->registerUser($this->user);  
            $logMessage='';
            if($response['response']==1){
                $logMessage='User Registration Success: username: '.$this->user->getEmail();
                $this->logger->info($logMessage);
            }
            else{
                $logMessage='User Registration Failed:  username: '.$this->user->getEmail().' Message: '.$response['message'];
                $this->logger->warn($logMessage);
            }
            
            return $response;
              
        }
    }
?>