<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Times New Roman', Times, serif;
  }

  html,
  body {
    display: grid;
    height: 100%;
    place-items: center;
    text-align: center;
    background: rgb(50, 146, 184);
  }

  .container {
    width: 400px;
    background: white;
    padding: 20px 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: relative;
    height: 300px;
    bottom: 80px;
    box-shadow: 0 5px 5px #fff;
  }

  .container .post {
    display: none;
  }

  .container .text {
    font-size: 25px;
    color: rgb(9, 52, 69);
    font-weight: 500;
    font-family: 'Times New Roman', Times, serif;
  }

  .container .edit {
    position: absolute;
    right: 10px;
    top: 5px;
    font-size: 16px;
    color: rgb(9, 52, 69);
    font-weight: 500;
    cursor: pointer;
  }

  .container .edit:hover {
    text-decoration: underline;
  }

  .container form {
    display: none;
  }

  form header {
    width: 100%;
    font-size: 25px;
    color: rgb(9, 52, 69);
    font-weight: 500;
    margin: 5px 0 20px 0;
    text-align: center;
    transition: all 0.2s ease;
    font-family: 'Times New Roman', Times, serif;
  }

  form .textarea {
    height: 120px;
    width: 100%;
    overflow: hidden;
  }

  form .textarea textarea {
    height: 100%;
    width: 100%;
    outline: none;
    color: white;
    border: 1px solid rgb(9, 52, 69);
    background: rgb(9, 52, 69);
    padding: 10px;
    font-size: 17px;
    resize: none;
  }

  .textarea textarea:focus {
    border-color: rgb(9, 52, 69);
  }

  form .btn {
    height: 45px;
    width: 100%;
    margin: 15px 0;
  }

  form .btn button {
    height: 100%;
    width: 100%;
    border: 1px solid rgb(9, 52, 69);
    outline: none;
    background: rgb(9, 52, 69);
    color: white;
    font-size: 17px;
    font-weight: 500;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  form .btn button:hover {
    background: rgb(33, 113, 145);
  }

  .intro {
    color: rgb(9, 52, 69);
    font-size: 28px;
    position: relative;
    font-family: 'Times New Roman', Times, serif;
    bottom: 16px;
  }

  ::placeholder {
    color: white;
    opacity: 0.9;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .credentials {
    color: rgb(9, 52, 69);
    position: relative;
    bottom: 10px;
  }

  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgb(9, 52, 69);
    height: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    color: #fff;
    z-index: 9999;
  }

  .logo h2 {
    height: 30px;
  }

  .navbar-links {
    list-style: none;
    display: flex;
  }

  .navbar-links li {
    margin-left: 10px;
  }

  .navbar-links li:first-child {
    margin-left: 0;
  }

  .navbar-links li a {
    color: #fff;
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
    background-color: #2980b9;
    border-radius: 4px;
    transition: background-color 0.3s ease;
  }

  .navbar-links li a:hover {
    background-color: #1e6692;
  }
</style>


<body>
  <div class="navbar">
    <div class="logo">
      <h2><i class="fa fa-user-md"></i> Find-A-Doc</h2>
    </div>
    <ul class="navbar-links">
      <li><a href="HomePage.html"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="hppatient.php"><i class="fa fa-home"></i>Dashboard</a></li>
      <li><a href="plogout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
      </li>
    </ul>
  </div>
  <?php
  require 'dbConfig.php';
  $sno = $_GET['docid'];

  $query = "SELECT doctorname, doctorlocation FROM doctor where doctorstatus = 1 and doctorid = '$sno'";
  $query_run = mysqli_query($db, $query);

  $check_user = mysqli_num_rows($query_run) > 0;

  if ($check_user) {
    while ($row = mysqli_fetch_assoc($query_run)) {
      $doctorname = $row['doctorname'];
      $doctorlocation = $row['doctorlocation'];
    }
  }

  ?>

  <div class=credentials>
    <h1 class="">Doctor's Name:
      <?php echo $doctorname; ?>
    </h1>
    <h3 class="">Location:
      <?php echo $doctorlocation; ?>
    </h3>

  </div>

  <?php
  echo '

    <form action="submitdoctorreview.php?docid=' . $sno . '" method="post" enctype="multipart/form-data">

    <div class="container">
    <p class="intro">Review here..</p>
      <div class="post">
        <div class="text">Thanks for reviewing!</div>
        <div class="edit">EDIT</div>
      </div>
      <div class="star-widget">
        
          
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