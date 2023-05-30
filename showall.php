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


<link href="card.css" rel="stylesheet">


    <title>All Doctors</title>
     


 

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
            <h5 class="card-title" id="rname">Doctor: <?php echo $row['doctorname']; ?></h5>
            <p class="card-text" id="rlocation"><?php echo $row['doctorlocation']; ?></p>
            <p class="card-text" id="rlocation"><?php echo $row['doctorcategory']; ?></p>
           
         
            

           
        
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
        
      