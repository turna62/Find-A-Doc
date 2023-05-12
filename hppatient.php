<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- Bootstrap CSS -->


<link href="/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

    <title>Patient Home Page</title>
    



<style>

@import url("https://fonts.googleapis.com/css??family=Poppins:wght@400;500;600;700&display=swap");


body{
    background-color: rgb(50, 146, 184);
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
    top: 30px;
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
    left: 610px;
    bottom: 50px;
    height: 50px;
    width: 70px;
    color: rgb(80, 31, 19) ;
    border-radius: 4px;
}

.search-btn:hover {
    color:  rgb(9, 52, 69);
}

.btnn {
  border: none;
  outline: none;
  padding: 8px 8px;
  cursor: pointer;
  color:  rgb(9, 52, 69);
  position: relative;
  left: 125px;
  top: 45px;
  border-radius: 10px;
}


.btnn:hover {
  background-color:  rgb(9, 52, 69) ;
  color: white;
}


.btnn.show {
  background-color: #666;
  color: white;
}


</style>

</head>


<body>

    
        
        
            <div class="search">
              <div class="search-box"> 
                 <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off" placeholder="Search for doctors...">
                    <div class="search-btn">
                   
                    </div>
              </div>
        
         <div id="search_result"></div>
         
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#live_search').keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'doctorsearch.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block').css('color', 'black').css('background-color', 'white').css('width', '600px').css('position', 'relative').css('left', '100px').css('bottom', '10px').css('text-decoration', 'none');
                            // $("#live_search").focusout(function () {
                            //     $('#search_result').css('display', 'none').css('color', 'black').css('background-color', 'white').css('width', '600px').css('position', 'relative').css('left', '100px').css('bottom', '10px').css('text-decoration', 'none');
                            // });
                            // $("#live_search").focusin(function () {
                            //     $('#search_result').css('display', 'block').css('color', 'black').css('background-color', 'white').css('width', '600px').css('position', 'relative').css('left', '100px').css('bottom', '10px').css('text-decoration', 'none');
                            // });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
            $(document).on("click", "a", function () {
      $("#live_search").val($(this).text());
      $("#search_result").html("");
    });
  });
        
    </script>

        <button class="btnn show" onclick="window.location.href='showall.php';"> Show All</button>
        <button class="btnn" onclick="window.location.href='checklocation.php';"> Location</button>
        <button class="btnn" onclick="window.location.href='checkcategory.php';"> Category</button>
       
        
    </div>

  

    


      
      
      
    </div>
    </div>
    </div>
   
</body>
</html>