<?php

  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "findadoc";
  
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if (mysqli_connect_error())
  {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }

  session_start();
  $email = $_SESSION['patientemail'];
  $name = $_SESSION['patientname'];
?>

<html>
  <head>
      <title>
    
      </title>
      <link rel = "stylesheet" >
  </head>
  <body>
    
  
      
      <h1>My Appointments</h1>
        <?php
          $query = "SELECT * FROM requests WHERE pname = '$name'and frommail = '$email' AND status = 'a'";
          $result = mysqli_query($conn, $query);

          while($row = mysqli_fetch_array($result))
          {
            $requester = $row['tomail'];
            //echo $requester;

            $query2 = "SELECT pname, date, time, tomail FROM requests WHERE tomail = '$requester' and frommail = '$email' AND status = 'a' ";
            $result2 = mysqli_query($conn, $query2);
            
    if (!$result2) {
        // Handle the error
        echo "Error: " . mysqli_error($conn);
      } else{
            $patientinfo = mysqli_fetch_array($result2);
         ?>
                  <div class = "info">
                  <!-- <label id = "institution" style="font-weight:bold;">Patient Name</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $patientinfo['pname'];?></label><br> -->
                  <label id = "institution" style="font-weight:bold;">Appointment Date</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $patientinfo['date'];?></label><br>
                  <label id = "availability" style="font-weight:bold;">Appointment Time</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $patientinfo['time'];?></label><br>
                  <label id = "availability" style="font-weight:bold;">Doctor Contact</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $patientinfo['tomail'];?></label><br>
                  

                  
                  </div>
          <?php  
          }
        }
        ?>
      </div>
        </div>
  </body>

</html>