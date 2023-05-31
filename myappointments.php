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
  <link rel="stylesheet" href="myappointments.css">
</head>

<body>

  <?php
  $query = "SELECT DISTINCT pname, date, time, tomail, dstatus FROM requests WHERE pname = '$name' AND frommail = '$email' AND status = 'Accepted' ORDER BY date DESC, time DESC";
  $result = mysqli_query($conn, $query);

  ?>
  <div class="container">
    <h1>My Appointments</h1>
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
          $date = $row['date'];
          $time = $row['time'];
          $tomail = $row['tomail'];
          $dstatus = $row['dstatus'];

          ?>
          <tr>
            <td style="text-align: center;"><?php echo $date; ?></td>
            <td><?php echo $time; ?></td>
            <td><?php echo $tomail; ?></td>
            <td>
              <span class="dstatus <?php echo $dstatus; ?>">
                <?php echo $dstatus; ?>
              </span>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>
