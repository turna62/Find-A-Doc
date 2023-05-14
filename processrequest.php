<?php 

$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "findadoc";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

session_start();
$doctormail = $_SESSION['doctoremail'];
$pmail = $_GET['email'];

if (!$conn) {
	echo "Connection failed!";
}

if(isset($_POST['accept']))
{
  $update = "UPDATE requests SET status = 'a' WHERE frommail = '$pmail' AND tomail = '$doctormail'";
  $accepted = mysqli_query($conn, $update);

   

  header("Location: mypatients.php");
}

if(isset($_POST['reject']))
{
  $update = "UPDATE requests SET status = 'r' WHERE frommail = '$pmail' AND tomail = '$doctormail'";
  $rejected = mysqli_query($conn, $update);

  header("Location: doctorviewreq.php");
}

?>