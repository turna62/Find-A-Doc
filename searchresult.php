<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- Bootstrap CSS -->

<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

    <title>Search Doctors</title>
</head>

<style>

@import url("https://fonts.googleapis.com/css??family=Poppins:wght@400;500;600;700&display=swap");

body{
    background-color: rgb(50, 146, 184);
    overflow-x: hidden;
}

.wholefix {
    display: flex;
    justify-content: center;
  }
  
  .cardfix {
    width: 80%;
    margin-top: 30px;
    margin-bottom: 30px;
  }
  
.col-md-3 {
    flex-basis: 23%;
    margin-bottom: 30px;
  }
  
.card{
  border: none;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease-in-out;
    background-color: #fff;
    position: relative;
    left: 10px;
    top: 10px;
    width: 25%;
}
.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    transform: translateY(-1px) scale(1.03);
  }
  
  .card-body {
    padding: 20px;
    position: relative;
    bottom: 20px;
  }
  
  .card-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #141414;
  }
  
  .card-text {
    font-size: 16px;
    margin-bottom: 10px;
    color: #555;
  }
  

h2 {
    font-size: 2rem;
    color: #ffffff;
    /* Set the heading color to white */
    margin-top: 0;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    padding: 15px;
    background-color: rgb(9, 52, 69);
    background-repeat: no-repeat;
    background-position: center;
    width: 100%;
    position: relative;
    right: 10px;
    bottom: 10px;
  }

  .cbtnn1,
.cbtnn2,
.cbtnn3 {
  display: block;
  width: 90%;
  padding: 8px 12px;
  margin-bottom: 10px;
  border: none; 
  border-radius: 4px;
  text-align: center;
  text-decoration: none;
  background-color: rgb(9, 52, 69);
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  position: relative;
  top: 20px;
}

.cbtnn1:hover,
.cbtnn2:hover,
.cbtnn3:hover {
  background-color: rgb(19, 82, 107);
}

.cbtnn2,
.cbtnn3 {
  margin-top: 10px;
}


  /* Responsive styles for small devices */
  @media (max-width: 768px) {
    .col-md-3 {
      flex-basis: 48%;
    }
  }
  
  
</style>

<body>

<h2>Showing search results...</h2>

<div class="wholefix">
  
  <?php require 'dbConfig.php';
  
     
    ?>
        <p>
               
            <?php

            require 'dbConfig.php';
           // $category = $_POST['category'];
      $sno = $_GET['docid'];
      
         ?>
      
        <?php

  ?>



<div class="cardfix">
   <div class="container py-2">
    <div class="row mt-3">
       <?php 
      require 'dbConfig.php';

      $query = "SELECT * FROM doctor where doctorid = '$sno'";
      $query_run = mysqli_query($db, $query);
      $check_doctor = mysqli_num_rows($query_run) > 0;
      
      if($check_doctor)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
          ?>

<?php
          $sno = $row['doctorid'];

         // $sno2 = $row['foodid'];
          
              
    ?>
          
          <div class="col-md-3 mt-3">
            <div class="card">
            
            <div class="card-body">
            <h5 class="card-title" id="rname">Doctor: <?php echo $row['doctorname']; ?></h5>
            <p class="card-text" id="rname"><?php echo $row['doctorlocation']; ?></p>
            <p class="card-text" id="rname"><?php echo $row['doctorcategory']; ?></p>
                  
        <?php
         echo '
         <a class="cbtnn1" href="sendbookreq.html?docid='. $sno .'">Send Request</a>   
         <a class="cbtnn3" href="writereview.php?docid='. $sno .'">Review Here</a>                   
         <a class="cbtnn2" href="showreview.php?docid='. $sno .'">Reviews</a>           
           ';
           ?>

  
          </div>
          </div>
          </div>

          <?php
          
        }
      }
  

      ?>
      
    </div>
    </div>
    </div>
   


      


</body>

</html>