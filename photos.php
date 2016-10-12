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
  $sql = "SELECT users.cs, pictures.url
            FROM users
            INNER JOIN pictures 
            ON users.id=pictures.hero_id
            WHERE users.cs='$logged_call_sign'";
            
            
  $result = mysqli_query($conn, $sql);
  
  
if (mysqli_num_rows($result) > 0) {
  


    while($row = mysqli_fetch_assoc($result)) {

        if ($row['cs'] == $logged_call_sign ){
          $pic = ($row["url"]);
        echo "
        <div class='col-lg-4 text-center'>
        <img src='$pic' alt='No Pro Pic' height='400' width='400'>
        </div>
        ";
        }
    }
    
}






?>

<form id="add-photo-form" action="addPhoto.php" method="post" class="text-center">
  <h1>Add a photo!</h1>
  <input type="text" name="add-photo-url" value="Photo URL"><br>
  <input type="submit" value="Submit">
</form>

</html>



