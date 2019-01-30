<?php
//Connect to the database
$servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$conn->connect_error);
}

?>