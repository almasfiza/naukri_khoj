<?php
	$conn = new mysqli("localhost","root","","backend");
	if(!$conn){
		echo $conn->connect_error;		
	}
	$username = $_POST["name"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM regProvider where name = '$username' and setP = '$password'";

	if($result = $conn->query($sql)){
		if($result->num_rows == 1){
			echo "Login Success";
			echo "<script>window.location.assign('../work-provider/profile.php')</script>";
		
		}	
		else{
			echo "No User Found";
		}
	}
	$conn->close();

?>