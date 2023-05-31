<?php

error_reporting();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "findadoc";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  
if (!$conn) {
  echo "Connection failed!";
}
?>

<!DOCTYPE html>
<html>
  <head>
      <title>
        Find-A-Doc Doctor's Profile
      </title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>

  <style>

@import url("https://fonts.googleapis.com/css??family=Poppins:wght@400;500;600;700&display=swap");


    body{
        background-color: rgb(9, 52, 69);
    }

    .attribute {
        font-size: 18px;
        font-style: normal;
        position: relative;
        top: 70px;
        }

    .banner{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  height: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: rgb(131, 208, 239);
  position: relative;
  top: 100px;
  border-radius: 5px;
    }

    
.btn a {
  float: left;
  display: block;
  color: rgb(219, 216, 216);
  text-align: center;
  padding: 8px;
  text-decoration:none;
  font-size: 13px;
  background-color:rgb(9, 52, 69);
  margin: 10px;
  border-radius: 5px;
  position: relative;
  top: 90px;
  left: 160px;
  font-size: 15px;
}

.btn :hover{
  opacity: 0.7;
}

h2{
  color: rgb(9, 52, 69);
  position: relative;
  top: 60px;
}

  </style>


      <div class = "banner">
          <h2><i class="fa fa-user-md"></i> Doctor's Profile</h2>
        
          <div class = "attribute">
            <label>Name:</label>
            <?php
              session_start();
              echo $_SESSION['doctorname'];
            ?>
          </div>

          <div class = "attribute">
            <label>Location:</label>
            <?php
              echo $_SESSION['doctorlocation'];
            ?>
          </div>

          <div class = "attribute">
            <label>Email:</label>
            <?php
              echo $_SESSION['doctoremail'];
            ?>
          </div> 

           <div class = "attribute">
            <label>Speciality:</label>
            <?php
               echo $_SESSION['doctorcategory'];
            ?> 
          </div>
           
            <div class="btn" id="btn">
            
             <a href="doctorviewreq.php" > View Booking Requests</a>
             
             <a href="mypatients.php" > My Patients</a>
             <div class="btn" id="btn">
            
             <a href="dlogout.php">Log Out</a>
             
          
        </div> 
          

</div>
      </div>

  </body>
</html>