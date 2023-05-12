<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
<!-- Bootstrap CSS -->

<link href="/css/bootstrap.min.css" rel="stylesheet">

    <title>RRF All Restaurants & Food Items </title>
     



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
  right: 110px;
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
  right: 110px;
}
h2{
  color: white;
  position: relative;
  top: 20px;
  left: 40px;
}

</style>

</head>


<body>

<h2>Showing all search results...</h2>

     
<div class="wholefix">

    <!-- card -->
   <div class="cardfix">
   <div class="container py-5">
    <div class="row mt-3">
       <?php 
      require 'dbConfig.php';

      $query = "SELECT * FROM doctor where doctorstatus = 1";
      $query_run = mysqli_query($db, $query);

      
      if (mysqli_num_rows($query_run) > 0) {
        $row_cnt = $query_run->num_rows;
    
        
        echo "<div class='alert alert-success mt-3 text-center' role='alert'>$row_cnt doctor(s) found! </div>";
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
           
         
            

           
        
<?php
        echo '
        <a class="cbtnn1" href="sendbookreq.html?docid='. $sno .'">Send Request</a>   
        <a class="cbtnn3" href="writereview.php?docid='. $sno .'">Review Here</a>                   
        <a class="cbtnn2" href="showreview.html?docid='. $sno .'">Reviews</a>           
                 
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
    


    
    </div>
    </div>
    </div>

    </div>
   
</body>
</html>
        
      