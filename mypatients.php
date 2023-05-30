<?php

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "findadoc";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();
$demail = $_SESSION['doctoremail'];

if (!$conn) {
  echo "Connection failed!";
} else {
  $queryfirst = "SELECT * FROM requests WHERE tomail = '$demail' AND status = 'a'";
  // $querysecond = "SELECT * FROM requests WHERE frommail = '$email' AND status = 'a'";
  $resultfirst = mysqli_query($conn, $queryfirst);
  // $resultsecond = mysqli_query($conn, $querysecond);
}

?>

<html>

<head>
  <title>

  </title>
  <link rel="stylesheet" href="dashboardtutor.css">
  <link rel="stylesheet" href="mypatients.css">
</head>

<body>

  <div class="container">
    <h1>My Patients</h1>
    <table>
      <thead>
        <tr>
          <th>Patient name</th>
          <th>Appointment Date</th>
          <th>Appointment time</th>

        </tr>
      </thead>
      <tbody>
        <?php
        if ($resultfirst) {
          while ($row = mysqli_fetch_array($resultfirst)) {
            $pmail = $row['frommail'];
            $queryy = "SELECT pname, date, time FROM requests WHERE frommail = '$pmail' and tomail = '$demail' AND status = 'a'";
            $resultt = mysqli_query($conn, $queryy);
            $pinfo1 = mysqli_fetch_array($resultt);

            ?>
            <tr>
              <td>
                <?php echo $pinfo1['pname']; ?>
              </td>
              <td>
                <?php echo $pinfo1['date']; ?>
              </td>
              <td>
                <?php echo $pinfo1['time']; ?>
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