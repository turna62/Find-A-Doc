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
$email = $_SESSION['doctoremail'];
?>

<html>

<head>
  <title>

  </title>
  <link rel="stylesheet">
  <link rel="stylesheet" href="doctorviewreq.css">
</head>

<body>

  <?php
  $query = "SELECT * FROM requests WHERE tomail = '$email' AND status = 'p'";
  $result = mysqli_query($conn, $query);
  ?>
  <h1>My Requests</h1>
  <table>
    <thead>
      <tr>
        <th>Patient name</th>
        <th>Email</th>
        <th>Appointment Date</th>
        <th>Appointment time</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php

      while ($row = mysqli_fetch_array($result)) {
        $requester = $row['frommail'];
        //echo $requester;
      
        $query2 = "SELECT pname, date, time FROM requests WHERE frommail = '$requester' and tomail = '$email' AND status = 'p' ";
        $result2 = mysqli_query($conn, $query2);

        if (!$result2) {
          // Handle the error
          echo "Error: " . mysqli_error($conn);
        } else {
          $patientinfo = mysqli_fetch_array($result2);
          ?>
          <tr>
            <td>
              <?php echo $patientinfo['pname']; ?>
            </td>
            <td class="amount">
              <?php echo $requester; ?>
            </td>
            <td>
              <?php echo $patientinfo['date']; ?>
            </td>
            <td>
              <?php echo $patientinfo['time']; ?>
            </td>
            <td>
              <form action="processrequest.php?email=<?php echo $requester; ?>" method="post" class="action-buttons">
                <button type="submit" class="btn accept">Accept</button>
                <button type="submit" class="btn reject">Reject</button>
              </form>
            </td>

          </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
  <!--<div class="info">
        <label id="institution" style="font-weight:bold;">Patient Name</label> <label
          style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label>
          <?php echo $patientinfo['pname']; ?>
        </label><br>
        <label id="institution" style="font-weight:bold;">Appointment Date</label> <label
          style="margin-left:9px; margin-right:4px; font-weight:bold;">:</label> <label>
          <?php echo $patientinfo['date']; ?>
        </label><br>
        <label id="availability" style="font-weight:bold;">Appointment Time</label> <label
          style="margin-left:5px; margin-right:4px; font-weight:bold;">:</label> <label>
          <?php echo $patientinfo['time']; ?>
        </label><br>

        <div class="inputfield">

          <form action="processrequest.php?email=<?php echo $requester; ?>" method="post">
            <input type="submit" value="Accept" class="btn" name="accept">
            <input type="submit" value="Reject" class="btn" name="reject">
          </form>
        </div>-->
  <?php


  ?>


</body>

</html>