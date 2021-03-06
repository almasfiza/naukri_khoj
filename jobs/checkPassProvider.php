<link rel="stylesheet" href="../CSS/profile.css">
<link rel="stylesheet" href="../CSS/table.css">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	body.modal-open div.modal-backdrop { z-index: 0; }
	header{
		background-color:#ffefd7;
		padding:30px;
		margin:0px;
		border: solid black 2px;
	}
	footer{
		background-color:#ffefd7;
		

	}
	#our-btn{
		border:solid black 2px;
		color:black;
		background-color:#ffefd7;
		padding:5px;

	}
	#our-btn:hover{
		background-color:black;
		color:#ffefd7;

	}

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
	$con = new mysqli('sql107.epizy.com','epiz_27232332','flM9LkeGa0Pmb','epiz_27232332_db');
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

  <header>
  <!--Google Translate-->    
  <div id="google_translate_element_id"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element_id');
}
</script>

    <script type="text/javascript">
        (function(){var gtConstEvalStartTime = new Date();/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='445331.1849841895';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
    </script>
  <h1>Hello <?php echo $username ?></h1>
  <a href="../index.php"><button id="our-btn">Logout</button></a>
  </header>
  <!-- Listing the job -->
  
  <div class="container" style="overflow-x:auto;">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Work Listed</b></h2>
						<p>Refresh the page once after deleting work listings.</p>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" data-toggle="modal"><button id="our-btn">Add Work</button></a>
												
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
				
					<td><?php echo $i; ?></td>
					<td><?php echo $row["job"]; ?></td>
					<td><?php echo $username; ?></td>
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
          
				  $result = mysqli_query($con,"SELECT * FROM `application` WHERE providerName = '$username' ");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["job"]; ?></td>
					<td><?php echo $username; ?></td>
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
		
		
       
</div>
 </div>

   
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade" data-backdrop="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" method="POST" action="save.php">
					<div class="modal-header">						
						<h4 class="modal-title">Add Work</h4>
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
						<h4 class="modal-title">Edit Work</h4>
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
						<h4 class="modal-title">Delete Work</h4>
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
<footer>

</footer>


			
		<?php
		}	
	}
		else{
			?>"<script>window.location = '../filler/noUser.html'</script>";<?php
		}
	}
	$conn->close();

?>