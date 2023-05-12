<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

if (mysqli_connect_error()) {
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

function sendMail($tomail, $requestId) {
    require ("PHPMailer/PHPMailer.php"); 
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "find.a.doc.983@gmail.com"; 
    $mail->Password = "sgkmuthnxgpwuuxt"; 
    $mail->isHTML(true);
    $mail->Subject = "Find A Doc - Verify Mail";
    $mail->setFrom("find.a.doc.983@gmail.com"); 
    $mail->Body = "Dear doctor, you have a booking request! Click the link to accept or decline http://localhost/Find-A-Doc/acceptreject.php?tomail=$tomail&id=$requestId> "
                   ;
    $mail->addAddress($tomail);

    if($mail->Send()){
        return true;
    }else{
        return false;
    }
    $mail->smtpClose();
}

if(!empty($tomail) && !empty($date) && !empty($time)) {
    $q = "SELECT * FROM requests WHERE frommail = '$frommail' AND tomail = '$tomail' and date ='$date' and time='$time'";
    $res = mysqli_query($conn, $q);

    if(mysqli_num_rows($res) > 0) {
        $num_rows = mysqli_num_rows($res);
        echo "Number of rows: " . $num_rows;
        exit();
    }
    else {
        $query = "INSERT INTO requests (frommail, tomail, status, date, time) values ('$frommail', '$tomail', 'p', '$date', '$time')";
        $result = mysqli_query($conn, $query);
        $requestId = mysqli_insert_id($conn);
  
        if($result && sendMail($tomail, $requestId)) {
            ?>      
            <script>alert("email gese!")</script>
            <?php
            exit();
        }
        else {
            echo "Error";
        }
    }
}
?>
