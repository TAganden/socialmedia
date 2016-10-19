<?php
    session_start();
    
    $search_cs = $_POST['search'];
    $_SESSION['search_cs'] = $search_cs;
    $con = mysqli_connect("localhost","dcaligiuri","","social");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
$qz = "SELECT id, cs, age, height, boo, occupation, pro_pic, name, affliation FROM users where cs='".$search_cs."'";
$qz = str_replace("\'","",$qz);
$result = mysqli_query($con,$qz);


while($row = mysqli_fetch_array($result))
  {
    $pro_pic = $row["pro_pic"];
    $call_sign = $row["cs"];
    $name = $row["name"];
    $age = $row["age"]; 
    $height = $row["height"]; 
    $occupation = $row["occupation"];
    $boo = $row["boo"]; 
    $affliation = $row["affliation"];
    $_SESSION['search_pro_pic'] = $pro_pic;
  }

  
mysqli_close($con);

  include('templates/nav.html');
?>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://use.fontawesome.com/8f2d22fdf5.js"></script>
<link href="styles/home.css" rel="stylesheet">


<html>

  


  
  <head>
    <title><?php echo $call_sign; ?></title>
  </head>
  
  

<body>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">
              <img class="pull-left" id="pro-pic" src="<?php echo $pro_pic; ?>" width="200" height="200"</img>
              <h1 id="call-sign" class="pull-left"><?php echo $call_sign; ?></h1>
              <a href="search.php"><button type="button" class="btn btn-secondary btn-custom">About</button></a>
              <a href="searchFriends.php"><button type="button" class="btn btn-secondary btn-custom">Friends</button></a>
              <a href="searchPhotos.php"><button type="button" class="btn btn-secondary btn-custom">Photos</button></a>
        </div> 
        <div class="col-md-1"><h5>.</h5></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">

        </div>
    </div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 profile-stats">
          <?php 
            echo "<h2>Call Sign : $call_sign</h2>";
            echo "<h2>Real Name : $name</h2>";
            echo "<h2>Age : $age</h2>";
            echo "<h2>Height : $height</h2>";
            echo "<h2>Affiliation : $affliation</h2>";
            echo "<h2>Occupation : $occupation</h2>";
            echo "<h2>Base Of Operations : $boo</h2>";
          ?>
          </div>
        </div> 
        <div class="col-md-1"><h5>.</h5></div>
    </div>
    
    
   
</body>



