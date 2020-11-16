<link rel="stylesheet" href="../CSS/profile.css">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	body.modal-open div.modal-backdrop { z-index: 0; }

</style>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../jobs/ajax.js"></script>

<?php
    session_start();
	require("../backend/functions.php");
	$con = new mysqli("localhost","root","","backend");
	if(!$con){
		echo $conn->connect_error;		
  }


  



	$username = $_POST["name"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM regProvider where name = '$username' and setP = '$password'";


	if($result = $con->query($sql)){
		if($result->num_rows == 1){
			
			$_SESSION['name'] = $username;
			if(isset($_SESSION['name']))
			{
			  $usersData = getUsersData(getId($_SESSION['name']));
			  ?>

<div class="wrapper">
   <div class="left">
      
      <h2><?php echo $usersData['name'];?></h2>
      
    </div>
    <div class="right">
      <div class="info">
        <h3>Information</h3>
        <div class="info_data">
            <div class="data">
              <h3>City</h3>
              <p><?php echo $usersData['city'];?></p>
            </div>
            <div class="data">
				<h3>Phone</h3>
				<p><?php echo $usersData['phone'];?></p>
                <p></p>
            </div>
        </div>
      </div>

      <div class="job_details">
        <h3>Job Details</h3>
        <div class="job_data">
          <div class="data">
            <h3>Recent</h3>
            <p><?php echo $usersData['work'];?></p>
          </div>
        </div>    
      </div>

     
                      
      
                      
      

      <div class="nav_bar" id="logout-btn">
        <a href="../homepage/index.php">
          <input type="submit" name="logout" id="logout-btn" value="Log Out">
        </a>
        
      </div>
      
  </div>

   <!-- Listing the job -->

   <div class="container" style="overflow-x:auto;">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Jobs Listed</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New User</span></a>
												
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							
						</th>
						<th>SL NO</th>
						<th>JOB</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
						<th>PHONE</th>
                        <th>CITY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
        <?php
          include '../jobs/database.php';
				  $result = mysqli_query($conn,"SELECT * FROM jobs WHERE name = '$username' ");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["job"]; ?></td>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["phone"]; ?></td>
					<td><?php echo $row["city"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-name="<?php echo $row["job"]; ?>"
							data-name="<?php echo $row["name"]; ?>"
							data-email="<?php echo $row["email"]; ?>"
							data-phone="<?php echo $row["phone"]; ?>"
							data-city="<?php echo $row["city"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" method="POST" action="save.php">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">		
					<div class="form-group">
							<label>JOB</label>
							<input type="text"  name="job" class="form-control" required>
						</div>			
						<div class="form-group">
							<label>NAME</label>
							<input type="text"  name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email"  name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>PHONE</label>
							<input type="phone"  name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CITY</label>
							<input type="city"  name="city" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                       
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form" method="POST" action="save.php">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>	
						<div class="form-group">
							<label>Job</label>
							<input type="text" id="name_u" name="job" class="form-control" required>
						</div>				
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>PHONE</label>
							<input type="phone" id="phone_u" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>City</label>
							<input type="city" id="city_u" name="city" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="save.php" method="POST" >
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                 
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
                    <input type="hidden" value="4" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>


                 
</div>


			
		<?php
		}	
	}
		else{
			echo "No User Found";
		}
	}
	$conn->close();

?>