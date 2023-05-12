<?php

use PHPMailer\PHPMailer\PHPMailer; 
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "findadoc";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$tomail = $_POST['email'];

session_start();
$frommail = $_SESSION['email']; 

if (mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

function sendMail($patientemail,$code)
  {
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

    $mail->Body = "Dear patient, Thank you for registering! Click the link to verify your email
                   <a href='http://localhost/Find-A-Doc/patientverify.php?patientemail=$patientemail&code=$code'> Verify </a>";
    $mail->addAddress($patientemail);

    if($mail->Send()){
        return true;
    }else{
        return false;
    }

    $mail->smtpClose();
  }


$q = "SELECT * FROM requests WHERE frommail = '$frommail' AND tomail = '$tomail'";
$found = mysqli_query($conn, $q);
if ($found->num_rows > 0)
{
  echo "Request already sent.";
}

else
{
    $query = "INSERT INTO requests (frommail, tomail, status) values ('$frommail', '$tomail', 'p')";
    $result = mysqli_query($conn, $query);
  
    if($result)
    {
        header("Location: .php?email=$tomail");
    }
    else{
        echo "Error";
    }
}

?>