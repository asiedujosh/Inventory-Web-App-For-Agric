<?php
$servername = "localhost";
$username = "root";
$password = "Katalambano90";
$dbname = "unique";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die('error: '.$conn->connect_error);
}

$sql = "SELECT Qty_left FROM monitor WHERE id = 1";
$npk = $conn-> query($sql);

if($npk->num_rows>0){
	while($nitro = $npk-> fetch_assoc()){
	$npk1 = $nitro['Qty_left'];
	}
} 

$sql = "SELECT Qty_left FROM monitor WHERE id = 2";
$urea = $conn-> query($sql);

if($urea->num_rows>0){
	while($mino = $urea-> fetch_assoc()){
	$urea1 = $mino['Qty_left'];
	}
}
?>
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
<body>
<nav class = "navbar navbar-default navbar-fixed-top" style = "padding-top: 10px">
<div class = "container">
<ul class = "nav navbar-nav">
<div class = "row">
<div class = "col-md-6">
<div class = "form-group">
<div class = "input-group">
<span class = "input-group-addon">
Search</span>
<input type = "text" name = "search_text" id = "search_text" placeholder = "Search by Customer Name" class = "form-control"/>
</div>
</div>
</div>
<div class = "col-md-6">
<button class = "btn btn-default navbar-btn"><a href = "management.php">NPK <span class = "badge" style = "background:#d9532f"><?php echo $npk1; ?></span></a>
</button>
<button class = "btn btn-default navbar-btn"><a href = "management.php">Urea <span class = "badge" style = "background:#d9532f"><?php echo $urea1; ?></span></a>
</button>
<button class = "btn btn-default navbar-btn navbar-right"><a href = "signup.php">Register</a></button>
<button class = "btn btn-default navbar-btn navbar-right active"><a href = "">Home</a></button>
</ul>
</div>
</div>
</ul>
</div>
</nav>
<div class = "container">
<h2>Management</h2>
<table class = "table table_hover">
<thead>
<th>First Name</th>
<th>Last Name</th>
<th>ID Number</th>
<th>District</th>
<th>Contact</th>
<th>Action</th>
</thead>
<tbody>

<?php
//connecting to database


 
 $sql = "SELECT firstName, lastName, district, contactNo, id_number FROM farmerinfo";
 $db = $conn-> query($sql);
 if($db->num_rows>0){
 	while($rain = $db-> fetch_assoc()){

 ?>
<tr>
<div id = "result"></div>
<td><?php echo $rain['firstName']; ?></td>
<td><?php echo $rain['lastName']; ?></td>
<td><?php echo $rain['id_number']; ?></td>
<td><?php echo $rain['district']; ?></td>
<td><?php echo $rain['contactNo']; ?></td>
<td><a id="edit_btn" href="profile2.php?edit=<?php echo $rain['id_number'];?>">View Info</a></td>
</tr>
<?php	
}
 }
?>
</tbody>
</table>
</div>







<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="jquery-3.3.1.min.js"></script>
    <script>
    	$(document).ready(function(){
    		$('#search_text').keyup(function(){
    		var txt = $(this).val();
    		if(txt != ''){
    			$.ajax({
    				url:"index.php",
    				method: "post",
    				data:{search:txt},
    				dataType: "text",
    				success: function(data){
    					$('#result').html(data);
    				}
    			});
    		} else {
    			$('#result').html('');
    			$.ajax({
    				url:"index.php",
    				method:"post",
    				data:{search:txt},
    				dataType:"text",
    				success:function(data){
    					$('#result').html(data);
    				}
    			});
    		}
    	});
    	});
    </script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>