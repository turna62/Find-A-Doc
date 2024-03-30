
<?php

error_reporting();

$host = "localhost";
$dbUsername = "";
$dbPassword = "";
$dbname = "";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  
if (!$conn) {
  echo "Connection failed!";
}
?>

<!DOCTYPE html>
<html>
  <head>
      <title>
        Find-A-Doc Patient's Profile
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
        top: 100px;
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

    

h2{
  color: rgb(9, 52, 69);
  position: relative;
  top: 80px;
}


  </style>


      <div class = "banner">
          
      <h2>Patient's Profile</h2>
          <div class = "attribute">
            <label>Name:</label>
            <?php
              session_start();
              echo $_SESSION['patientname'];
            ?>
          </div>

          <div class = "attribute">
            <label>Email:</label>
            <?php
              echo $_SESSION['patientemail'];
            ?>
          </div> 
        </div> 
          

</div>
      </div>

  </body>
</html>