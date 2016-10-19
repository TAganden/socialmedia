<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://use.fontawesome.com/8f2d22fdf5.js"></script>
<link href="styles/home.css" rel="stylesheet">

<?php 
  session_start();
  include("templates/nav.html");
?>
 
 <html>

  


  
  <head>
    <title><?php echo $_SESSION['search_cs']; ?></title>
  </head>
  
  

<body>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 stuff">
              <img class="pull-left" id="pro-pic" src="<?php echo $_SESSION['search_pro_pic']; ?>" width="200" height="200"</img>
              <h1 id="call-sign" class="pull-left"><?php echo $_SESSION['search_cs']; ?></h1>
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
    
    
   
</body>

<?php

 
 
 
  $logged_call_sign = $_SESSION['search_cs'];
  $link = mysqli_connect("localhost","dcaligiuri","","social");
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $servername = "localhost";
  $username = "dcaligiuri";
  $password = "";
  $dbname = "social";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT users.cs, friends.cs_friend, users.pro_pic
            FROM users
            INNER JOIN friends
            ON users.id=friends.hero_id
            WHERE users.cs='$logged_call_sign'";
            
  $result = mysqli_query($conn, $sql);
  
$friend_list = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
          array_push($friend_list, $row['cs_friend']);
    }

}

foreach ($friend_list as &$friend) {
     $sql = "SELECT users.cs, users.pro_pic
            FROM users
            WHERE users.cs='$friend'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              $friend_pro_pic = $row['pro_pic'];
              echo "
              <div class='col-lg-3 text-center'>
                <img src='$friend_pro_pic' alt='No Profile Picture' height='100' width='100'>
                    $friend
              </div>
              ";
    }

}
}





?>