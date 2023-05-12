<?php

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