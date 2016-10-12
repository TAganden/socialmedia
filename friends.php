


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://use.fontawesome.com/8f2d22fdf5.js"></script>
<link href="styles/home.css" rel="stylesheet">

<?php 
  include('templates/nav.html');
  include("templates/header.html");
  $logged_call_sign = $_SESSION['cs'];
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


<form id="add-friend-form" action="addFriend.php" method="post" class="text-center">
  <h1>Add your Friend!</h1>
  <input type="text" name="friends_call_sign" value="Call Sign"><br>
  <input type="submit" value="Submit">
</form>

</html>
