<?php
namespace App\Controller;
use App\Delegate\TypeDelegate;
use App\Models\User;
use App\Models\Type;

class TypeController{
    private $request;
    private $login;
    private $body;
    private $headers;
    private $arguments;
    private $logger;
    private $type;

    public function __construct($request, $arguments, $logger){
        $this->logger     = $logger;
        $this->request    = $request;
        $this->body       = $request->getParsedBody();
        $this->headers    = $request->getHeaders();
        $this->arguments  = $arguments;
        $this->type       = new TypeDelegate();
    
    }

    public function addType(){
        
        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $newType = new Type();
        $newType->setName($this->body['name']);

        $response = $this->type->addType($user,$newType);

        if($response['response']==0){
            $logMessage='Error in adding a  Type: '.$newType->getName().' Error: ' . $response['message'] . '.';
            
            $this->logger->info($logMessage);
        }
        
        return $response;
    }

    public function getTypes(){

        $userID = $this->arguments['userId'];
        $token  = $this->headers['HTTP_AUTHORIZATION'][0];
        $user   = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->type->getTypes($user);
        return $response;
    }

    public function removeType(){

        $userID    = $this->arguments['userId'];
        $token     = $this->headers['HTTP_AUTHORIZATION'][0];
        $typeName  = $this->arguments['name'];
        $user      = new User();
        $user->setUserId($userID);
        $user->setToken($token);

        $response = $this->type->removetype($user,$typeName);
        return $response;
    }

}
?>