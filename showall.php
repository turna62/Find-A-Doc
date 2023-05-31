<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link href="card.css" rel="stylesheet">
  <title>All Doctors</title>
</head>
<style>
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
      margin-top:5px;
      position: relative;
      right: 25px;
  }

  .navbar-links li a:hover {
      background-color: #1e6692;
  }

</style>
<body>

<div class="navbar">
    <div class="logo">
    </div>
    <ul class="navbar-links">
      <li><a href="hppatient.php"><i class="fa fa-angle-left"></i> Back</a></li>
      <li><a href="plogout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
      </li>
    </ul>
  </div>

<h2>Showing All Search Results...</h2>

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
            $row_cnt = mysqli_num_rows($query_run);


            echo "<div class='alert alert-success mt-3 text-center' role='alert' style='color:white'>$row_cnt doctor(s) found! </div>";
            while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
              <?php
              $sno = $row['doctorid'];



              ?>
              <div class="col-md-3 mt-3">
                <div class="card">

                  <div class="card-body">
                    <h5 class="card-title" id="rname">Doctor:
                      <?php echo $row['doctorname']; ?>
                    </h5>
                    <h5 class="card-text" id="rlocation">Email:
                      <?php echo $row['doctoremail']; ?>
                    </h5>
                    <h5 class="card-text" id="rlocation">Location:
                      <?php echo $row['doctorlocation']; ?>
                    </h5>
                    <h5 class="card-text" id="rcategory">Category:
                      <?php echo $row['doctorcategory']; ?>
                    </h5>






                    <?php
                    echo '
        <a class="cbtnn1" href="sendbookreq.php?docid=' . $sno . '">Send Request</a>   
        <a class="cbtnn3" href="writereview.php?docid=' . $sno . '">Review Here</a>                   
        <a class="cbtnn2" href="showreview.php?docid=' . $sno . '">Reviews</a>           
                 
           ';
                    ?>


                  </div>
                </div>
              </div>

              <?php
            }
          } else {
            echo "<div class='alert alert-info mt-3 text-center' role='alert'>No doctors found.</div>";
          }

          ?>
        </div>
      </div>
    </div>


</body>

</html>