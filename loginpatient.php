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

$patientemail = $_POST['patientemail'];
$patientpassword = $_POST['patientpassword'];
if (isset($patientemail) && isset($patientpassword)) {

		$sql = "SELECT * FROM patient WHERE patientemail = '$patientemail'";
		
        $result = mysqli_query($conn, $sql);

		if ($result->num_rows == 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['patientstatus'] == 1) {
				if( password_verify($patientpassword, $row['patientpassword'])){
				$_SESSION['patientemail'] = $row['patientemail'];
            	$_SESSION['patientpassword'] = $row['patientpassword'];
				$_SESSION['patientname'] = $row['patientname'];
				$_SESSION['patientlocation'] = $row['patientlocation'];
							
                header("Location: hppatient.php");
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
          <script>alert("Patient account not verified!")</script>
          <?php
          exit();
				
		        
			}
		}
		else{
			
			?>      
          <script>alert("No patient account found!")</script>
          <?php
          exit();
		}
	
	}
	
else{
	
	?>      
          <script>alert("Patient email and password fields must be filled to continue!")</script>
          <?php
          exit();
}

?>