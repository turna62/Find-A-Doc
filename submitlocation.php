<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
    crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <title>Filter Doctors By Location</title>
  <link href="card.css" rel="stylesheet">

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


  <h2>Showing all results filtered by location...</h2>


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
    
    if (isset($_GET['doctorlocation'])) {
      ?>
      <?php
      foreach ($_GET['doctorlocation'] as $check) {




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

            $query = "select * from doctor where doctorstatus = 1 and doctorlocation = '$check'";
            $query_run = mysqli_query($db, $query);


            if (mysqli_num_rows($query_run) > 0) {
              $row_cnt = $query_run->num_rows;


              echo "<div class='alerti alert-success mt-3 text-center' role='alert' style='color: white;'>$row_cnt doctor(s) of location: $check found!</div>";



              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <?php
                $sno = $row['doctorid'];

                ?>
                <div class="col-md-3 mt-3">
                  <div class="cardi">

                    <div class="card-body">
                      <h5 class="card-title" id="rname">Doctor:
                        <?php echo $row['doctorname']; ?>
                      </h5>
                      <h5 class="card-text" id="remail">Email:
                        <?php echo $row['doctoremail']; ?>
                      </h5>

                      <h5 class="card-text" id="rlocation">Location:
                        <?php echo $row['doctorlocation']; ?>
                      </h5>
                      <h5 class="card-text" id="rlocation">Category:
                        <?php echo $row['doctorcategory']; ?>
                      </h5>





                      <!-- image fetch -->




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
              echo "
                                        <div class='alert alert-danger mt-3 text-center' role='alert' style='color: white';>
                                            No doctor of location : $check found!
                                        </div>
                                        ";

            }
      }
    } else {
      ?>
          <script>alert("Error! Location field must be filled!")</script>
          <?php

    }



    ?>

      </div>
</body>

</html>