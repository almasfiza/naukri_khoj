<head><link rel="stylesheet" href="../CSS/table.css"></head>
<?php
$var_value = $_SESSION['name'];
//database connection
$con=mysqli_connect('sql107.epizy.com','epiz_27232332','flM9LkeGa0Pmb');

if(!$con){
	echo "No DB connection";
}
mysqli_select_db($con,'epiz_27232332_db');
$providerName = $_GET['provName'];
$job= $_GET['job'];

  
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
		<a href="checkPassProvider.php"> <button>Back</button></a>
		
       
</div>
		

