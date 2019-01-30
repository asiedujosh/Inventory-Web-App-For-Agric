<?php
include('server.php');
//Connect to the database

if(isset($_SESSION['id_number'])){
	$id_num = $_SESSION['id_number'];

//fetch farmer details
$farmer = "SELECT firstName, lastName, id_number, image, contactNo, district, locality, email FROM 
farmerinfo WHERE id_number = $id_num";
$first = $conn -> query($farmer);

$farm = "SELECT farmLocation, farmSize, farmerCrop FROM farminfo WHERE id_number = $id_num";
$second = $conn -> query($farm);

$office = "SELECT name, officerNo FROM officer WHERE id_number = $id_num";
$third = $conn -> query($office);

/*$cheat = "SELECT Qty_NPK, Qty_UREA, totalCost, amtPaid, balance, date_reg FROM transaction WHERE id = $id_num";
$start = $conn -> query($cheat);*/

if($first->num_rows>0){
	//fetch data from farmerInfo
	while(
		$fill = $first->fetch_assoc()){
		$id_number = $fill['id_number'];
		$firstName = $fill['firstName'];
		$lastName = $fill['lastName'];
		$image = $fill['image'];
		$contact = $fill['contactNo'];
		$district = $fill['district'];
		$locality = $fill['locality'];
		$email = $fill['email'];
	}
}

if($second->num_rows>0){
	//fetch data from farmInfo
	while(
		$fill = $second->fetch_assoc()){
		$farmLocation = $fill['farmLocation'];
		$farmSize = $fill['farmSize'];
		$farmerCrop = $fill['farmerCrop'];
	}
}

if($third->num_rows>0){
	//fetch data from officer
	while(
		$fill = $third->fetch_assoc()){
		$officerName = $fill['name'];
		$officerNo = $fill['officerNo'];
	}
}

/*if($start->num_rows>0){
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
*/
}

?>
<!doctype html>
<html>
<head>

<!--Html view properties-->
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--Bootstrap here-->
  <link rel="stylesheet" href = "bootstrap-3.3.7/dist/css/bootstrap.min.css" >

<title>Registration</title>

<!--Link to css-->
<link rel = "stylesheet" href="">
</head>
<body>
<div class = "container padding-top-10">
<form action = "transact.php" method = "POST">
<div class = "panel panel-default">
<div class = "panel-heading">
<div class = "row">
<div class = "col-md-4 padding-top-10">
<img src = "<?php echo $image;?>" width ='100' height = '100'/>
</div>
<div class = "col-md-4 padding-top-10">
<h2><?php echo $firstName;?> Profile Page</h2>
</div>
<div class = "col-md-3 padding-top-10">
<button class = "btn btn-default navbar-btn navbar-right"><a href = "index2.php">Home</a></button>
</div>
</div>
</div>

<div class = "panel-body">

<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "name" class = "control-label">
Name:
</label>
<input type = "text" class = "form-control" name = "name" value = "<?php echo $firstName;?> <?php echo $lastName;?>"/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "id" class = "control-label">
ID number:
</label>
<input type = "text" class = "form-control" name = "id_number" value = "<?php echo $id_number;?>"/>
</div>
</div>

<div class = "panel-heading">
<a class = "btn btn-primary col-md-12" href = "#info" data-toggle = "collapse">
View info </a></div>
<div id = "info" class = "panel-body collapse">
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "conAd" class = "control-label">
Contact Address:
</label>
<input type = "text" class = "form-control" value = "<?php echo $locality;?>"/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "conNum" class = "control-label">
Contact Number:
</label>
<input type = "text" class = "form-control" value = "<?php echo $contact;?>"/>
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "frmLoc" class = "control-label">
Farm Location:
</label>
<input type = "text" class = "form-control" value = "<?php echo $farmLocation;?>""/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "frmCrop" class = "control-label">
Farm Crop:
</label>
<input type = "text" class = "form-control" value = "<?php echo $farmerCrop;?>""/>
</div>
</div>
<div class = "row">
<div class = "col-md-12 padding-top-10">
<label for = "dis" class = "control-label">
District :
</label>
<input type = "text" class = "form-control" value = "<?php echo $district;?>""/>
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "frmSize" class = "control-label">
Farm Size:
</label>
<input type = "text" class = "form-control" value = "<?php echo $farmSize;?>""/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "Email" class = "control-label">
Email:
</label>
<input type = "text" class = "form-control" value = "<?php echo $email;?>""/>
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "aea" class = "control-label">
Aea Name:
</label>
<input type = "text" class = "form-control" value = "<?php echo $officerName;?>""/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "aeaCon" class = "control-label">
Aea Contact:
</label>
<input type = "text" class = "form-control" value = "<?php echo $officerNo;?>""/>
</div>
</div>
</div>

