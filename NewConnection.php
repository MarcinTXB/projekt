<?php
class NewConnection{
    const DB_LOC="./database/";
	private $host = 'localhost';
	private $db   = 'Wypozyczalnia_Samochodow';
	private $user = 'root';
	private $pass = 'Root';
	private $con=NULL;
	function __construct(){
		try{
			$this->con = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));  
			$this->con->exec("SET CHAR SET utf8");
        }
		catch (Exception $e) {
			$this->errors['connect']['message']     = $e->getMessage();
			$this->errors['connect']['error_code']  = $e->getCode();
			print_r($this->errors);                 
		}
	}
        
	public function getCon(){
		return $this->con;
	}        
}?>
