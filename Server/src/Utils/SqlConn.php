<?php
	namespace App\Utils;
	class SqlConn{
	private $servername = "localhost";
	private $username   = "user";
	private $password   = "user";
	private $database   = "ecommerce";
	protected $conn=null;

		public function __construct(){
			// Create connection
			$this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->database);

			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			//echo "Connected to MYSQL successfully.";

		}
		
		public function addTableData($table_name, $attributes, $values){
			//echo var_dump($values);
			for($i=0; $i<count($values); $i++){
				if(is_string($values[$i])){
					$values[$i]='\'' . mysqli_real_escape_string($this->conn,$values[$i]) . '\'';
				}
			}

			$query='INSERT INTO ' . $table_name . '(' . join(',',$attributes) . ') VALUES(' . join(',',$values) . ');';
				$resp = null;
				//echo $query;
				if ($this->conn->query($query) === TRUE) {
					$last_id = $this->conn->insert_id;
				    $resp    = array("response" => 1, "message" => "success", "last_id" => $last_id);
				} else {
					$resp = array("response" => 0, "message" => 'error in ' . $this->conn->error);
				}
				return $resp;
		}

		public function query($object, $flag){
			$__tablename__ = $object['tablename'];
			$fields = $object['fields'];
			$query  = 'SELECT ' . join(',',$fields) . ' FROM ' . $__tablename__ . ' ';
			
			if(array_key_exists("join", $object)){
				$joinquery='';
				//echo var_dump($object['join']);
				foreach ($object['join'] as $join) {
					$joinquery = $joinquery . ' ' . $join['joinType'] . ' ' . $join['tablename'] . ' ON ' . $join['on'][0] . ' = ' . $join['on'][1] . ' ';	
					}
				$query = $query . ' ' . $joinquery;
				
			}			
			
			if(array_key_exists("where", $object)){
				$where = $object['where'];
				if($flag == 0)
				foreach ($where as $key => $value) {
					if(is_string($value))
						$value = '\'' . $value . '\'';
					$query = $query . ' WHERE ' . $key . '=' . $value;
				}
			}

			$query = $query . ' ;';
			//echo $query;
			$resp = array();
			$response=array("response" =>1 , "message" => "sucess", "data" => array());

			try{
				$result = $this->conn->query($query);
				if($result === FALSE){
					throw new \Exception($query);
				}
			}
			catch(Exception $e) {
				
				$response['response'] = 0;
				$response['message']  = $e;
				return $response;
			}
			while($row = $result->fetch_assoc()){
				array_push($resp, $row);
			}
			$response['data'] = $resp;
			return $response;
		}

		public function deleteRecord($object){
			$query    = 'DELETE FROM ' . $object['tablename'] . ' ';
			$response = array("response"=>1,"message"=>"success");

			//add where condition to query
			$where = $object['where'];
			
			//add where to query
			$wherequery =' where ';
			
			if(\array_key_exists("simple",$where)){
				$simple = $where['simple'];
				foreach ($simple as $key => $value) {
					$wherequery = $wherequery . $key . ' = ';
					if(is_string($value)){
						$value = '\'' . mysqli_real_escape_string($this->conn,$value) . '\'';
					}
					$wherequery .= $value . ' ';
				}
			}

			if(\array_key_exists("complex",$where)){
				$complex = $where['complex'];
				$andquery = "";
				if(\array_key_exists("AND",$complex)){
					$and    = $complex['AND'];
					$andobj = [];
					foreach ($and as $key => $value) {
						# code...
						if(is_string($value)){
							$value = '\'' . mysqli_real_escape_string($this->conn,$value) . '\'';
						}
						array_push($andobj," " . $key . " = ". $value);	
					}
					$andobj = join(" and ",$andobj);
					$wherequery =  $wherequery . $andobj;
				}
			}

			
			
			//add semicolon to query
			$query = $query .' '. $wherequery. ' ;';

			//echo $query;
			
			try{
				if($this->conn->query($query) === FALSE){
					throw new \Exception($query);
				}
			}
			catch(\Exception $e){
				$response['response'] = 0;
				$response['message']  = $e->getMessage();	
			}
			return $response;
			
		}

		public function __destruct(){
			$this->conn->close();
		}
	}
?>