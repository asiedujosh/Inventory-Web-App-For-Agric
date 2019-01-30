
<?php
session_start();
//defining variables
$firstName = $lastName = $year = $district = $locality = $contactNum = $emailAdd = $id_number = 
$target = $image = $file_to_saved = $farmLocation = $farmSize = $farmCrop = $officer_name = $officer_tel = 
$farmDes = $gender =  $temp = "";

//calling connection
$servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$conn->connect_error);
}

//giving values to variables

if(isset($_POST['save'])){
	$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$year = mysqli_real_escape_string($conn,$_POST['year']);
	$district = mysqli_real_escape_string($conn,$_POST['district']);
	$locality = mysqli_real_escape_string($conn,$_POST['locality']);
	$contactNum = mysqli_real_escape_string($conn,$_POST['contactNum']);
	$emailAdd = mysqli_real_escape_string($conn,$_POST['emailAdd']);
	$id_number = mysqli_real_escape_string($conn,$_POST['id_number']);
	//Image Code
	//$target = "document/".basename($_FILES['foto']['name']);
	$target = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
/*if(!$file_get){
	echo "error not getting foto";exit();
	
}
else{*/
$file_to_saved = "document/".$target;
//Documents folder should exist in your host in there you are going to save the file just uploaded

move_uploaded_file($temp, $file_to_saved);



	//Farm Information
	$farmLocation = mysqli_real_escape_string($conn,$_POST['farmLocation']);
	$farmSize = mysqli_real_escape_string($conn,$_POST['farmSize']);
	$farmCrop = mysqli_real_escape_string($conn,$_POST['farmCrop']);
	$officer_name = mysqli_real_escape_string($conn,$_POST['aeaName']);
	$officer_tel = mysqli_real_escape_string($conn,$_POST['aeaNo']);
	$farmDes = mysqli_real_escape_string($conn,$_POST['comment']);

	//Insert The Data into Database
   $sql = "SELECT id_number FROM farmerinfo WHERE id_number = $id_number";
   $me = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($me);

   if($row['id_number']==$id_number){
   	echo '<script language="javascript" type="text/javascript">alert("Farmer with the ID Number already exist")</script>';
   	echo '<script> window.location = "signup.php"</script>';
   	exit();
   } else {

	$sql = "INSERT INTO farmerinfo (firstName, lastName, age, district, locality, contactNo,
	id_number, image, gender, email) VALUES ('$firstName', '$lastName', '$year', '$district', '$locality', '$contactNum',
	'$id_number', '$file_to_saved', '$gender', '$emailAdd')";
	$db = mysqli_query($conn,$sql);

	$sql = "INSERT INTO farminfo (id_number, farmLocation, farmSize, farmerCrop, farmDesc) VALUES ('$id_number', '$farmLocation',
		'$farmSize', '$farmCrop', '$farmDes')";
		$db = mysqli_query($conn,$sql);


	$sql = "INSERT INTO officer (name, officerNo, id_number) VALUES ('$officer_name','$officer_tel','$id_number')";
		$db = mysqli_query($conn,$sql);


	$sql = "INSERT INTO transaction (id_number, Qty_NPK, Qty_UREA, totalCost, amtPaid, balance) VALUES ('$id_number','0','0','0','0','0')";
		$db = mysqli_query($conn,$sql);


	if(!$db){
		echo "Could not insert into database";
		$conn->connect_error;
		header('location: signup.php');
		exit();
	}
	else
		{
			header('location: profile.php');
		}
		$_SESSION['id_number'] = $id_number;
		
	}

}
	

