<link rel="stylesheet" href="../CSS/profile.css">
      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<?php
    session_start();
	require("../backend/functions.php");
	$conn = new mysqli("localhost","root","","backend");
	if(!$conn){
		echo $conn->connect_error;		
	}
	$username = $_POST["name"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM regProvider where name = '$username' and setP = '$password'";


	if($result = $conn->query($sql)){
		if($result->num_rows == 1){
			
			$_SESSION['name'] = $username;
			if(isset($_SESSION['name']))
			{
			  $usersData = getUsersData(getId($_SESSION['name']));
			  ?>

<div class="wrapper">
   <div class="left">
      <img src="../Assets/img1.png" alt="user" width="100">
      <h2><?php echo $usersData['name'];?></h2>
      <p>Profession</p>
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