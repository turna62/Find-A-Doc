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

$did = $_GET['docid'];


if ($tomail == $frommail) {
    ?>
    <script>alert("You cannot request an appointment with yourself!")</script>
    <?php
    exit();
}

$checkQuery1 = "SELECT * FROM doctor WHERE doctorid = '$did' AND doctoremail = '$tomail'";
$checkResult1 = mysqli_query($conn, $checkQuery1);

if (!$checkResult1) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}

if (mysqli_num_rows($checkResult1) == 0) {
    $doctorEmail = ''; 
    $getDoctorEmailQuery = "SELECT doctoremail FROM doctor WHERE doctorid = '$did'";
    $doctorEmailResult = mysqli_query($conn, $getDoctorEmailQuery);

    if ($doctorEmailResult && mysqli_num_rows($doctorEmailResult) > 0) {
        $doctorData = mysqli_fetch_assoc($doctorEmailResult);
        $doctorEmail = $doctorData['doctoremail'];
    }

    echo "<script>alert('Please choose the correct email for the selected doctor! The correct email is: " . $doctorEmail . "')</script>";
    exit();
}

// Check if the appointment already exists and is accepted
$checkQuery = "SELECT * FROM requests WHERE tomail = '$tomail' AND date = '$date' AND time = '$time' AND status = 'Accepted'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // The appointment already exists and is accepted
 

    ?>
    <script>alert("The appointment for the selected day and time has already been accepted. Please choose a different time!")</script>
    <?php
    exit();
} else {
    // The appointment doesn't exist or is not accepted, proceed with sending the request
    if (!empty($tomail) && !empty($date) && !empty($time)) {
        $q = "SELECT * FROM requests WHERE frommail = '$frommail' AND tomail = '$tomail' and date ='$date' and time='$time'";
        $res = mysqli_query($conn, $q);

        if (mysqli_num_rows($res) > 0) {
            $num_rows = mysqli_num_rows($res);
            ?>
            <script>alert("Request already sent!")</script>
            <?php
            
            exit();
        } else {
            $query = "INSERT INTO requests (frommail, tomail, status, date, time, pname) values ('$frommail', '$tomail', 'Pending', '$date', '$time', '$pname')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                ?>
                <script>alert("Request sent successfully!")</script>
                <?php
                
            header("Location: patientviewreq.php");
                exit();
            } else {
                echo "Error";
            }
        }
    }
}
?>
