<?php
/*creating a class for connection*/
class dbh{
	private $servername;
	private $username;
	private $password;
	private $dbname;

	protected function connect(){
		$this-> servername = "localhost";
		$this-> username = "root";
		$this-> password = "Katalambnao90";
		$this-> dbname = "farmweb";

		$conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
		return $conn;
	}

}