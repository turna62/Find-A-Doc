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
  $query = "SELECT DISTINCT pname, date, time, tomail, status, requestId FROM requests WHERE pname = '$name' AND frommail = '$email' ORDER BY date DESC, time DESC";
  $result = mysqli_query($conn, $query);
  ?>
  <div class="container">
    <h1>My Requests</h1>
    <table>
      <thead>
        <tr>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Doctor Contact</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $date = $row['date'];
          $time = $row['time'];
          $tomail = $row['tomail'];
          $status = $row['status'];
          $requestId = $row['requestId'];
          ?>
          <tr>
            <td style="text-align: center;">
              <?php echo $date; ?>
            </td>
            <td>
              <?php echo $time; ?>
            </td>
            <td>
              <?php echo $tomail; ?>
            </td>
            <td>
              <span class="status <?php echo $status; ?>">
                <?php echo $status; ?>
              </span>
              </td>
              <td>
              <?php
              if ($status == 'Rejected') {
                ?>
                 <a href="reschedule.php?requestId=<?php echo $requestId; ?>" class="mark-as-done-button" >Reschedule</a>
                <?php
              }
              ?>
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
