<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "findadoc";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();
$doctormail = $_SESSION['doctoremail'];
$requestId = $_GET['requestId'];

if (!$conn) {
  echo "Connection failed!";
}

if (isset($_POST['accept'])) {
  $requestId = $_GET['requestId'];

  // Retrieve the request information
  $query = "SELECT pname, date, time, frommail FROM requests WHERE requestId = '$requestId' AND status = 'Pending'";
  $result = mysqli_query($conn, $query);

  if ($result === false) {
    // Handle the query execution error
    die('Error executing the query: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_assoc($result);

  if ($row === null) {
    // Handle the case when no rows are returned
    die('No pending request found with the given ID');
  }

  $patientName = $row['pname'];
  $date = $row['date'];
  $time = $row['time'];
  $patientEmail = $row['frommail'];

  // Check if the doctor has already accepted a request for the same time slot
  $checkQuery = "SELECT COUNT(*) AS count, pname FROM requests WHERE date = '$date' AND time = '$time' AND status = 'Accepted' AND tomail = '$doctormail'";
  $checkResult = mysqli_query($conn, $checkQuery);

  if ($checkResult === false) {
    // Handle the query execution error
    die('Error executing the query: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_assoc($checkResult);

  if ($row === null) {
    // Handle the case when no rows are returned
    die('Error retrieving accepted requests count');
  }

  $acceptedCount = $row['count'];
  $patientName2 = $row['pname'];

  if ($acceptedCount >= 1) {
    // Set an error message in the session
    $_SESSION['message'] = "You have already accepted a request from $patientName2 for the selected time slot.";
    header("Location: doctorviewreq.php");
  } else {
    // Check if the time slot is already accepted by another doctor
    $checkQuery = "SELECT COUNT(*) AS count, pname, date, time FROM requests WHERE date = '$date' AND time = '$time' AND status = 'Accepted' AND tomail != '$doctormail'";
    $checkResult = mysqli_query($conn, $checkQuery);
  
    if ($checkResult === false) {
      // Handle the query execution error
      die('Error executing the query: ' . mysqli_error($conn));
    }
  
    $row = mysqli_fetch_assoc($checkResult);
  
    if ($row === null) {
      // Handle the case when no rows are returned
      die('Error retrieving accepted requests count');
    }
  
    $acceptedCount = $row['count'];
    $patientName3 = $row['pname'];
    $patientDate3 = $row['date'];
    $patientTime3 = $row['time'];
  
    if ($acceptedCount >= 1) {
      // Set an error message in the session
      $_SESSION['message'] = "Sorry! Another doctor has already accepted a request for $patientName3 on $patientDate3 at $patientTime3.";
      header("Location: doctorviewreq.php");
    } else {
    // Update the status of the selected request to "Accepted"
    $updateQuery = "UPDATE requests SET status = 'Accepted', dstatus = 'Scheduled' WHERE requestId = '$requestId' AND tomail = '$doctormail'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult === false) {
      // Handle the query execution error
      die('Error executing the query: ' . mysqli_error($conn));
    }

    // Set a success message in the session
    $_SESSION['message'] = "You have accepted the booking request for $patientName on $date at $time.";
    header("Location: mypatients.php");
  }
}
}



?>
