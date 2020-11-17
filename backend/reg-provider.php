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
$work = $_POST['work'];


//selection of database where the input data will be stored
mysqli_select_db($con,'backend');


// Attempt insert query execution
if(isset($_POST['submit'])){

$reg= "insert into regProvider(name, phone, city, setP, confP, work ) 
                                values ('$name', '$phoneno','$city','$setPass',
                                '$conPass', '$work')";
$result=mysqli_query($con,$reg);
?>

<script>window.location = '../filler/SuccessReg.html'</script>;
<?php
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>


