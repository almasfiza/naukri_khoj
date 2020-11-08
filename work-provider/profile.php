<?php
session_start();
require("../backend/functions.php");

?>



<!DOCTYPE html>
<html>
<head>
      <title>Job Seeker Profile</title>
      <link rel="stylesheet" href="../CSS/profile.css">
      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<?php if(isset($_SESSION['name']))
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
              <h3>Email</h3>
              <p>demo@gmail.com</p>
            </div>
            <div class="data">
                <h3>Phone</h3>
                <p>xxxx-xx-xxxx</p>
            </div>
        </div>
      </div>

      <div class="job_details">
        <h3>Job Details</h3>
        <div class="job_data">
          <div class="data">
            <h3>Recent</h3>
            <p>Details about job pursued</p>
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
      ?>

</body>  
</html>      

                

