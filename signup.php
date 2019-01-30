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
<div class = "panel panel-default">
<div class = "panel-heading"><h2>Sign Up</h2><a href = "index2.php"><img src = "pics/door.png" style="width:2em; height:2em;"></a>
</div>
<div class = "panel-body">
<form  action = "profile.php" method = "POST" enctype = "multipart/form-data">
<h3>Personal Information</h3>
<label for "firstName" class = "control-label">Name:</label>
<div class = "row">
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "firstName" placeholder = "First" required/>
</div>
<div class = "col-md-6">
<input type = "text" class = "form-control" name = "lastName" placeholder = "Last" required/>
</div>
</div>
<div class ="row">
<div class = "col-md-6 padding-top-10">
<label for = "gender" class = "control-label">
Gender:</label>
<select name = "gender" class = "form-control">
<option value = "1">Male</option>
<option value = "2">Female</option>
</select>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "yrBorn" class = "control-label">
Year Born:</label>
<input type = "text" class = "form-control" name = "year" placeholder = "year born" required/>
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "district" class = "control-label">
District:</label>
<input type = "text" class = "form-control" name = "district" placeholder = "district" required/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "locality" class = "control-label">
Locality:</label>
<input type = "text" class = "form-control" name = "locality" placeholder = "address" required/>
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "contactNo" class = "control-label">
Contact Number:</label>
<input type = "text" class = "form-control" name = "contactNum" placeholder = "contact Number" required/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "email" class = "control-label">
Email Address:</label>
<input type = "text" class = "form-control" name = "emailAdd" placeholder = "Email"/>
</div>
</div>
<div class = "row">
<div class = "col-md-12 padding-top-10">
<label for = "idNo" class = "control-label">
ID Number:</label>
<input type = "text" class = "form-control" name = "id_number" placeholder = "Id Number" required/>
</div>
</div>
<div class = "row">
<div class = "col-md-8 padding-top-10">
<label for = "file" class = "control-label">
<input type = "file" name = "foto" />
<button type = "button" class = "btn btn-default">Remove</button>
</label>
</div>
</div>
<h3>Farm Information</h3>
<label for = "farmLoc" class = "control-label">Farm location:</label>
<div class = "row">
<div class = "col-md-12">
<input type = "text" class = "form-control" name = "farmLocation" placeholder = "location" required/>
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "farmSize" class = "control-label">Farm Size:</label>
<input type = "text" class = "form-control" name = "farmSize" placeholder = "farmSize" required/>
</div>
<div class = "col-md-6">
<label for = "crop" class = "control-label">Farmer Crop:</label>
<input type = "crop" class = "form-control" name = "farmCrop" placeholder = "Farmer Crop" required/> 
</div>
</div>
<div class = "row">
<div class = "col-md-6 padding-top-10">
<label for = "AEA" class = "control-label">Name of Officer:</label>
<input type = "text" class = "form-control" name = "aeaName" placeholder = "Name of Officer" required/>
</div>
<div class = "col-md-6 padding-top-10">
<label for = "aeaNo" class = "control-label">Officer's Number:</label>
<input type = "text" class = "form-control" name = "aeaNo" placeholder = "Officers Number" required/>
</div>
</div>
<div class = "row">
<div class = "col-md-12 padding-top-10">
<label for = "farmDes" class = "control-label">Farm description:</label>
<textarea class = "form-control" rows = "5" name = "comment"></textarea>
</div>
</div>
<h3>Beneficiary Undertake</h3>
<div class = "row">
<div class = "col-md-12 padding-top-10">
<div class = "checkbox">
<label>
<input type = "checkbox" required/>
I testify that all information provided are true and transaction I undertake here is 
with my own accord. I bare full consequences to any actions I undertake here.
</label>
</div>
</div>
</div>
<div class = "row">
<div class = "col-md-2">
<button type = "submit" class = "btn btn-success" name = "save">Register</button>
</div>
</div>

</form>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="jquery-3.3.1.min.js"></script>
    <script src=""></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    </div>
    </div>
</body>
</html>