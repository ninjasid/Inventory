<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body id="bootstrap-overrides">
    
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id='home'>DMC</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
	<li><a href="#" id="dealer"> Dealerships</a></li>
      	<li><a href="#" id="vehicle"></span> Vehicles</a></li>
	<li><a href="#" id="add_dealer"><span class="glyphicon glyphicon-log-in"></span> Add Dealer</a></li>
    </ul>
  </div>
</nav>
  
<div id = "content" class="container">
</div>
<div id = "content2" class="container">
</div>
<div id = "content3" class="container">
</div>
<div id = "content4" class="container">
</div>

<script>
$(document).ready( function() {
		$("#content").text("Welcome to the Inventory");
});
$(document).ready( function() {
	$("#home").on("click", function() {
		$("#content").text("Welcome to the Inventory");		
	});
});
$(document).ready( function() {
	$("#vehicle").on("click", function() {
		$("#content").load("get_car.php?did=0");
		$("#content2").text("");
		$("#content3").text("");	
	});
});
$(document).ready( function() {
	$("#dealer").on("click", function() {
		$("#content").load("get_dealer.php");
		$("#content2").text("");
		$("#content3").text("");		
	});
});
$(document).ready( function() {
	$("#add_dealer").on("click", function() {
		$("#content").load("add_dealer.php");	
		$("#content2").text("");
		$("#content3").text("");	
	});
});
</script>
</body>
</html>

