<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
<!-- Bootstrap CSS -->

<link href="/css/bootstrap.min.css" rel="stylesheet">

    <title>Search Doctors</title>
</head>

<style>

@import url("https://fonts.googleapis.com/css??family=Poppins:wght@400;500;600;700&display=swap");


body{
    background-color: rgb(240, 221, 136);
    overflow-x: hidden;
}

 

.cbtnn1 {
  border: none;
  outline: none;
  padding: 3px 3px;
  cursor: pointer;
  color: white;
  position: relative;
  text-decoration: none;
  top: 20px;
  border-radius: 5px;
  background-color: rgb(80, 31, 19) ;
  right : 2px;
}


.cbtnn1:hover {
  opacity: 0.7; 
  text-decoration : none;
}

.cbtnn2 {
  border: none;
  outline: none;
  padding: 3px 3px;
  cursor: pointer;
  color: white;
  position: relative;
  text-decoration : none;
  left: 10px;
  top: 20px;
  border-radius: 5px;
  background-color: rgb(80, 31, 19) ;
}


.cbtnn2:hover {
  opacity: 0.7; ;
}




.cardfix img {
    width: 180px;
    top: 300px;
    left: 100px;
}


.cardbtn a {
  border: none;
  outline: none;
  padding: 8px 8px;
  cursor: pointer;
  color: rgb(80, 31, 19);
  }

.cardbtn a:hover
{
  opacity: 0.7;
}


.cardfix{
  height: 370px;
  position: relative;
  left: 50px;
  width: 80%;
  cursor : pointer;
  bottom: 220px;
}

.cardfix .card {
  height: 325px;
}

.cardfix img {
  width: 180px;
  height: 120px;
}


.card:hover {
  box-shadow: 0 8px 16px 0 grey;
  transform: translate3D(0,-1px,0) scale(1.03);
} 

.heading{
  position: relative;
  left: 62px;
  bottom : 175px;
  font-size: 25px;
  color: rgb(80, 31, 19);

}


/* .handrice{
  width: 150px;
  height: 150px;
  position: relative;
  left: 350px;
} */
/* .rrflogo{
  width: 200px;
  height: 100px;
  position: relative;
  bottom: 250px;
} */
.credentials{
  color: rgb(80, 31, 19);
  position: relative;
  left: 515px;
  bottom: 130px;
}
.card-body .card-text2 i{
  color: rgba(248, 197, 70, 0.964);
}
.card-body .card-texti i{
  color: rgba(248, 197, 70, 0.964);
}

.card .card-body .card-textrn {
  font-family: 'Times New Roman', Times, serif;
  font-size: 18px;
  color: rgb(80, 31, 19);
  font-weight: 600;
}
.cardifix{
  position: relative;
  left: 100px;
  width: 77%;
  cursor : pointer;
  bottom: 50px;
}

.cardifix .card {
  height: 370px;
  position: relative;
}

.cardifix img {
  width: 180px;
  height: 120px;
}
.heading u{
  position: relative;
  left: 53px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}

.cbtnn3 {
      background-color:rgb(80, 31, 19);
      color: white;
      padding: 3px 72px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      float: right;
      text-decoration : none;
      position: relative;
      left: 4px;
      top: 30px;
      outline: none;   
}


.cbtnn3 a:hover {
  opacity: 0.7; 
  text-decoration : none;
}

.logo .rrflogo{
 width : 190px;
    bottom: 20px;
}

</style>

<body>
   <!-- <div class="logo">

        <img class="rrflogo" src="cover.png" alt="logo">

    </div> -->
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

  



<div class="cardifix">
   <div class="container py-5">
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
            <h5 class="card-title" id="rname"><?php echo $row['doctorname']; ?></h5>
            <p class="card-text" id="rname"><?php echo $row['doctorlocation']; ?></p>
            <p class="card-text" id="rname"><?php echo $row['doctorcategory']; ?></p>
            
         

           

          
       
        <?php
         echo '
           <a class="cbtnn1" href="doctordetails.php?docid='. $sno .'">See More</a>
           
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