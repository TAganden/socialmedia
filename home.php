


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://use.fontawesome.com/8f2d22fdf5.js"></script>
<link href="styles/home.css" rel="stylesheet">

<?php 
  $url = "http://statici.behindthevoiceactors.com/behindthevoiceactors/_img/chars/tracer-overwatch-62.5.jpg";
?>

<html>
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6"><form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" id="search-bar" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default" id="magnifying-glass"><span class="glyphicon glyphicon-search"></spa</button>
  </form>
  </div>
   
  <div class="col-md-3">
    <img src="https://yt3.ggpht.com/-YrJIX4CkGv8/AAAAAAAAAAI/AAAAAAAAAAA/zkNmaDpOsV0/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="Smiley face" height="42" width="42" class="pull-right">
    <button id="upload" class="btn btn-default pull-right">Upload</button>
        </div>
  </div> 

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<body>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">
              <button type="button" class="btn btn-secondary btn-custom">Timeline</button>
              <button type="button" class="btn btn-secondary btn-custom">About</button>
              <button type="button" class="btn btn-secondary btn-custom">Friends</button>
              <button type="button" class="btn btn-secondary btn-custom">Photos</button>
              <button type="button" class="btn btn-secondary btn-custom">More</button>
        </div> 
        <div class="col-md-1"><h5>.</h5></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">

        </div>
    </div>
    
    
   
</body>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        </div> 
        <div class="col-md-1"><h5>.</h5></div>
    </div>

    <?php
      session_start();
      $call_sign = $_SESSION['cs'];
    
$link = mysqli_connect("localhost","dcaligiuri","","social");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  


$servername = "localhost";
$username = "dcaligiuri";
$password = "";
$dbname = "social";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, cs, name, age, height, occupation, boo, affliation, pic FROM users WHERE cs='$call_sign'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $pro_pic = $row["pic"];
        echo "<img src='$pro_pic' alt='pro pic' height='200' width='200'>" . "<br>";
        echo "Call Sign : " . $row["cs"] . "<br>";
        echo "Real Name : " . $row["name"] . "<br>";
        echo "Age : " . $row["age"] . "<br>";
        echo "Height : " . $row["height"] . "<br>";
        echo "Occupation : " . $row["occupation"] . "<br>";
        echo "Base Of Operations : " . $row["boo"] . "<br>";
        echo "Affiliation : " . $row["affliation"] . "<br>";
    }
    
} else {
    echo "0 results";
}

mysqli_close($conn);

    
    
    
    ?>


</html>


