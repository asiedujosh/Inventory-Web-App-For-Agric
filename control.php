<?php
//initiate variables
$qtyNPK = $dateNPK = $qtyUrea = $dateUrea = $qtyMaize = $dateMaize = "";

//Connect to the database
$servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$db->connect_error);
}

//Get values
if(isset($_POST['save'])){
$qtyNPK = mysqli_real_escape_string($conn,$_POST['qtyN']);
$dateNPK = mysqli_real_escape_string($conn,$_POST['dateK']);
$qtyUrea = mysqli_real_escape_string($conn,$_POST['qtyU']);
$dateUrea = mysqli_real_escape_string($conn,$_POST['dateU']);
$qtyMaize = mysqli_real_escape_string($conn,$_POST['qtyM']);
$dateMaize = mysqli_real_escape_string($conn,$_POST['dateM']);
$amtNPK = $_POST['qtyN'] * 58;
$amtUrea = $_POST['qtyU'] * 48;
$amtMaize = $_POST['qtyM'] * 4;



//Validate Information
$sql = "UPDATE stock_management SET date_received = '$dateNPK', Qty_received = '$qtyNPK', input_num ='1' WHERE id = 1";
$db = mysqli_query($conn,$sql);

$sql = "UPDATE stock_management SET date_received = '$dateUrea', Qty_received = '$qtyUrea', input_num ='2' WHERE id = 2";
	$db = mysqli_query($conn,$sql);

$sql = "UPDATE stock_management SET date_received = '$dateMaize', Qty_received = '$qtyMaize', input_num ='3' WHERE id = 3";
	$db = mysqli_query($conn,$sql);



$sql = "UPDATE finance_management SET date_received = '$dateNPK', amt_stock = '$amtNPK', input_num ='1' WHERE id = 1";
	$db = mysqli_query($conn,$sql);

$sql = "UPDATE finance_management SET date_received = '$dateUrea', amt_stock = '$amtUrea', input_num ='2' WHERE id = 2";
	$db = mysqli_query($conn,$sql);

$sql = "UPDATE finance_management SET date_received = '$dateMaize', amt_stock = '$amtMaize', input_num ='3' WHERE id = 3";
	$db = mysqli_query($conn,$sql);



header("location: management.php");


}


?>


