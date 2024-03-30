<?php

  error_reporting(0);

  use PHPMailer\PHPMailer\PHPMailer; 
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $doctorname = $_POST['doctorname'];
  $doctorlocation = $_POST['doctorlocation'];
  $doctoremail = $_POST['doctoremail'];
  $doctorpassword = $_POST['doctorpassword'];
  $doctorconfirm = $_POST['doctorconfirm'];
  $doctorcategory = $_POST['doctorcategory'];
  $doctorstatus = '0';
  

  function sendMail($doctoremail,$code)
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

    $mail->Body = "Dear doctor, Thank you for registering! Click the link to verify your email
                   <a href='http://localhost/Find-A-Doc/doctorverify.php?doctoremail=$doctoremail&code=$code'> Verify </a>";
                    
    $mail->addAddress($doctoremail);

    if($mail->Send()){
        return true;
    }else{
        return false;
    }

    $mail->smtpClose();
  }


  if(!empty($doctorname) && !empty($doctoremail) && !empty($doctorpassword) && !empty($doctorconfirm) && !empty($doctorlocation) &&  !empty($doctorcategory))
  {
    if (!filter_var($_POST['doctoremail'], FILTER_VALIDATE_EMAIL)) {
        
      //header("Location:"); //
      ?>      
      <script>alert("wrong email!")</script>
      <?php
      exit();


    }
    
    if (strlen($_POST['doctorpassword']) > 15 || strlen($_POST['doctorpassword']) < 8  || ctype_upper($_POST['doctorpassword']) || ctype_lower($_POST['doctorpassword']) || !preg_match("/[0-9]/", $_POST['doctorpassword'])) {
      //header("Location:"); //
      ?>      
      <script>alert("wrong password!")</script>
      <?php
      exit();


    }
  


    if($doctorpassword == $doctorconfirm)
    {
      $host = "localhost";
      $dbUsername = "";
      $dbPassword = "";
      $dbname = "";

      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

      
    
    $sql = "SELECT * FROM doctor WHERE doctoremail='$_POST[doctoremail]'";

    $res = mysqli_query($conn, $sql);



  if(mysqli_num_rows($res) > 0){

    $num_rows = mysqli_num_rows($res);
    echo "Number of rows: " . $num_rows;
    //header("Location:"); //
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
		    $hashPassword = password_hash($doctorpassword, PASSWORD_BCRYPT, $options);
       // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $INSERT= "INSERT Into doctor (doctorname, doctoremail, doctorpassword, code, doctorstatus, doctorlocation, doctorcategory) values ('$doctorname','$doctoremail', '$hashPassword', '$code', 0, '$doctorlocation', '$doctorcategory')";


        mysqli_query($conn, $INSERT );

        if($INSERT && sendMail($doctoremail,$code))
        {
          //header(""); //
          ?>      
          <script>alert("email sent!")</script>
          <?php
          exit();
        }
        $conn->close();
      }
    }
    else
    {
      //header("Location:"); //
      ?>      
      <script>alert("error!")</script>
      <?php
      exit();
    }
  }

  else
  {
    //header("Location:"); //
    ?>      
      <script>alert("error!")</script>
      <?php
      exit();
  }
?>
  