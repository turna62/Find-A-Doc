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
    background-color: rgb(240, 221, 136);
    overflow-x: hidden;
}

 .search{
    box-sizing: border-box;
    font-family: 'Times New Roman', Times, serif;
    position: relative;
    left: 30px ;
    
}

.search-box input[type="text"]{
    height: 100%;
    width: 100%;
    border: none;
    outline: none;
    background: #fff;
    font-size: 18px;
    padding: 0 60px 0 20px;
}

.search-box {
    height: 50px;
    width: 600px;
    color: #fff;
    position: relative;
    left: 100px;
    bottom: 15px;
}


.result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }

.result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }

.result p:hover{
        background: #f2f2f2;
    }


.search-btn {
    position: relative;
    left: 550px;
    bottom: 35px;
    height: 50px;
    width: 70px;
    color: rgb(80, 31, 19) ;

}

.search-btn:hover {
    color: rgb(100, 91, 148);
}

.btnn {
  border: none;
  outline: none;
  padding: 8px 8px;
  cursor: pointer;
  color: rgb(80, 31, 19);
  position: relative;
  left: 125px;
  top: 10px;
  border-radius: 10px;
}


.btnn:hover {
  background-color: rgb(155, 113, 58) ;
  color: white;
}


.btnn.show {
  background-color: #666;
  color: white;
}

.cbtnn1 {
  border: none;
  outline: none;
  padding: 4px 4px;
  cursor: pointer;
  color: white;
  position: relative;
  text-decoration : none;
  top: 20px;
  border-radius: 5px;
  background-color: rgb(80, 31, 19) ;
  right: 2px;
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
  left: 6px;
  top: 20px;
  border-radius: 5px;
  background-color: rgb(80, 31, 19) ;
}


.cbtnn2 a:hover {
  opacity: 0.7; 
  text-decoration : none;
}

.cbtnn3 {
      background-color:rgb(80, 31, 19);
      color: white;
      padding: 4px 80px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
      text-decoration : none;
      position: relative;
      left: 8px;
      top: 30px;
      outline: none;   
}


.cbtnn3 a:hover {
  opacity: 0.7; 
  text-decoration : none;
}

img {
    width: 180px;
    height: 145px;
    top: 300px;
    left: 100px;
}

.logo .rrflogo{
  width: 180px;
  height: 80px;
    top: 300px;
    left: 100px;
}


.sidebar {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  background-color: rgb(241, 191, 114);
  
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: rgb(80, 31, 19);
  display: block;
  position: relative;
  top: 10px;
  left: 5px;
}

.updbn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: rgb(80, 31, 19);
  display: block;
  position: relative;
  top: 10px;
  left: 5px;
}

.sidebar a:hover {
  color: gray;
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
  height: 370px;
}


.heading{
  position: relative;
  left: 220px;
  top : 80px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}
.headingnan{
  position: relative;
  left: 220px;
  top : 80px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}
.headingitalian{
  position: relative;
  left: 220px;
  top : 20px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}
.headingpizza{
  position: relative;
  left: 220px;
  top : 80px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}


.headingbengali{
  position: relative;
  left: 220px;
  top : 55px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}
.headingburger{
  position: relative;
  left: 220px;
  top : 15px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}


.headingfav{
  position: relative;
  left: 220px;
  top : 50px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}

.headingall{
  position: relative;
  left: 220px;
  
  font-size: 25px;
  color: rgb(80, 31, 19);
  font-family: 'Times New Roman', Times, serif;
}


.heading1{
  position: relative;
  left: 220px;
  top : 70px;
  font-size: 25px;
  color: rgb(80, 31, 19);
  animation-name: example;
  animation-duration: 3s;
  animation-iteration-count: 1;
  font-family: 'Times New Roman', Times, serif;

}

@keyframes example {
  0%   { left:0px; top:30px;}
  15%  { left:200px; top:30px;}
}

.cardifix{
  position: relative;
  left: 200px;
  width: 80%;
  cursor : pointer;
  bottom: 70px;
}

.cardifix .card {
  height: 415px;
  position: relative;
}

.cardifix img {
  width: 180px;
  height: 120px;
}

 .dropbtn {
  background-color:rgb(80, 31, 19);
  color: white;
  padding: 16px;
  font-size: 22px;
  border: none;
  cursor: pointer;
  border-radius: 30px;
}
 .dropdown {
  position: relative;
  display: inline-block;
  left: 1100px;
  bottom: 40px;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color :rgb(80, 31, 19);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content a {
  color: white;
  padding: 12px 12px;
  text-decoration: none;
  display: block;
  
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
  color :rgb(80, 31, 19);
}


.dropdown:hover .dropdown-content {
  display: block;
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

.wholefix{
  position: relative;
  right: 80px;
}


</style>

</head>


<body>

    
     
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
    


    
    </div>
    </div>
    </div>

    </div>
   
</body>
</html>
        
      