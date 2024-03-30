<?php

$sname = "localhost";
$uname = "";
$password = "";
$db_name = "";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();
$doctormail = $_SESSION['doctoremail'];
$requestId = $_GET['requestId'];

if (!$conn) {
  echo "Connection failed!";
}

if (isset($_POST['accept'])) { 
  $requestId = $_GET['requestId'];

  
  $query = "SELECT pname, date, time, frommail FROM requests WHERE requestId = '$requestId' AND status = 'Pending'";
  $result = mysqli_query($conn, $query);

  if ($result === false) {
    die('Error executing the query: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_assoc($result);

  if ($row === null) {
    die('No pending request found with the given ID');
  }

  $patientName = $row['pname'];
  $date = $row['date'];
  $time = $row['time'];
  $patientEmail = $row['frommail'];

  $checkQuery = "SELECT COUNT(*) AS count, pname FROM requests WHERE date = '$date' AND time = '$time' AND status = 'Accepted' AND tomail = '$doctormail'";
  $checkResult = mysqli_query($conn, $checkQuery);

  if ($checkResult === false) {
    die('Error executing the query: ' . mysqli_error($conn));
  }

  $row = mysqli_fetch_assoc($checkResult);

  if ($row === null) {
    die('Error retrieving accepted requests count');
  }

  $acceptedCount = $row['count'];
  $patientName2 = $row['pname'];

  if ($acceptedCount >= 1) {
    $_SESSION['message'] = "You have already accepted a request from $patientName2 for the selected time slot.";
    header("Location: doctorviewreq.php");
  } else {
    // Check if the doctor has already accepted a request from the same patient for the same day
    $checkQuery = "SELECT COUNT(*) AS count, pname, time FROM requests WHERE date = '$date' AND status = 'Accepted' AND tomail = '$doctormail' AND frommail = '$patientEmail'";
    $checkResult = mysqli_query($conn, $checkQuery);
  
    if ($checkResult === false) {
    
      die('Error executing the query: ' . mysqli_error($conn));
    }
  
    $row = mysqli_fetch_assoc($checkResult);
  
    if ($row === null) {
      die('Error retrieving accepted requests count');
    }
  
    $acceptedCount = $row['count'];
    $patientName3 = $row['pname'];
    $patientTime3 = $row['time'];
  
    if ($acceptedCount >= 1) {
      $_SESSION['message'] = "Sorry! You have already accepted a request from $patientName3 for a different time slot on the same day.";
      header("Location: doctorviewreq.php");
    } else {
    // Check if the time slot is already accepted by another doctor
    $checkQuery = "SELECT COUNT(*) AS count, pname, date, time FROM requests WHERE date = '$date' AND time = '$time' AND status = 'Accepted' AND tomail != '$doctormail'";
    $checkResult = mysqli_query($conn, $checkQuery);
  
    if ($checkResult === false) {
    
      die('Error executing the query: ' . mysqli_error($conn));
    }
  
    $row = mysqli_fetch_assoc($checkResult);
  
    if ($row === null) {
      
      die('Error retrieving accepted requests count');
    }
  
    $acceptedCount = $row['count'];
    $patientName3 = $row['pname'];
    $patientDate3 = $row['date'];
    $patientTime3 = $row['time'];
  
    if ($acceptedCount >= 1) {
      $_SESSION['message'] = "Sorry! Another doctor has already accepted a request for $patientName3 on $patientDate3 at $patientTime3.";
      header("Location: doctorviewreq.php");
    } else {
    
    $updateQuery = "UPDATE requests SET status = 'Accepted', dstatus = 'Scheduled' WHERE requestId = '$requestId' AND tomail = '$doctormail'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult === false) {
      
      die('Error executing the query: ' . mysqli_error($conn));
    }

  
   // $_SESSION['message'] = "You have accepted the booking request for $patientName on $date at $time.";
    header("Location: mypatients.php");
  }
}
}
}

if(isset($_POST['reject']))
{
  $update = "UPDATE requests SET status = 'Rejected' WHERE requestId = '$requestId' AND tomail = '$doctormail'";
  $rejected = mysqli_query($conn, $update);

  header("Location: doctorviewreq.php");
}



?>
