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

    $query = "SELECT doctorstatus, code FROM doctor WHERE doctorstatus = 0 AND code = '$code' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if($result->num_rows == 1)
        {
            $update = "UPDATE doctor SET doctorstatus = 1 WHERE code = '$code' LIMIT 1";
            if (mysqli_query($conn, $update)){
                echo "Doctor Account created successfully! Click the link to complete login
                <a href='http://localhost/Find-A-Doc/doctorsigninpage.html'>Login </a>"; //
                exit;
        
            }
            else{
                
                //header(Location:"");//
                exit();
            }
        }
        else{
          //header(Location:"");//
          exit();
      
            
        }
    }

    else{
      //header(Location:"");//
      exit();
  
        
    }
}

else{
        
  header(Location:"");//
  exit();
}

?>