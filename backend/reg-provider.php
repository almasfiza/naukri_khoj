<?php
//database connection
$con=mysqli_connect('localhost','root','');

if(!$con){
	echo "No DB connection";
}
//variables to take input from form 
$name = $_POST['name'];
$phoneno = $_POST['ph-no'];
$city = $_POST['city'];
$setPass = $_POST['pwd'];
$conPass = $_POST['confirm-pwd'];
$work = 'test val';


//selection of database where the input data will be stored
mysqli_select_db($con,'naukri-khoj');


// Attempt insert query execution
if(isset($_POST['submit'])){

$reg= "insert into register-provider(Name, Phone-no,City, SetPass, ConfirmPass, Work ) 
                                values ('$name', '$phoneno','$city','$setPass',
                                '$conPass', '$work')";
$result=mysqli_query($con,$reg);
echo "Registration is successful";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>


