<?php
$servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

//Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$conn->connect_error);
}

$output = '';
$sql = "SELECT firstName, lastName, district, contactNo, id_number FROM farmerinfo WHERE firstName LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){?>




<!Doctype html>
<html>
<head>

<!--Html view properties-->
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Bootstrap here-->
	<link rel="stylesheet" href = "bootstrap-3.3.7/dist/css/bootstrap.min.css" >

<title>Home</title>

<!--Link to css-->
<link rel = "stylesheet" href="">
</head>



	<?php $output.='<h4 align = "center">Search Result</h4>';
	$output.='<table class = "table table_hover">
	<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>ID Number</th>
	<th>District</th>
	<th>Contact</th>
	<th>Action</th>
	</tr>';
	while($row = mysqli_fetch_array($result)){
		$output.='
		<tr>
		<td>'.$row["firstName"].'</td>
		<td>'.$row["lastName"].'</td>
		<td>'.$row["id_number"].'</td>
		<td>'.$row["district"].'</td>
		<td>'.$row["contactNo"].'</td>
		<td><a id="edit_btn" href="profile2.php?edit='; $row['id_number'].'">View Info</a></td>
		</tr>
		';

}
 echo $output;
}
	else {
	echo 'Data Not found';
	}



