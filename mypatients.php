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
  $today = date('Y-m-d');

  $queryUpcoming = "SELECT DISTINCT pname, date, time, dstatus, requestId FROM requests WHERE tomail = '$demail' AND status = 'Accepted' AND date > '$today' ORDER BY date ASC, time ASC";
  $resultUpcoming = mysqli_query($conn, $queryUpcoming);

  $queryToday = "SELECT DISTINCT pname, date, time, dstatus, requestId FROM requests WHERE tomail = '$demail' AND status = 'Accepted' AND date = '$today' ORDER BY date ASC, time ASC";
  $resultToday = mysqli_query($conn, $queryToday);

  $queryPast = "SELECT DISTINCT pname, date, time, dstatus, requestId FROM requests WHERE tomail = '$demail' AND status = 'Accepted' AND date < '$today' ORDER BY date ASC, time ASC";
  $resultPast = mysqli_query($conn, $queryPast);
}

?>

<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>My Patients</title>

  <link rel="stylesheet" href="mypatients.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="navbar">
    <div class="logo">
      <h2><i class="fa fa-user-md"></i> Find-A-Doc</h2>
      <h2><i class="fa fa-user-md"></i> Find-A-Doc</h2>
    </div>
    <ul class="navbar-links">
      <li><a href="HomePage.html"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="plogout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
      <li><a href="HomePage.html"><i class="fa fa-home"></i> Home</a></li>

      <li><a href="plogout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
      </li>
    </ul>
  </div>
  <div class="container">
    <h1>My Patients</h1>

    <?php
    $countUpcoming = mysqli_num_rows($resultUpcoming);
    $countToday = mysqli_num_rows($resultToday);
    $countPast = mysqli_num_rows($resultPast);
    ?>



    <h3 class="appointment-count"> Today's appointments:
      <?php echo $countToday; ?>
    </h3>
    <table>
      <thead>
        <tr>
          <th>Patient name</th>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($resultToday)) {


          ?>
          <tr>
            <td>
              <?php echo $row['pname']; ?>
            </td>
            <td>
              <?php echo $row['date']; ?>
            </td>
            <td>
              <?php echo $row['time']; ?>
            </td>
            <td>
              <?php if ($row['dstatus'] === 'Scheduled'): ?>
                <form action="markasdone.php" method="POST">
                  <input type="hidden" name="requestId" value="<?php echo $row['requestId']; ?>">
                  <button type="submit" class="mark-as-done-button">Mark as Done</button>
                </form>
              <?php elseif ($row['dstatus'] === 'Done'): ?>
                <span class="status-done">Done</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php
        }
        ?>



      </tbody>
    </table>



    <h3 class="appointment-count"> Upcoming appointments:
      <?php echo $countUpcoming; ?>
    </h3>
    <table>
      <thead>
        <tr>
          <th>Patient name</th>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($resultUpcoming)) {


          ?>
          <tr>
            <td>
              <?php echo $row['pname']; ?>
            </td>
            <td>
              <?php echo $row['date']; ?>
            </td>
            <td>
              <?php echo $row['time']; ?>
            </td>
            <td>
              <?php if ($row['dstatus'] === 'Scheduled'): ?>
                <form action="markasdone.php" method="POST">
                  <input type="hidden" name="requestId" value="<?php echo $row['requestId']; ?>">
                  <button type="submit" class="mark-as-done-button">Mark as Done</button>
                </form>
              <?php elseif ($row['dstatus'] === 'Done'): ?>
                <span class="status-done">Done</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php
        }
        ?>



      </tbody>
    </table>

    <h3 class="appointment-count"> Past appointments:
      <?php echo $countPast; ?>
    </h3>
    <table>
      <thead>
        <tr>
          <th>Patient name</th>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($resultPast)) {

          ?>
          <tr>
            <td>
              <?php echo $row['pname']; ?>
            </td>
            <td>
              <?php echo $row['date']; ?>
            </td>
            <td>
              <?php echo $row['time']; ?>
            </td>
            <td>
              <?php if ($row['dstatus'] === 'Scheduled'): ?>
                <form action="markasdone.php" method="POST">
                  <input type="hidden" name="requestId" value="<?php echo $row['requestId']; ?>">
                  <button type="submit" class="mark-as-done-button">Mark as Done</button>
                </form>
              <?php elseif ($row['dstatus'] === 'Done'): ?>
                <span class="status-done">Done</span>
              <?php endif; ?>
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