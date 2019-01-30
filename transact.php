<?php
$firstName = $lastName = $id_number = $npk = $npkA = $ureaA = $urea = $result = $amtPaid = "";

$Servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

$conn = new mysqli($Servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$conn->connect_error);
}

//Get values 
if(isset($_POST['pay'])){
	$Name = mysqli_real_escape_string($conn,$_POST['name']);
	$id_number = mysqli_real_escape_string($conn,$_POST['id_number']);
	$npk = mysqli_real_escape_string($conn,$_POST['npk']);
	$urea = mysqli_real_escape_string($conn,$_POST['urea']);
	$amtPaid = $_POST['payed'];
	$npkA = $_POST['npk'] * 58;
	$ureaA = $_POST['urea'] * 48;
	$result = $npkA + $ureaA;
	$balance = $result - $amtPaid;


	// select from transaction
	$cheat = "SELECT Qty_NPK, Qty_UREA, totalCost, amtPaid, balance, date_reg FROM transaction WHERE id_number = $id_number";
	$start = $conn -> query($cheat);

	if($start->num_rows>0){
    //fetch data from transacton
    while(
        $stop = $start->fetch_assoc()){
        $date1 = $stop['date_reg'];
        $qty_NPK = $stop['Qty_NPK'];
        $qty_Urea = $stop['Qty_UREA'];
        $tCost = $stop['totalCost'];
        $paid = $stop['amtPaid'];
        $bal = $stop['balance'];
    }
}
	//Getting accurate data
	$Anpk = $npk + $qty_NPK;
	$Aurea = $urea + $qty_Urea;
	$amt = $paid + $amtPaid;
	$tC = $result + $tCost;
	$ban = $bal + $balance; 

//insert into database
	$sql = "UPDATE transaction SET id_number = '$id_number', Qty_NPK = '$Anpk', Qty_UREA = '$Aurea', totalCost = '$tC',
	amtPaid = '$amt', balance = '$ban' WHERE id_number = $id_number";
	$db = mysqli_query($conn,$sql);


	if(!$db){
		 $conn->connect_error;
		echo "Could not insert data";
		
		echo $balance;
		echo $amtPaid;
		

	}

} 

?>
<!doctype html>
<html>
<head>
<title>Farming for food and job</title>
<link rel = "stylesheet" href = "office.css">
<script src = "jquery.js" type = "text/Javascript"></script>
<script src = "jquery.PrintArea.js" type = "text/Javascript"></script>
<script>
$(document).ready(function(){
	$("#print_button").click(
	function(){
	var mode = 'iframe'; //pop up
	var close = mode == "popup";
	var options = {mode : mode, popClose : close};
	$("div#all").printArea(options);
	});
});
</script>
</head>
<body>
<div id = "logo"><img src = "mofa.png"></div>
<div id = "all">
<div id = "address">
The Manager <br>
Gomoa Community Bank <br>
Afransi Branch <br>
</div>
<h2>PAYMENT OF ARREARS <br> "FARMING FOR FOOD AND JOBS"  PROGRAMME</h2>
Mr/Mrs/Ms <?php echo $_POST['name'];?> haven participated in the 2017 
'Farming for Food and Jobs' Programmme, with initial part-payment of GH <?php echo $_POST['payed']; ?> is set to pay an arrears of
GH <?php echo $bal; ?> at your bank.
This amount of money represents the full payment for the cost of <?php echo $_POST['npk']; ?> bags of NPK and <?php echo $_POST['urea']; ?> bags
of UREA fertilizer allocated.
<p>Kindly collect proceeds on behalf of the programme as per the arrangement between your bank 
and the programme.</p>
<div id = "conclusion">
Yours  faithfully.
</div>
<footer>
Signature .......................<br>
Name .............................<br>
Date ...............................<br>
</footer>
</div>
<div id = "button"><a href = "javascript: void(0);" id = "print_button">Print</a></div>
<div id = "button1"><a href = "index2.php">Home</a></div>
</body>
</html>

