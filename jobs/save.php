<?php
include 'database.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$job=$_POST['job'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		$sql = "INSERT INTO `jobs`(`job`, `name`, `email`,`phone`,`city`) 
		VALUES ('$job','$name','$email','$phone','$city')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
    if($_POST['type']==2){
		$id=$_POST['id'];
		$job=$_POST['job'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		$sql = "UPDATE `jobs` SET `job`='$job', `name`='$name',`email`='$email',`phone`='$phone',`city`='$city' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
    }
}

if(count($_POST)>0){
    if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `jobs` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
    }
}

if(count($_POST)>0){
	 if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM jobs WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);

}
}

?>