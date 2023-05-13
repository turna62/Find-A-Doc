<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<title>RRF Restaurant Review Details</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- Bootstrap CSS -->

<link href="/css/bootstrap.min.css" rel="stylesheet">

<!--Stylesheet--------------------------->
<link rel="stylesheet" href="css/style.css"/>
<!--Fav-icon------------------------------>
<link rel="shortcut icon" href="images/fav-icon.png"/>
<!--poppins-font-family------------------->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!--using-Font-Awesome-------------------->
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<style>

@import url("https://fonts.googleapis.com/css??family=Poppins:wght@400;500;600;700&display=swap");

*{
    margin: 0px;
    padding: 0px;
    font-family: 'Times New Roman', Times, serif;

    box-sizing: border-box;
    
}
body{
    background-color: rgb(106, 159, 180);
    overflow-x: hidden;
}
a{
    text-decoration: none;
    font-family: 'Times New Roman', Times, serif;
}
#testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    
}
.testimonial-heading h1{
    font-size: 1.8rem;
    font-weight: 500;
    color: rgb(9, 52, 69);
    padding: 10px 20px;
    position: relative;
    right: 60px;
    top: 60px;
}
.testimonial-box-container{
    position: relative;
    top: 60px;
}
.testimonial-box{
    
    box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
    width: 850px;
    height: 150px;
    cursor: pointer;
    background-color: rgb(181, 228, 247);
    position: relative;
    border-radius: 10px;
}
.name-user strong{
    color: #3d3d3d;
    font-size: 1.3rem;
    letter-spacing: 0.5px;
    position: relative;
    left: 10px;
}
.name-user span{
    color: #979797;
    font-size: 0.8rem;
}
.reviews{
    color: #f9d71c;
}
.box-top{
    position: relative;
   top: 20px;
    left: 20px;
}
.client-comment p{
    font-size: 1.1rem;
    color: #4b4b4b;
    position: relative;
    left: 30px;
    top: 25px;
}
.client-commenttime p{
    font-size: 0.9rem;
    color: #4b4b4b;
    position: relative;
    left: 680px;
    top: 67px;
}

.reviews p{
    font-size: 1.1rem;
    color: #4b4b4b;
    position: relative;
    left: 430px;
    top: 80px;
}
.reviews i{
    color: rgba(248, 197, 70, 0.964);
}

.reviews{
    position: relative;
    bottom: 145px;
    left: 250px;
}


.testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
}
 
.totalrate{
font-weight: 700;
font-size: 22px;
color: rgb(80, 31, 19);
font-family: 'Times New Roman', Times, serif;
position: relative;
right: 483px;
bottom: 120px;
}
 
.totalreview{
font-weight: 700;
font-size: 22px;
color: rgb(9, 52, 69);
font-family: 'Times New Roman', Times, serif;
position: relative;
right:500px;
}

.totalrate i{
    color: rgba(248, 174, 70, 0.964);
}
.credentials{
color: rgb(9, 52, 69);
font-family: 'Times New Roman', Times, serif;
position: relative;
font-size: 25px;
left: 430px;
top: 50px;
}

.credentials .restlocation{
    position: relative;
    left: 35px;
}
u{
    position: relative;
    left: 50px;
}
.credentials .restname{
    position: relative;
    left: 23px;
    top: 100px;
}


</style>

<body>
    
    
    
          
         
            <?php

            require 'dbConfig.php';
      $sno = $_GET['docid'];
      $query = "SELECT doctorname, doctorlocation, doctorid FROM doctor where doctorstatus = 1 and doctor.doctorid = $sno";
      $query_run = mysqli_query($db, $query);
      $check_user = mysqli_num_rows($query_run) > 0;
      
      if($check_user)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
          
          $doctorname = $row['doctorname'];
          $doctorlocation = $row['doctorlocation'];
          
         }
       }

      ?>

    <div class=credentials>
            <h1 class="">Doctor: <?php echo $doctorname; ?></h1> 
            <h4 class="restlocation">Location: <?php echo $doctorlocation; ?></h1>
            
    </div>


        <?php



  
  
    require 'dbConfig.php';
    $sno = $_GET['docid'];
    
    $getr= "SELECT COUNT(*) AS total_reviews FROM reviews WHERE reviewid ='$sno'";
    $result = mysqli_query($db, $getr);

    $row = mysqli_fetch_array($result);

   
$showr = "SELECT review, rpatientname  FROM reviews WHERE reviewid = '$sno' ";
$result = mysqli_query($db, $showr);

?>
<section id="testimonials">

        <div class="testimonial-heading">
            <h1>Reviewers say..</h1>
        </div>
        
        <?php

?>

<div class="totalreview">
   <p>Review count: <?php echo $row['total_reviews']; ?> </p>
</div>

<?php


        
        


    while($row = mysqli_fetch_array($result)) {
                
        
    
    ?>

    
    <div class="container py-1">
   <div class="row mt-3">

        <!--testimonials-box-container------>
<div class="testimonial-box-container">




            <!--BOX-1-------------->
    <div class="col-md-6 mt-3">
        
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>Patient: <?php echo $row['rpatientname']."<br/>"?></strong>
                        </div>

                        <!-- <div class="client-commenttime">
                            <p><?php 
                            //echo $row['submitdate']."<br/>"?> </p>
                        </div> -->

                    </div>
                   
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>Comment: <?php echo $row['review']."<br/>" ?></p>
              </div>
            
         </div>
    
            
</div>
    </div>
    </div>
        
    </section>
    <?php

    }


?>
</body>
</html>


