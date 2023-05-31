<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->

  <link href="card.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

  <title>Search Doctors</title>
</head>


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

          if ($check_doctor) {
            while ($row = mysqli_fetch_assoc($query_run)) {
              ?>

              <?php
              $sno = $row['doctorid'];

              // $sno2 = $row['foodid'];
          

              ?>

              <div class="col-md-3 mt-3">
                <div class="card cardsearch">

                  <div class="card-body">
                    <h5 class="card-title" id="rname">
                      <?php echo $row['doctorname']; ?>
                    </h5>
                    <h5 class="card-text" id="rlocation">Email:
                      <?php echo $row['doctoremail']; ?>
                    </h5>
                    <p class="card-text" id="rname">
                      <?php echo $row['doctorlocation']; ?>
                    </p>
                    <p class="card-text" id="rname">
                      <?php echo $row['doctorcategory']; ?>
                    </p>

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
          }


          ?>

        </div>
      </div>
    </div>






</body>

</html>