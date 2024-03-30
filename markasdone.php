<?php

$sname = "localhost";
$uname = "";
$password = "";

$db_name = "";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

if(isset($_POST['requestId'])) {
  $requestId = $_POST['requestId'];

  // Update the record in the database
  $updateQuery = "UPDATE requests SET dstatus = 'Done' WHERE requestId = '$requestId'";
  $result = mysqli_query($conn, $updateQuery);

  if ($result) {
    
    header("Location: mypatients.php");
    exit();
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

?>
