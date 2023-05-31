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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>
Booking Requests
  </title>
  <link rel="stylesheet">
  <link rel="stylesheet" href="doctorviewreq.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="navbar">
    <div class="logo">
      <h2><i class="fa fa-user-md"></i> Find-A-Doc</h2>
    </div>
    <ul class="navbar-links">
      <li><a href="HomePage.html"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="doctorprofile.php"><i class="fa fa-angle-left"></i> Back</a>
      <li><a href="plogout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
      </li> 
    </ul>
  </div>
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
            <td>
              <?php echo $patientName; ?>
            </td>
            <td>
              <?php echo $patientEmail; ?>
            </td>
            <td>
              <?php echo $date; ?>
            </td>
            <td>
              <?php echo $time; ?>
            </td>
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