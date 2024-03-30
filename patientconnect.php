<?php

  error_reporting(0);

  use PHPMailer\PHPMailer\PHPMailer; 
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $patientname = $_POST['patientname'];
  $patientlocation = $_POST['patientlocation'];
  $patientemail = $_POST['patientemail'];
  $patientpassword = $_POST['patientpassword'];
  $patientconfirm = $_POST['patientconfirm'];
  $patientstatus = '0';
  

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

    $mail->Username = ""; 

    $mail->Password = ""; 

    $mail->isHTML(true);

    $mail->Subject = "Find A Doc - Verify Mail";

    $mail->setFrom(""); 

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


  if(!empty($patientname) && !empty($patientemail) && !empty($patientpassword) && !empty($patientconfirm))
  {
    if (!filter_var($_POST['patientemail'], FILTER_VALIDATE_EMAIL)) {
        
      header("Location:"); //
      exit();


    }
    
    if (strlen($_POST['patientpassword']) > 15 || strlen($_POST['patientpassword']) < 8  || ctype_upper($_POST['patientpassword']) || ctype_lower($_POST['patientpassword']) || !preg_match("/[0-9]/", $_POST['patientpassword'])) {
      header("Location:"); //
      exit();


    }
  


    if($patientpassword == $patientconfirm)
    {
      $host = "localhost";
      $dbUsername = "";
      $dbPassword = "";
      $dbname = "";

      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

      
    
    $sql = "SELECT * FROM patient WHERE patientemail='$_POST[patientemail]'";
    $res = mysqli_query($conn, $sql);

  if(mysqli_num_rows($res) > 0){
    header("Location:"); 
      exit();

  }

  

      $code = bin2hex(random_bytes(16));
      
      if (mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }

      else
      {
        $options = array("cost"=>4);
		    $hashPassword = password_hash($patientpassword, PASSWORD_BCRYPT, $options);
       // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $INSERT= "INSERT Into patient (patientname, patientemail, patientpassword, code, patientstatus) values ('$patientname', '$patientemail', '$hashPassword', '$code', 0)";


        mysqli_query($conn, $INSERT);

        if($INSERT && sendMail($patientemail,$code))
        {
          // echo `Email gese`; //
          ?>      
          <script>alert("Email sent successfully! Kindly check your email to verify your account!")</script>
          <?php
          exit();
        }
        $conn->close();
      }
    }
    else
    {
    
      ?>      
      <script>alert("error!")</script>
      <?php
      exit();
    }
  }
  else
  {
    header("Location:"); //
      exit();
  }
  ?>