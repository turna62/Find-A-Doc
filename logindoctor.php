<?php 

session_start(); 

$sname= "localhost";
$uname= "root";
$password = "";

$db_name = "findadoc";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

$doctoremail = $_POST['doctoremail'];
$doctorpassword = $_POST['doctorpassword'];
if (isset($doctoremail) && isset($doctorpassword)) {

		$sql = "SELECT * FROM doctor WHERE doctoremail = '$doctoremail'";
		
        $result = mysqli_query($conn, $sql);

		if ($result->num_rows == 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['doctorstatus'] == 1) {
				if( password_verify($doctorpassword, $row['doctorpassword'])){
				$_SESSION['doctoremail'] = $row['doctoremail'];
            	$_SESSION['doctorpassword'] = $row['doctorpassword'];
				$_SESSION['doctorname'] = $row['doctorname'];
				$_SESSION['doctorlocation'] = $row['doctorlocation'];
							
                header("Location: homepageloggedindoctor.php");
                exit();
				
            }
			else{
				
				?>      
          <script>alert("Wrong Password! Make sure to type in the correct password!")</script>
          <?php
          exit();
			}
		}else{
			?>      
          <script>alert("Doctor account not verified!")</script>
          <?php
          exit();
				
		        
			}
		}
		else{
			
			?>      
          <script>alert("No doctor account found!")</script>
          <?php
          exit();
		}
	
	}
	
else{
	
	?>      
          <script>alert("Doctor email and password fields must be filled to continue!")</script>
          <?php
          exit();
}

?>