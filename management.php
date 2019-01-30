<?php
include('fetchStock.php');
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
<form action = "control.php" method = "POST">
<div class = "panel panel-default">
<div class = "panel-heading">
<div class = "col-md-4 padding-top-10">

</div>
<h2>Management</h2> <a href = "index2.php"><img src = "pics/door.png" style="width:2em; height:2em;"></a>
</div>
<div class = "panel-body">

<table class = "table table-bordered table-hover">
<thead>
<h3>Stock Management</h3>
<tr>
<th>Date Received</th>
<th>Input Type</th>
<th>Qty Received</th>
<th>Qty left</th>
<th>Percentage</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $date; ?></td>
<td><?php echo $input;?></td>
<td><?php echo $qty_rec; ?></td>
<td><?php echo $Qty_left_NPK; ?></td>
<td><?php echo $rec_qty1; ?></td>
</tr>
<tr>
<td><?php echo $date2; ?></td>
<td><?php echo $input2;?></td>
<td><?php echo $qty_rec2; ?></td>
<td><?php echo $Qty_left_Urea; ?></td>
<td><?php echo $rec_qty2; ?></td>
</tr>
<tr>
<td><?php echo $date3; ?></td>
<td><?php echo $input3;?></td>
<td><?php echo $qty_rec3; ?></td>
<td>0</td>
<td>0</td>
</tr>
</tr>
</tbody>
</table>
<div class = "panel-heading">
<a class = "btn btn-primary col-md-12" href = "#info" data-toggle = "collapse">
Fill Up Stock </a></div>
<div id = "info" class = "panel-body collapse">

<label for = "npk" class = "control-label">
NPK:
</label>
<div class = "row">
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "qtyN" id = "npk" placeholder = "Quantity of NPK"/>
</div>
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "dateK" id = "npk" placeholder = "Date Received eg: 11/02/1"/>
</div>
</div>


<label for = "urea" class = "control-label">
UREA:
</label>
<div class = "row">
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "qtyU" id = "urea" placeholder = "Quantity of UREA"/>
</div>
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "dateU" id = "urea" placeholder = "Date Received eg: 11/02/1"/>
</div>
</div>


<label for = "maize" class = "control-label">
MAIZE:
</label>
<div class = "row">
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "qtyM" id = "maize" placeholder = "Quantity of Maize bags"/>
</div>
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "dateM" id = "maize" placeholder = "Date Received eg: 11/01/1"/>
</div>
</div></br>
<button type = "submit" class = "btn btn-primary col-md-12" name = "save">Fill Up</button>
</div>
</form>
</br>
<table class = "table table-bordered table-hover">
<thead>
<h3>Finance Management</h3>
<tr>
<th>Input Types</th>
<th>Total Amount Of Stock</th>
<th>Amount Recovered</th>
<th>Recovery Percentage(%)</th>
</tr>
</thead>
<tbody>
<tr>
<td>NPK</td>
<td><?php echo $amt_stock1; ?></td>
<td><?php echo $sunny; ?></td>
<td><?php echo $rec_amt1; ?></td>
</tr>
<tr>
<td>UREA</td> 
<td><?php echo $amt_stock2; ?></td>
<td><?php echo $danny; ?></td>
<td><?php echo $rec_amt2; ?></td>
</tr>
<td>Maize</td>
<td><?php echo $amt_stock3; ?></td>
<td>0</td>
<td>0</td>
</tr>
</tbody>
</table>      
</div>
</div>



</form>
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="jquery-3.3.1.min.js"></script>
    <script src="">
    	function myFunction(){
    		confirm("press a button");
    	}
    </script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js">

    </script>
</body>
</html>