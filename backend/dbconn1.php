<?php
//database connection
$con=mysqli_connect('localhost','root','');

if(!$con){
	echo "No DB connection";
}
//varibales to take input from form 
$name = $_POST['name'];
$phoneno = $_POST['ph-no'];
$city = $_POST['city'];
$setPass = $_POST['pwd'];
$conPass = $_POST['confirm-pwd'];
$adhar = $_POST['adhar'];
$ration = $_POST['ration'];
$photo = $_POST['photo']; 
$work = $_POST['work'];
$extra = $_POST['ex-work']; 

//selection of database where the input data will be stored
mysqli_select_db($con,'backend');


// Attempt insert query execution
if(isset($_POST['submit'])){

$reg= "insert into regSeeker(name, phone,city, setP, confP,adhar,ration, photo,work, extraWork) 
                                values ('$name', '$phoneno','$city','$setPass',
                                '$conPass','$adhar','$ration','$photo',
                                $work','$extra')";
$result=mysqli_query($con,$reg);
echo "Registration is successful";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>