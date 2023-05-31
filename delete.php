<?php
session_start();


if (isset($_GET['requestId'])) {
    $requestId = $_GET['requestId'];

    $sname = "localhost";
    $uname = "root";
    $password = "";
    $db_name = "findadoc";
    
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $deleteQuery = "DELETE FROM requests WHERE requestId = '$requestId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);
    
    if ($deleteResult) {

        //$_SESSION['message'] = "Request deleted successfully!";
    } else {
        // Error occurred while deleting the request
        $_SESSION['message'] = "Error deleting the request: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
    // Redirect back to the original page after the deletion
    header("Location: patientviewreq.php");
    exit();
} else {
    // Invalid or missing requestId parameter
    $_SESSION['message'] = "Invalid request!";
   // header("Location: original_page.php");
    exit();
}
?>
