<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Doctors By Location</title>
    </head>
    <style>
body{
    background-color: rgb(17, 6, 4);
}
.attribute {
        font-size: 18px;
        font-style: normal;
        position: relative;
        top: 30px;
        font-family: 'Times New Roman', Times, serif;
        }
    .banner{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  height: 300px;
  margin: auto;
  text-align: center;
  font-family: 'Times New Roman', Times, serif;
  background-color: rgb(240, 221, 136);
  position: relative;
  top: 100px;
  border-radius: 5px;
    }
img {
    width: 180px;
    top: 300px;
    left: 100px;
}
label {
    position: relative;
    right: 10px;
}
.banner form input[type="submit"]{
    float: left;
  display: block;
  color: rgb(219, 216, 216);
  text-align: center;
  padding: 8px;
  text-decoration:none;
  font-size: 13px;
  background-color: rgb(46, 16, 9);
  margin: 10px;
  border-radius: 5px;
  font-family: 'Times New Roman', Times, serif;
  border: none;
  position: relative;
  top: 40px;
  left: 240px;
}
.banner form input[type="email"]{
    width: 220px;
    font-family: 'Times New Roman', Times, serif;
}
.banner form input[type="checkbox"]{
    width: 45px;
}
.banner .check{
    font-family: 'Times New Roman', Times, serif;
    color: rgb(46, 16, 9);
    position: relative;
    right: 20px;
    top: 15px;
}
    </style>
<body>
    
        
<!--  -->
  <form method = "GET" action = "submitlocation.php" >
        <div class = "attribute">
     <div class="check">  
    <input type="checkbox" name="doctorlocation[]" value="Boardbazar">
    <label>Boardbazar</label>
    <input type="checkbox" name="doctorlocation[]" value="Joydebpur">
    <label>Joydebpur</label>
    <input type="checkbox" name="doctorlocation[]" value="Kalameshwar">
    <label>Kalameshwar</label>
    <input type="checkbox" name="doctorlocation[]" value="Kaligonj">
    <label>Kaligonj</label>
   
</div>
    <input type="submit" name = "submit" >
</form>
                                      
    </div>
</body>
</html>