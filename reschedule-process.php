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
$frommail = $_SESSION['patientemail'];
$pname = $_SESSION['patientname'];

// Retrieve the submitted requestId
$requestId = $_POST['requestId'];
$date = $_POST['date'];
$time = $_POST['time'];
// Fetch the tomail, date, and time from the about-to-be-deleted request
$selectQuery = "SELECT tomail, date, time FROM requests WHERE requestId = '$requestId' AND status = 'Rejected'";
$selectResult = mysqli_query($conn, $selectQuery);

if ($selectResult && mysqli_num_rows($selectResult) > 0) {
    $row = mysqli_fetch_assoc($selectResult);
    $tomail = $row['tomail'];
    $oldDate = $row['date'];
    $oldTime = $row['time'];

    // Check if the new request has the same date and time as the about-to-be-deleted request
    if ($date === $oldDate && $time === $oldTime) {
        ?>
        <script>alert("The rescheduled request has the same date and time as the previous request! Kindly change it.")</script>
        <?php
        exit();
    }

    // Perform the remaining constraint checking here
   

    // Check if the appointment already exists and is accepted
    $checkQuery = "SELECT * FROM requests WHERE tomail = '$tomail' AND date = '$date' AND time = '$time' AND status = 'Accepted'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // The appointment already exists and is accepted
        ?>
        <script>alert("The appointment for the selected day and time has already been accepted. Please choose a different time!")</script>
        <?php
        exit();
    }

    $checkBookingCountQuery = "SELECT COUNT(*) as bookingCount FROM requests WHERE tomail = '$tomail' AND date = '$date' AND time = '$time' AND status != 'Rejected'";
    $checkBookingCountResult = mysqli_query($conn, $checkBookingCountQuery);

    if ($checkBookingCountResult && mysqli_num_rows($checkBookingCountResult) > 0) {
        $bookingCountData = mysqli_fetch_assoc($checkBookingCountResult);
        $bookingCount = $bookingCountData['bookingCount'];

        if ($bookingCount >= 3) {
            ?>
            <script>alert("This time slot is fully booked! Please choose a different time.")</script>
            <?php
            exit();
        }
    }

    // Delete the rejected request
    $deleteQuery = "DELETE FROM requests WHERE requestId = '$requestId' AND status = 'Rejected'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Process the rescheduled request
        if (!empty($_POST['date']) && !empty($_POST['time'])) {
            $date = $_POST['date'];
            $time = $_POST['time'];

            // Insert the new rescheduled request
            $insertQuery = "INSERT INTO requests (frommail, tomail, status, date, time, pname) values ('$frommail', '$tomail', 'Pending', '$date', '$time', '$pname')";
            $insertResult = mysqli_query($conn, $insertQuery);

            if ($insertResult) {
                echo "<script>alert('Request rescheduled successfully.');</script>";
                header("Location: patientviewreq.php");
                // Additional code for successful rescheduling
            } else {
                echo "<script>alert('Error rescheduling the request. Please try again later.');</script>";
                // Additional code to handle the rescheduling failure case
            }
        } else {
            echo "<script>alert('Error: Invalid rescheduled date and time.');</script>";
            // Additional code to handle invalid date and time case
        }
    } else {
        echo "<script>alert('Error deleting rejected request. Please try again later.');</script>";
        // Additional code to handle the deletion failure case
    }
} else {
    echo "<script>alert('Error: Failed to fetch the about-to-be-deleted request.');</script>";
    // Additional code to handle the fetching failure case
}

mysqli_close($conn);
?>
