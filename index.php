<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Inventory</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#" id="search">Search</a></li>
      <li><a href="#" id="vehicle">Vehicles</a></li>
      <li><a href="#" id="dealer">Dealers</a></li>
      <li><a href="#" id="employee">Employees</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	<li><a href="#" id="sign_up"><span class="glyphicon glyphicon-user"></span> Employee Register</a></li>
      	<li><a href="#" id="upload"><span class="glyphicon glyphicon-log-in"></span> Upload Vehicle</a></li>
    </ul>
  </div>
</nav>
  
<div id = "content" class="container">
</div>

<script>
$(document).ready( function() {
	$("#vehicle").on("click", function() {
		$("#content").load("get_car.php");	
	});
});
$(document).ready( function() {
	$("#dealer").on("click", function() {
		$("#content").load("get_dealer.php");	
	});
});
$(document).ready( function() {
	$("#employee").on("click", function() {
		$("#content").load("get_emp.php");	
	});
});
$(document).ready( function() {
	$("#sign_up").on("click", function() {
		$("#content").load("reg_emp.php");	
	});
});
$(document).ready( function() {
	$("#upload").on("click", function() {
		$("#content").load("upload_veh.php");	
	});
});
$(document).ready( function() {
	$("#search").on("click", function() {
		$("#content").load("search_veh.php");	
	});
});

</script>

</body>
</html>
