<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .ancr{
    text-decoration: none;
    color: black;
  }
  </style>
<body>
  
<?php


  $sname= "localhost";
  $uname= "";
  $password = "";
  
  $db_name = "";
  
  $conn = mysqli_connect($sname, $uname, $password, $db_name);
  
 if (!$conn) {
    echo "Connection failed!";
  }
  
  if (isset($_POST['query'])) {
    $query = "SELECT doctorname, doctorlocation, doctorcategory, doctorid FROM doctor WHERE doctorname LIKE '{$_POST['query']}%' OR doctorlocation LIKE '{$_POST['query']}%' OR doctorlocation LIKE '{$_POST['query']}%'  LIMIT 100";
  
    $result = mysqli_query($conn, $query);
    

    
    $check_doctor = mysqli_num_rows($result) > 0;
    // if($check_user){
    //   while($row = mysqli_fetch_assoc($query_run)){
    //     $sno = $row['restaurantid'];
    //   }
    // }
    if($check_doctor)
      {
        $row_cnt = $result->num_rows;
    echo "<div class='alert alert-success mt-3 text-center' role='alert'>$row_cnt doctor(s) found! </div>";
        while($row = mysqli_fetch_assoc($result))
        {
          
          
         $sno = $row['doctorid'];
         
               
        
      
    
  
        
          
        

        
        echo  '<a class="ancr" href="searchresult.php?docid='.$sno.'">' . $row['doctorname'] . ','. ' '.$row['doctorlocation']. ','. ' '.$row['doctorcategory'].'<br /></a>';
       
  
      
        }
    }
  }
    else{
      echo "
    <div class='alert alert-danger mt-3 text-center' role='alert'>
        No doctor found!
    </div>
    ";
    }
      




?>
</body>
</html>

