<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <title>Dealership Inventory</title>
       <link rel="stylesheet" href="main.css">
       <link rel="stylesheet" href="style.css">
   </head>
 
<body>
       <ul>
           <li style="float:left"><a><img src="Rice&Beans_Logo.PNG" alt="rice&beans" width="20" height="20"> Welcome to DMS</a></li>
            <li><a href="get_car.php?did=0">Vehicles</a></li>
           <li><a href= "get_dealer.php">Dealerships</a></li>
</ul>

<?php
include('connect.php');
$did = $_GET['did']; ?>
<script>
$(document).ready(function(){
$("#myInput").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>
		<p style="text-align:center">Add Vehicle </p>
		<form action="veh_back.php?did=<?php echo $did; ?>" method="POST" enctype="multipart/form-data">
		<?php if ($did == "0")
		{echo "<p style='text-align:center'>Dealer ID: "."<input type='text' name='d_id' size='15' maxlength='20' value = ''></p>";}
		elseif ($did != "0")
		{echo "<p style='margin-right:60px'>Dealer ID: ". $did ."</p>";} ?>
		<p style="margin-right: 35px">VIN #: <input type="text" name="vin" size="15" maxlength="20" value = ""></p>
		<p style="margin-right: 30px">Year: <input type="text" name="year" size="15" maxlength="20" value = ""></p>
		<p style="margin-right: 36px">Make: <input type="text" name="make" size="15" maxlength="20" value = ""></p>
		<p style="margin-right: 38px">Model: <input type="text" name="model" size="15" maxlength="20" value = ""></p>
		<p style="margin-right: 35px">Color: <input type="text" name="color" size="15" maxlength="20" value = ""></p>
		<p style="margin-right: 42px">MSRP: <input type="text" name="msrp" size="15" maxlength="20" value = ""></p>
		<p>Upload Image: </p>
	<center><input type="file" name="file" value = ""></center>
       <p style="text-align:center"><button type="submit" class="button button1" name="submit" value="Save">Add</button>
        </p>
		</form>"


<div class="container">
<h2>Find Dealer</h2>
<input id="myInput" type="text" placeholder="Dealer ID Search..">
<table class="table">
<thead>
<tr>
<th>Dealer ID</th>
<th>Name</th>
<th>Manager</th>
<th>City</th>
<th>State</th>
</tr>
</thead>
<tbody id="myTable">

<?php
if ($did == "0"){
		//get dealer table for id search
		$db = mysqli_connect(db_servername, db_username, db_pass, db_dbname);
		$sql = "SELECT * FROM dealer ORDER BY name";
		$result = mysqli_query($db, $sql);
		while($row = mysqli_fetch_assoc($result))
    		{
		$d_id = $row['d_id'];
		$name = $row['name'];
		$sql2 = "SELECT e.f_name, e.l_name FROM dealer d, employee e, manage m WHERE d.d_id = '$d_id' AND m.d_id = '$d_id' AND e.e_id = m.e_id";
		$result2 = mysqli_query($db, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$city = $row['city'];
		$state = $row['state'];
		echo "<tr>";
        	echo "<td>" . $d_id . "</td>";
		echo "<td>" . $name . "</td>";
        	echo "<td>" . $row2['f_name'] . " " . $row2['l_name'] . "</td>";
		echo "<td>" . $city . "</td>";
        	echo "<td>" . $state . "</td>";
        	//echo "<td>" . $zip_code . "</td>";
		//echo "<td>" . $row4['num_emp'] . "</td>";
		}
}
?>

</tbody>
</table>
</div>
</body>
</html>
