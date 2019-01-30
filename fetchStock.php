<?php
$date = $input = $qty_rec = $qty_left = $percent = "";
//Connect to the database
$servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$conn->connect_error);
}
//This for NPK
$sql = "SELECT date_received, Qty_received FROM stock_management WHERE id = '1'";  
$db = $conn ->query($sql);

$moni = "SELECT Qty_left, percent_left FROM monitor WHERE id = '1'";  
$mos = $conn ->query($moni);

$input = "SELECT input FROM input_type WHERE id = '1'";  
$car = $conn ->query($input);

if($db->num_rows>0){
	while($nas = $db -> fetch_assoc()){
		$date = $nas['date_received'];
		$qty_rec = $nas['Qty_received'];

	}
}
if($mos->num_rows>0){
	while($nas = $mos -> fetch_assoc()){
		$qty_left = $nas['Qty_left'];
		$percent = $nas['percent_left'];

	}
}
if($car->num_rows>0){
	while($nas = $car -> fetch_assoc()){
		$input = $nas['input'];

	}
}



//This for Urea
$low = "SELECT date_received, Qty_received FROM stock_management WHERE id = '2'";  
$la = $conn ->query($low);

$high = "SELECT Qty_left, percent_left FROM monitor WHERE id = '2'";  
$ha = $conn ->query($high);

$middle = "SELECT input FROM input_type WHERE id = '2'"; 
$mid = $conn ->query($middle);

if($db->num_rows>0){
	while($cos = $la -> fetch_assoc()){
		$date2 = $cos['date_received'];
		$qty_rec2 = $cos['Qty_received'];

	}
}
if($mos->num_rows>0){
	while($sin = $ha -> fetch_assoc()){
		$qty_left2 = $sin['Qty_left'];
		$percent2 = $sin['percent_left'];

	}
}
if($car->num_rows>0){
	while($tan = $mid -> fetch_assoc()){
		$input2 = $tan['input'];

	}
}

//This for maize
$calls = "SELECT date_received, Qty_received FROM stock_management WHERE id = 3";  
$cup = $conn ->query($calls);

$bus = "SELECT Qty_left, percent_left FROM monitor WHERE id = 3";  
$ball = $conn ->query($bus);

$bat = "SELECT input FROM input_type WHERE id = 3"; 
$rot = $conn ->query($bat);

if($cup->num_rows>0){
	while($ice = $cup -> fetch_assoc()){
		$date3 = $ice['date_received'];
		$qty_rec3 = $ice['Qty_received'];

	}
}
if($ball->num_rows>0){
	while($fire = $ball -> fetch_assoc()){
		$qty_left3 = $fire['Qty_left'];
		$percent3 = $fire['percent_left'];

	}
}
if($rot->num_rows>0){
	while($jot = $rot -> fetch_assoc()){
		$input3 = $jot['input'];

	}
}

//Finance management
//This for maize
$npkq = "SELECT amt_stock FROM finance_management WHERE id = 1";  
$npka = $conn ->query($npkq);

$ureaq = "SELECT amt_stock FROM finance_management WHERE id = 2";  
$ureaa = $conn ->query($ureaq);

$maizeq = "SELECT amt_stock FROM finance_management WHERE id = 3"; 
$maizea = $conn ->query($maizeq);

if($npka->num_rows>0){
	while($npk = $npka -> fetch_assoc()){
		$amt_stock1 = $npk['amt_stock'];

	}
}
if($ureaa->num_rows>0){
	while($urea = $ureaa -> fetch_assoc()){
		$amt_stock2 = $urea['amt_stock'];
	}
}
if($maizea->num_rows>0){
	while($maize = $maizea -> fetch_assoc()){
		$amt_stock3 = $maize['amt_stock'];
	}
}

$sum_NPK = "SELECT SUM(Qty_NPK) FROM transaction";
	$sum_NPKq = $conn -> query($sum_NPK);

	if($sum_NPKq ->num_rows>0){
		while($total = $sum_NPKq->fetch_assoc()){
			$sammy = $total['SUM(Qty_NPK)'];
			$sunny = $total['SUM(Qty_NPK)']*58;
		}
	}
$sum_Urea = "SELECT SUM(Qty_Urea) FROM transaction";
	$sum_Ureaq = $conn -> query($sum_Urea);

	if($sum_Ureaq ->num_rows>0){
		while($total = $sum_Ureaq->fetch_assoc()){
			$dam = $total['SUM(Qty_Urea)'];
			$danny = $total['SUM(Qty_Urea)']*48;
		}
	}

$Qty_left_NPK = $qty_rec - $sammy;
$Qty_left_Urea = $qty_rec2 - $dam;

//Amount percentage
$rec_amt1 = ($sunny/$amt_stock1)*100;
$rec_amt2 = ($danny/$amt_stock2)*100;

//Quantity percentage
$rec_qty1 = ($Qty_left_NPK/$qty_rec)*100;
$rec_qty2 = ($Qty_left_Urea/$qty_rec2)*100;

//Update the monitor table
$sql = "UPDATE monitor SET Qty_left = '$Qty_left_NPK', percent_left = '$rec_qty1'
WHERE id = 1";
$db = mysqli_query($conn,$sql);

$sql = "UPDATE monitor SET Qty_left = '$Qty_left_Urea', percent_left = '$rec_qty2'
WHERE id = 2";
$db = mysqli_query($conn,$sql);


//Update the finance monitor table
$sql = "UPDATE finance_monitor SET amt_recovered = '$sunny', percen_recovered = '$rec_amt1'
WHERE id = 1";
$db = mysqli_query($conn,$sql);

$sql = "UPDATE finance_monitor SET amt_recovered = '$danny', percen_recovered = '$rec_amt2'
WHERE id = 2";
$db = mysqli_query($conn,$sql);