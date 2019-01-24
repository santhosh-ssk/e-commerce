<?php
    namespace App\Delgate;
    use App\DAO\UserDao;
    use App\Utils\Response;

    class SignupDelegate{
        private $user;
        private $response;

        public function __construct(){
            $this->user     = new UserDao();
            $this->response = new Response();
        }

        public function registerUser($user){
            $this->user->setName($user->getName());
            $this->user->setpassword($this->hashPassword($user->getPassword()));
            $this->user->setEmail($user->getEmail());
            
        }
        public function hashPassword($password)
        {
            return \password_hash($password,PASSWORD_BCRYPT);

        }
        
        public function generateToken(){
			$token = openssl_random_pseudo_bytes(16);
			//Convert the binary data into hexadecimal representation.
			$token = bin2hex($token);
			return $token;
		}

    }
?>