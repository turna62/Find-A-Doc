<?php

  $sname= "localhost";
  $uname= "root";
  $password = "";
  
  $db_name = "findadoc";
  
  $conn = mysqli_connect($sname, $uname, $password, $db_name);

  session_start();
  $demail = $_SESSION['doctoremail'];

  if (!$conn) {
    echo "Connection failed!";
  }
  else
  {
    $queryfirst = "SELECT * FROM requests WHERE tomail = '$demail' AND status = 'a'";
   // $querysecond = "SELECT * FROM requests WHERE frommail = '$email' AND status = 'a'";
    $resultfirst = mysqli_query($conn, $queryfirst);
   // $resultsecond = mysqli_query($conn, $querysecond);
  }

?>

<html>
  <head>
      <title>
        Project Intuition
      </title>
      <link rel = "stylesheet" href = "dashboardtutor.css">
  </head>
  <body>
    
   
           

        <div class = "wrapper">
        <div class = "title">
            <h1>My patients</h1>
       </div>
      <div class="content">
        <?php
        if($resultfirst)
        {
          while($row = mysqli_fetch_array($resultfirst))
          {
            $pmail = $row['frommail'];
            $queryy = "SELECT pname, date, time FROM requests WHERE frommail = '$pmail' and tomail = '$demail' AND status = 'a'";
            $resultt = mysqli_query($conn, $queryy);
            $pinfo1 = mysqli_fetch_array($resultt);
            
            ?>
            <div class = "info">
            <label id = "institution" style="font-weight:bold;">Patient Name</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $pinfo1['pname'];?></label><br>
                  <label id = "institution" style="font-weight:bold;">Appointment Date</label> <label style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label> <?php echo $pinfo1['date'];?></label><br>
                  <label id = "availability" style="font-weight:bold;">Appointment Time</label> <label style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label><?php echo $pinfo1['time'];?></label><br>
          </div>
            <?php
          }
        }
        ?>
       


  </body>

</html>