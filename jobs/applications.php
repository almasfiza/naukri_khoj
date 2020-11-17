<head><link rel="stylesheet" href="../CSS/table.css"></head>
<?php
session_start();
$var_value = $_SESSION['name'];
//database connection
$con=mysqli_connect('localhost','root','');

if(!$con){
	echo "No DB connection";
}
mysqli_select_db($con,'backend');
$providerName = $_GET['provName'];
$job= $_GET['job'];

require("../backend/functions.php");
	$con = new mysqli("localhost","root","","backend");
	if(!$con){
		echo $conn->connect_error;		
  }


  



	

	$sql = "SELECT name FROM regProvider where name = '$providerName'";


	if($result = $con->query($sql)){
		if($result->num_rows == 1){
			
			$_SESSION['name'] = $providerName;
			if(isset($_SESSION['name']))
			{
			  $usersData = getUsersData(getId($_SESSION['name']));
			  ?>

?>

<div class="container" style="overflow-x:auto;">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Work Applications</b></h2>
					</div>
					
                </div>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
						<th></th>
						<th>SL NO</th>
						<th>JOB</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
						<th>PHONE</th>
                        <th>CITY</th>
                        
                    </tr>
                </thead>
				<tbody>
				
        <?php
          
				  $result = mysqli_query($con,"SELECT * FROM `application` WHERE providerName = '$providerName' ");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["job"]; ?></td>
					<td><?php echo $row["providerName"]; ?></td>
					<td><?php echo $row["seekerName"]; ?></td>
					<td><?php echo $row["seekerNo"]; ?></td>
					<td><?php echo $row["seekerCity"]; ?></td>
			
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
        <a href="checkPassProvider.php"><button>Back</button></a>
</div>
		
<?php
		}	
	}
		else{
			echo "No User Found";
		}
	}
	

?>