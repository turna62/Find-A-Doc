<?php
session_start();

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RRF Rate & Review Restaurants</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>

  <style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Times New Roman', Times, serif;
}
html,body{
  display: grid;
  height: 100%;
  place-items: center;
  text-align: center;
  background:  rgb(17, 6, 4);
}
.container{
  position: relative;
  width: 400px;
  background:  rgb(248, 229, 152);
  padding: 20px 30px;
  border: 1px solid rgb(46, 16, 9);
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  position: relative;
  height: 400px;
}
.container .post{
  display: none;
}
.container .text{
  font-size: 25px;
  color: rgb(46, 16, 9);
  font-weight: 500;
  font-family: 'Times New Roman', Times, serif;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: rgb(46, 16, 9);
  font-weight: 500;
  cursor: pointer;
}
.container .edit:hover{
  text-decoration: underline;
}
.container .star-widget input{
  display: none;
}
.star-widget label{
  font-size: 40px;
  color: rgb(65, 31, 24);
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
  position: relative;
  bottom: 12px;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color:rgb(236, 174, 39);
}
input:checked ~ label{
  color: rgb(236, 174, 39);
}
input#rate-5:checked ~ label{
  color: rgb(236, 174, 39);
  text-shadow: 0 0 20px rgb(236, 193, 75);
}
#rate-1:checked ~ form header:before{
  content: "I just hate it ";
}
#rate-2:checked ~ form header:before{
  content: "I don't like it ";
}
#rate-3:checked ~ form header:before{
  content: "It is awesome ";
}
#rate-4:checked ~ form header:before{
  content: "I just like it ";
}
#rate-5:checked ~ form header:before{
  content: "I just love it ";
}
.container form{
  display: none;
}
input:checked ~ form{
  display: block;
}
form header{
  width: 100%;
  font-size: 25px;
  color: rgb(65, 31, 24);
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
  font-family: 'Times New Roman', Times, serif;
}
form .textarea{
  height: 120px;
  width: 100%;
  overflow: hidden;
}
form .textarea textarea{
  height: 100%;
  width: 100%;
  outline: none;
  color: rgb(239, 248, 152);
  border: 1px solid rgb(236, 247, 138);
  background: rgb(46, 16, 9);
  padding: 10px;
  font-size: 17px;
  resize: none;
  position: relative;
}
.textarea textarea:focus{
  border-color: rgb(236, 247, 138);
}
form .btn{
  height: 45px;
  width: 100%;
  margin: 15px 0;
}
form .btn button{
  height: 100%;
  width: 100%;
  border: 1px solid rgb(236, 247, 138);
  outline: none;
  background: rgb(46, 16, 9);
  color: rgb(236, 247, 138);
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  position: relative;
  top: 20px;
}
form .btn button:hover{
  background: rgb(65, 31, 24);
}
  

.intro{
    color: rgb(65, 31, 24);
    font-size: 28px;
    position: relative;
    font-family: 'Times New Roman', Times, serif;
    bottom: 27px;
}
::placeholder{
    color: rgb(239, 248, 152);
    opacity: 0.7;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
img {
    width: 180px;
    height: 80px;
    position: relative;
    right: 550px;
    bottom: 20px;
}
.credentials {
  color: rgb(248, 229, 152);
  position: relative;
  bottom: 30px;
}

  </style>

  <body>

  <div class="logo">

            <img class="rrflogo" src="cover.png" alt="logo">
    
        </div>


  

  <?php 
    require 'dbConfig.php';
    $sno = $_GET['resid'];
    
    $query = "SELECT restaurantname, location, restaurantid FROM restaurant where status = 1 and restaurantid = '$sno'";
    $query_run = mysqli_query($db, $query);
    $check_user = mysqli_num_rows($query_run) > 0;
    if($check_user)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
          
          $restaurantname = $row['restaurantname'];
          $location = $row['location'];
         //echo $restaurantname;
          
         }
       }
    ?>
    
    <div class=credentials>
            <h1 class="restname"> <?php echo $restaurantname; ?></h1> 
    
            <h4 class="restlocation"><?php echo $location; ?></h1>
            
    </div>
    <?php
echo '



<form action="submitresreview.php?resid='. $sno.'" method="post" enctype="multipart/form-data">

   
    <div class="container">
    <p class="intro">Rate us here..</p>
      <div class="post">
        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>
      </div>
      <div class="star-widget">
        <input type="radio" name="rating" id="rate-5" value="5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rating" id="rate-4" value="4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rating" id="rate-3" value="3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rating" id="rate-2" value="2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rating" id="rate-1" value="1">
        <label for="rate-1" class="fas fa-star"></label>
        
          
          <div class="textarea">
            <textarea cols="30" placeholder="Describe your experience.." name="review"></textarea> 
            <!-- <input type="text" name="review"  placeholder="Describe your experience.."> -->
          </div>
          <div class="btn">
            <button type="submit" name="submitreview">Post</button>
        
    
          <!--  <input type="submit" name="submitreview" value="Post"> -->
          </div>
        </form>
      </div>
    </div>
  
    ';
?>
  </body>
</html>