<div class = "panel panel-default">


<div class = "panel-heading">
<h2>Transaction</h2>
</div>

<div class = "panel-body">
<div class = "row padding-top-10px">
<table class = "table table-bordered table-hover">
<thead>
<tr>
<th>Input Type</th>
<th>Weight(KG)</th>
<th>Quantity</th>
<th>Unit Cost</th>
<th>Total Cost</th>
</tr>
</thead>
<tbody>
<tr>
<td>NPK</td>
<td>45</td>
<td>
<div class = "form-group">
<input type = "number" name = "npk" class = "form-control prc" required/>
</div>
</td>
<td>
<div class = "form-group">
<output>
58.00
</output>
</div>
</td>
<td>
<div class = "form-group">
<output id = "result"></output>
</div>
</td>
</tr>
<tr>
<td>UREA</td>
<td>
45
<td>
<div class = "form-group">
<input type = "number" name = "urea" class = "form-control prc1" required/>
</div>
</td>
<td>
<div class = "form-group">
<output>
48.00
</output>
</div>
</td>
<td>
<div class = "form-group">
<output id = "result1"></output>
</div>	
</td>
</tr>
<tr>
<td>TOTAL AMOUNT</td>
<td></td>
<td></td>
<td></td>
<td>
<div class = "form-group">
<output  id = "result3" name = "result3"></output>
</td>
</tr>
</tbody>
</table>
</div>
<div class = "row">
<div class = "col-md-6">
<label for = "pyd" class = "control-label">
Amount paid:
</label>
<input type = "number" name = "payed" class= "form-control" id = "pyd" />
</div>
<div class = "col-md-6">
<label class = "control-label"></br></label></br>
<button type = "submit" class = "btn btn-primary col-md-12" name = "pay">Pay</button>
</div>
</div>

</div>
</div>

<div class = "panel panel-default">
<div class = "panel-heading">
<h2>Records</h2>
</div>

<div class = "panel-body">
<div class = "row padding-top-10px">
<table class = "table table-bordered table-hover">
<thead>
<tr>
<th>Date</th>
<th>NPK QTY</th>
<th>UREA QTY</th>
<th>Total Cost</th>
<th>Amount Paid</th>
<th>Balance</th>
</tr>
</thead>
<tbody>
<tr>
<td>00/00/00</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
</tbody>
</table>
</div>
<div class = "row">
<div class = "col-md-6">
<label for = "pyd" class = "control-label">
Balance paid:
</label>
<input type = "text" class= "form-control" id = "pyd" name = "pyd"/>
</div>
<div class = "col-md-6">
<label class = "control-label"></br></label></br>
<button class = "btn btn-primary col-md-12">Pay Balance</button>
</div>
</div>
</div>
</form>
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="jquery-3.3.1.min.js"></script>
    <script>
    	$('.form-group').on('input','.prc',function(){
    		var totalSum1 = 0;
    		var totalSum3 = 0;
    		$('.form-group .prc').each(function(){
    			var inputVal = $(this).val();
    			if($.isNumeric(inputVal)){
    				totalSum1 = parseFloat(inputVal)*58.00;
    			}
    		});
    		$('#result').text(totalSum1);
    		$('#result3').text(totalSum1 + 0);


    		$('.form-group').on('input','.prc1',function(){
    		var totalSum2 = 0;
    		$('.form-group .prc1').each(function(){
    			var inputVal = $(this).val();
    			if($.isNumeric(inputVal)){
    				totalSum2 = parseFloat(inputVal)*48.00;
    			}
    		});
			$('#result1').text(totalSum2);

    		$('#result3').text(totalSum1 + totalSum2);

    	});

    	
    	});
    	
    </script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js">
    	
    </script>
</body>
</html>