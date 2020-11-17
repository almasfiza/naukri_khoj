<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="../CSS/table.css">

	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<script>

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


   </script>

	<style>
	header{
		background-color:#ffefd7;
		padding:30px;
		margin:0px;
		border: solid black 2px;
	}
	#our-btn{
		border:solid black 2px;
		color:black;
		background-color:#ffefd7;

	}
	#our-btn:hover{
		background-color:black;
		color:#ffefd7;

	}
	</style>
</head>
<body>
<header><h1>Find Work</h1>
<a href="../homepage/index.php"><button id="our-btn">Back</button></a></header>
<div class="container">
	<p id="success"></p>
	
        <div class="table-wrapper" style="overflow-x:auto;">
            <div class="table-title">
               
                    
						
					
					<!-- <div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New User</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>						
					</div> -->
               
			</div>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for work..">
			<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Work Provider Name.."><br></br>

            <table id="myTable" class="content-table">
                <thead>
                    <tr>
						
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
				   $result = mysqli_query($conn,"SELECT * FROM jobs");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>"> 
				    
					<td><?php echo $i; ?></td>
					<td><?php echo $row["job"]; ?></td>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["phone"]; ?></td>
					<td><?php echo $row["city"]; ?></td>
					<td>
						<style>
						
							</style>
						<a style="color:black;" href="#addEmployeeModal" class="edit" data-toggle="modal">
							<button id="our-btn">Apply</button>
						</a>
						
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
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" method="POST" action="save.php">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">	
					<div class="form-group">
							<label>Work</label>
							<input type="text"  name="job" class="form-control" required>
						</div>				
						<div class="form-group">
							<label>Provider Name</label>
							<input type="text"  name="providerName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Your Name</label>
							<input type="email"  name="seekerName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Your No.</label>
							<input type="phone"  name="seekerNo" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Your City</label>
							<input type="city"  name="seekerCity" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="7" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                       
					</div>
				</form>
			</div>
		</div>
			</div>





	

</body>
</html>    