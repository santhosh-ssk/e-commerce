<?php
    namespace App\Utils;
    class Logger{
        private $logger;

        public function __construct($logger){
          $this->logger = $logger;  
        }

        public function log($object){

            $type    = $object['type'];
            $message = $object['message'];
            if($type =='info'){
                $this->logger->info($message);
            }
            else if($type == "warning"){
                $this->logger->warn($message);
            }
        }
    }
?>