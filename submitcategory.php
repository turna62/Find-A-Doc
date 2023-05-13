<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
   integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
   crossorigin="anonymous"
  />
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <title>Filter Doctors By Category</title>
</head>

<style>

@import url("https://fonts.googleapis.com/css??family=Poppins:wght@400;500;600;700&display=swap");


body{
    background-color: rgb(50, 146, 184);
    overflow-x: hidden;
}

 

.cbtnn1 {
  border: none;
  outline: none;
  padding: 4px 4px;
  cursor: pointer;
  color: white;
  position: relative;
  text-decoration : none;
  top: 0px;
  border-radius: 5px;
  background-color: rgb(9, 52, 69);
  left: 10px;
}


.cbtnn1:hover {
  opacity: 0.7; 
  text-decoration : none;
}
.cbtnn2 {
  border: none;
  outline: none;
  padding: 4px 4px;
  cursor: pointer;
  color: white;
  position: relative;
  text-decoration : none;
  top: 20px;
  border-radius: 5px;
  background-color: rgb(9, 52, 69);
  left: 10px;
}


.cbtnn2:hover {
  opacity: 0.7; 
  text-decoration : none;
}
.cbtnn3 {
  border: none;
  outline: none;
  padding: 4px 8px;
  cursor: pointer;
  color: white;
  position: relative;
  text-decoration : none;
  top: 10px;
  border-radius: 5px;
  background-color: rgb(9, 52, 69);
  left: 10px;
}


.cbtnn3:hover {
  opacity: 0.7; 
  text-decoration : none;
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

.cardfix {
  position: relative;
  left: 200px;
  width: 80%;
  cursor : pointer;
}

.card:hover {
  box-shadow: 0 8px 16px 0 grey;
  transform: translate3D(0,-1px,0) scale(1.03);
} 

.card{
  height: 210px;
  position: relative;
  top: 50px;
  width: 150px;
  background: white;
}
.card-title {
  position: relative;
  top: 10px;
  left: 10px;
  font-size: 18px;
}
.card-text {
  position: relative;
  left: 10px;
  font-size: 17px;
}

.heading{
  position: relative;
  left: 200px;
  top : 80px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
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
  bottom: 20px;
}
.card .card-body .card-text1 i{
    bottom: 50px;
}
.alert{
  position: relative;
  top: 40px;
  right: 10px;
}
.rrflogo{
  height:80px;

}

.alert {
  font-size: 18px;
}

</style>

<body>

<div class="wholefix">

    <?php

    require 'dbConfig.php'; 

  //   if(!empty($_POST['check_list'])) {
  //     foreach($_POST['check_list'] as $check) {
  //             //echoes the value set in the HTML form for each checked checkbox.
  //                          //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
  //                          //in your case, it would echo whatever $row['Report ID'] is equivalent to.
  //     }
  // }
    
    if(isset($_GET['doctorcategory']))
    {
    ?> <?php
      foreach($_GET['doctorcategory'] as $check) {
    
    
  
    
                                  ?>
                                  </div>
                                  </div>
                                  </div>
                                  

<!-- card -->
<div class="cardfix">
<div class="container py-2">
<div class="row mt-3">
   <?php 
  require 'dbConfig.php';

  $query = "select * from doctor where doctorstatus = 1 and doctorcategory = '$check'";
  $query_run = mysqli_query($db, $query);
  

  if (mysqli_num_rows($query_run) > 0) {
    $row_cnt = $query_run->num_rows;

    
    echo "<div class='alert alert-success mt-3 text-center' role='alert'>$row_cnt doctor(s) of  category : $check found! </div>";
  
  
    while($row = mysqli_fetch_assoc($query_run))
    {
      ?><?php
      $sno = $row['doctorid'];
      
      ?>
      <div class="col-md-3 mt-3">
        <div class="card">

        <div class="card-body">
            <h5 class="card-title" id="rname"><?php echo $row['doctorname']; ?></h5>
            <p class="card-text" id="rlocation"><?php echo $row['doctorlocation']; ?></p>
            <p class="card-text" id="rlocation"><?php echo $row['doctorcategory']; ?></p>
            
            

        
      
        <!-- image fetch -->
          

    
    
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
                                    else {
                                        echo "
                                        <div class='alert alert-danger mt-3 text-center' role='alert'>
                                            No doctor of category : $check found!
                                        </div>
                                        ";
                                    
                                    }
                                  }
                                }
                                else{
                                    ?>      
                                    <script>alert("Error! Category field must be filled!")</script>
                                    <?php
                                  
                                  }
                              
                                    
  
  ?>
  
                                </div>
</body>
</html>