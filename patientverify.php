<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "findadoc";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

if(isset($_GET['code']))
{
    $code = $_GET['code'];

    $query = "SELECT patientstatus, code FROM patient WHERE patientstatus = 0 AND code = '$code' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if($result->num_rows == 1)
        {
            $update = "UPDATE patient SET status = 1 WHERE code = '$code' LIMIT 1";
            if (mysqli_query($conn, $update)){
                echo "Patient Account created successfully! Click the link to complete login
                <a href='http://localhost//patientsigninpage.html'>Login </a>"; //
                exit;
                
				
            }
            else{
                
                header(Location:"");//
                exit();
            }
        }
        else{
          header(Location:"");//
          exit();
      
            
        }
    }

    else{
      header(Location:"");//
      exit();
  
        
    }
}

else{
        
  header(Location:"");//
  exit();
}

?>