<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "findadoc";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) {
  die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}

session_start();
$email = $_SESSION['patientemail'];
$name = $_SESSION['patientname'];
?>

<html>

<head>
  <title>

  </title>
  <link rel="stylesheet">
  <link rel="stylesheet" href="patientviewreq.css">
</head>

<body>




  <?php
  $query = "SELECT * FROM requests WHERE pname = '$name'and frommail = '$email'";
  $result = mysqli_query($conn, $query);
  ?>
  <div class="container">
    <h1>My Requests</h1>
    <table>
      <thead>
        <tr>
          <th>Appointment Date</th>
          <th>Appointment time</th>
          <th>Doctor Contact</th>
          <th>Status</th>

        </tr>
      </thead>
      <tbody>
        <?php

        while ($row = mysqli_fetch_array($result)) {
          $requester = $row['tomail'];
          //echo $requester;
        
          $query2 = "SELECT pname, date, time, tomail, status FROM requests WHERE tomail = '$requester' and frommail = '$email' ";
          $result2 = mysqli_query($conn, $query2);

          if (!$result2) {
            // Handle the error
            echo "Error: " . mysqli_error($conn);
          } else {
            $patientinfo = mysqli_fetch_array($result2);
            ?>

            <tr>
             
              <td style="text-align: center;">
                <?php echo $patientinfo['date']; ?>
              </td>
              <td>
                <?php echo $patientinfo['time']; ?>
              </td>
              <td>
                <?php echo $patientinfo['tomail']; ?>
              </td>
             
              <td>
              <span class="status <?php echo $patientinfo['status']; ?>">
              <?php echo $patientinfo['status']; ?>
              </span>
              </td>


            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>