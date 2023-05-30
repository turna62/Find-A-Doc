 <!-- card -->
 <div class="cardfix">
   <div class="container py-2">
    <div class="row mt-3">
       <?php 
      require 'dbConfig.php';

      $query = "SELECT * FROM restaurant where status=1 and restaurantname = '$_SESSION[restaurantname]'";
      $query_run = mysqli_query($db, $query);
      $check_user = mysqli_num_rows($query_run) > 0;
      
      if($check_user)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
          ?>
          <?php
          $sno = $row['restaurantid'];
          $getr= "SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM res_reviews WHERE reviewrid ='$sno'";
          $result = mysqli_query($db, $getr);
          $row2 = mysqli_fetch_array($result);
      
          $showr = "SELECT review, rating, rrusername, submitdate  FROM res_reviews WHERE reviewrid = '$sno'  ORDER BY submitdate DESC";
      $result2 = mysqli_query($db, $showr);
      $row3 = mysqli_fetch_array($result2);
      ?>
          
          <div class="col-md-3 mt-3">
            <div class="cardifix">
            <div class="card">

          <div class="card-body">
            <h5 class="card-title"><?php echo $row['restaurantname']; ?></h5>
            <p class="card-text"><?php echo $row['location']; ?></p>
            <p class="card-text" id="rlocation"><i class="fas fa-star"></i><b><?php echo sprintf('%0.1f',$row2['overall_rating']).'/5.0' .' '.'('.$row2['total_reviews'].'+'.')'
            ; ?></b></p>
         
            <!-- image fetch -->
              <?php 
          // Include the database configuration file  
           require_once 'dbConfig.php'; 

           $queryy = "SELECT image, imageid,resimageid from images, restaurant where images.imageid=restaurant.resimageid and restaurant.restaurantname= '$_SESSION[restaurantname]'";
           $queryy_run = mysqli_query($db, $queryy);
           $check_userr = mysqli_num_rows($queryy_run) > 0;

           if($check_userr){
            while($row = mysqli_fetch_assoc($queryy_run)){
              ?>
                 <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="card-img-top"/>
                 
              <?php
            }
           }
        ?>
        <?php
        echo '
           <a class="cbtnn1" href="ViewReviewsRes.php?resid='. $sno .'">All Reviews</a>
           <a class="cbtnn222" href="RestaurantMenu.php?resid='. $sno .'">Menu </a>';
      ?>

          </div>
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
   