<?php


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "findadoc";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$tomail = $_POST['tomail'];
$date = $_POST['date'];
$time = $_POST['time'];


session_start();
$frommail = $_SESSION['patientemail'];
$pname = $_SESSION['patientname'];

if (mysqli_connect_error()) {
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}



if(!empty($tomail) && !empty($date) && !empty($time)) {
    $q = "SELECT * FROM requests WHERE frommail = '$frommail' AND tomail = '$tomail' and date ='$date' and time='$time'";
    $res = mysqli_query($conn, $q);

    if(mysqli_num_rows($res) > 0) {
        $num_rows = mysqli_num_rows($res);
        echo "Number of rows: " . $num_rows;
        echo "request already sent";
        exit();
    }
    else {
        $query = "INSERT INTO requests (frommail, tomail, status, date, time, pname) values ('$frommail', '$tomail', 'Pending', '$date', '$time', '$pname')";
        $result = mysqli_query($conn, $query);
        //$requestId = mysqli_insert_id($conn);
  
        if($result) {
            ?>      
            <script>alert("Request sent successfully!")</script>

            <?php
            exit();
        }
        else {
            echo "Error";
        }
    }
}
?>



