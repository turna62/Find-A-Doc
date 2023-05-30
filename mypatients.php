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
  
  $queryUpcoming = "SELECT * FROM requests WHERE tomail = '$demail' AND status = 'Accepted' AND date > '$today' ORDER BY date ASC";
  $resultUpcoming = mysqli_query($conn, $queryUpcoming);

  $queryToday = "SELECT * FROM requests WHERE tomail = '$demail' AND status = 'Accepted' AND date = '$today' ORDER BY date ASC";
  $resultToday = mysqli_query($conn, $queryToday);

  $queryPast = "SELECT * FROM requests WHERE tomail = '$demail' AND status = 'Accepted' AND date < '$today' ORDER BY date ASC";
  $resultPast = mysqli_query($conn, $queryPast);
}

?>

<html>

<head>
  <title></title>

  <link rel="stylesheet" href="mypatients.css">
</head>

<body>

  <div class="container">
    <h1>My Patients</h1>

    <?php
    $countUpcoming = mysqli_num_rows($resultUpcoming);
    $countToday = mysqli_num_rows($resultToday);
    $countPast = mysqli_num_rows($resultPast);
    ?>

    

    <h3 class="appointment-count"> Today's appointments: <?php echo $countToday; ?></h3>
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
          $pmail = $row['frommail'];
          $queryy = "SELECT pname, date, time, dstatus, requestId FROM requests WHERE frommail = '$pmail' AND tomail = '$demail' AND status = 'Accepted' AND date = '$today'";
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
            <td>
              <?php if ($pinfo1['dstatus'] === 'Scheduled') : ?>
                <form action="markasdone.php" method="POST">
                  <input type="hidden" name="requestId" value="<?php echo $pinfo1['requestId']; ?>">
                  <button type="submit" class="mark-as-done-button">Mark as Done</button>
                </form>
              <?php elseif ($pinfo1['dstatus'] === 'Done') : ?>
                <span class="status-done">Done</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php
        }
        ?>



      </tbody>
    </table>



    <h3 class="appointment-count"> Upcoming appointments: <?php echo $countUpcoming; ?></h3>
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
          $pmail = $row['frommail'];
          $queryy = "SELECT pname, date, time, dstatus, requestId FROM requests WHERE frommail = '$pmail' AND tomail = '$demail' AND status = 'Accepted' AND date > '$today'";
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
            <td>
              <?php if ($pinfo1['dstatus'] === 'Scheduled') : ?>
                <form action="markasdone.php" method="POST">
                  <input type="hidden" name="requestId" value="<?php echo $pinfo1['requestId']; ?>">
                  <button type="submit" class="mark-as-done-button">Mark as Done</button>
                </form>
              <?php elseif ($pinfo1['dstatus'] === 'Done') : ?>
                <span class="status-done">Done</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php
        }
        ?>



      </tbody>
    </table>

    <h3 class="appointment-count"> Past appointments: <?php echo $countPast; ?></h3>
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
          $pmail = $row['frommail'];
          $queryy = "SELECT pname, date, time, dstatus, requestId FROM requests WHERE frommail = '$pmail' AND tomail = '$demail' AND status = 'Accepted' AND date > '$today'";
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
            <td>
              <?php if ($pinfo1['dstatus'] === 'Scheduled') : ?>
                <form action="markasdone.php" method="POST">
                  <input type="hidden" name="requestId" value="<?php echo $pinfo1['requestId']; ?>">
                  <button type="submit" class="mark-as-done-button">Mark as Done</button>
                </form>
              <?php elseif ($pinfo1['dstatus'] === 'Done') : ?>
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
