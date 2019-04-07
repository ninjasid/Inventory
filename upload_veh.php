<?php
include ('connect.php');
class Upload{
	function __constructor(){
	$this->upload();
}

function upload(){
		echo "<br>Upload a vehicle <br><br>";
		echo "<form action='upload_veh.php' method='POST' enctype='multipart/form-data'>";
		echo "Upload Image:<br>";
		echo "<input type='file' name='file' value = ''><br>";
		echo "Vehicle Vin Number: "."<input type='text' name='vin'><br>";
		echo "Dealer ID: "."<input type='text' name='d_id'><br>";
		echo "Make: "."<input type='text' name='make'><br>";
		echo "Model: "."<input type='text' name='model'><br>";
		echo "Year: "."<input type='text' name='year'><br>";
		echo "Color: "."<input type='text' name='color'><br>";
		echo "MSRP: "."<input type='text' name='msrp'><br>";
		echo "Actual Price: "."<input type='text' name='acprice'><br>";
		echo "<input type='submit' name='submit' value='Upload'>";
		echo "</form>";
		
		if (isset($_POST['submit']))
		{
			$conn = new mysqli(db_servername, db_username, db_pass, db_dbname);
			$vin = $_POST['vin'];
			//verify upload file is picture
			//$_FILES['file']['name'] = $vin . '.jpg';
			$whitelist = ['jpg', 'jpeg', 'png', 'gif'];
			$name = $_FILES['file']['name'];
			$extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

			$make = $_POST['make'];
			$model = $_POST['model'];
			$year = $_POST['year'];
			$color = $_POST['color'];
			$msrp = $_POST['msrp'];
			$acp = $_POST['acprice'];
			$did = $_POST['d_id'];

			//check vin number does not exist
			$sql = "SELECT `vin_num`,`make`,`model` FROM vehicle WHERE `vin_num` = '$vin' AND `make` = '$make' AND `model` = '$model'";
			$result=mysqli_query($conn, $sql);
			$num=mysqli_num_rows($result);
			//check dealer exist
			$sql2 = "SELECT `d_id` FROM dealer WHERE `d_id` = '$did'";
			$result2=mysqli_query($conn, $sql2);
			$num2=mysqli_num_rows($result2);
if (isset($name)){
			if ($num == 0 && $num2 == 1 && in_array($extension,$whitelist)){
				$make = ucfirst($make);
				$color = ucfirst($color);
				$model = ucfirst($model);
				$vin = strtoupper($vin);
				//upload
				move_uploaded_file($_FILES["file"]["tmp_name"], "picture/{$vin}.jpg");
				$sql1 = "INSERT INTO `vehicle`(`vin_num`,`make`, `model`, `year`, `color`,`msrp`) VALUES ('$vin','$make','$model','$year','$color','$msrp')";
				$sql2 = "INSERT INTO `inventory`(`vin_num`,`actual_p`, `d_id`) VALUES ('$vin','$acp','$did')";
				if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    echo "<br>******New vehicle added successfully.******"; header("location:index.php");
}else {echo "Error while uploading, please double check your values";}	

			} elseif ($num != 0){
	echo "This Vin Number exist in the database";
   // echo "Error: " . $sql . "<br>The test data added already<br>" . $conn->error;
}elseif ($num2 == 0){echo "Cannot find the dealer";}elseif (!in_array($extension,$whitelist)){echo "Select a picture";}
}
		}
}

}
$up = new Upload();
?>
