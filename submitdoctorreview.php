<?php 
session_start();

$review = $_POST['review'];
$rpatientname = $_SESSION['patientname'];

require 'dbConfig.php'; 

if (!empty($review)){
    if(isset($_POST["submitreview"])){
        $sno = $_GET['docid'];

        // Check if the user is reviewing themselves
        $doctorQuery = "SELECT doctorid FROM doctor WHERE doctorid = '$sno' AND doctorname = '$rpatientname'";
        $doctorResult = mysqli_query($db, $doctorQuery);
        $doctorData = mysqli_fetch_assoc($doctorResult);

        if ($doctorData) {
            // User is reviewing themselves
            echo '<script>alert("You cannot review yourself as a doctor!")</script>';
        } else {
            // Check if the user has already reviewed this doctor
            $checkQuery = "SELECT COUNT(*) as count FROM reviews WHERE rpatientname = '$rpatientname' AND rdoctorid = '$sno'";
            $checkResult = mysqli_query($db, $checkQuery);
            $checkData = mysqli_fetch_assoc($checkResult);

            if ($checkData['count'] > 0) {
                // User has already reviewed this doctor
                echo '<script>alert("You have already reviewed this doctor!")</script>';
            } else {
                // Insert the new review
                $INSERT = "INSERT INTO `reviews` (`rpatientname`, `review`, `rdoctorid`) VALUES ('$rpatientname', '$review', '$sno')";
            
                if(mysqli_query($db, $INSERT))
                {
                    echo '<script>alert("Review Successful!")</script>';
                }
                else {
                    echo '<script>alert("Error while submitting review! Please try again!")</script>';
                }
            }
        }
    }
    else {
        echo '<script>alert("Must click the Post button to submit a review!")</script>';
    }
}
else {
    echo '<script>alert("Review field must be filled to submit a review!")</script>';
}

$db->close();
?>
