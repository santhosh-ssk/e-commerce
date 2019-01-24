<?php
    namespace App\Utils;
    class Response{
        private $response,$message,$data;

        

        /**
         * Set the value of response
         *
         * @return  self
         */ 
        public function setResponse($response)
        {
                $this->response = $response;

                return $this;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        /**
         * Set the value of data
         *
         * @return  self
         */ 
        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }

        /**
         * Get the value of response
         */ 
        public function getResponse()
        {
                return array("response" => $this->response,
                             "message"  => $this->message,
                             "data"     => $this->data
                            );
        }
    }
?>