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

if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];

  // Display the message
  echo "<script>alert('$message')</script>";

  // Clear the message from the session
  unset($_SESSION['message']);
}
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
  $query = "SELECT DISTINCT pname, frommail, date, time, requestId FROM requests WHERE tomail = '$email' AND status = 'Pending' ORDER BY date ASC, time ASC";
  $result = mysqli_query($conn, $query);
  ?>
  <div class="container">
    <h1>My Requests</h1>
    <table>
      <thead>
        <tr>
          <th>Patient name</th>
          <th>Email</th>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $patientName = $row['pname'];
          $patientEmail = $row['frommail'];
          $date = $row['date'];
          $time = $row['time'];
          $requestId = $row['requestId'];
          ?>
          <tr>
            <td><?php echo $patientName; ?></td>
            <td><?php echo $patientEmail; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $time; ?></td>
            <td>
              <form action="processrequest.php?requestId=<?php echo $requestId; ?>" method="post" class="action-buttons">
                <input type="submit" value="Accept" class="btn accept button" name="accept">
                <input type="submit" value="Reject" class="btn reject button" name="reject">
              </form>
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
