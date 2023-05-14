<?php 
session_start();

$review = $_POST['review'];
$rpatientname = $_SESSION['patientname'];

require 'dbConfig.php'; 

if (!empty($review)){
    if(isset($_POST["submitreview"])){
        $sno = $_GET['docid'];
      
        $INSERT = "INSERT INTO `reviews` (`rpatientname`, `review`, `reviewid`) VALUES ('$_SESSION[patientname]', '$review', '".$sno."')";
        
        echo "Query: " . $INSERT;
      
        if(mysqli_query($db, $INSERT))
        {
            ?>      
            <script>alert("Review Successful!")</script>
            <?php
        }
        else {
            ?>      
            <script>alert("Error while submitting review! Please try again!")</script>
            <?php
            exit();
        }
    }
    else {
        ?>      
        <script>alert("Must click the Post button to submit a review!")</script>
        <?php
        exit();
    }
}
else {
    ?>      
    <script>alert("Review field must be filled to submit a review!")</script>
    <?php
    exit();
}
$db->close();
