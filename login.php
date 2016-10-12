<html><body>
<?php

session_start();
$username = $_GET['cs'];
$password = $_GET['password'];



$con = mysqli_connect("localhost","dcaligiuri","","social");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
$qz = "SELECT id, pro_pic FROM users where cs='".$username."' and password='".$password."'" ;
$qz = str_replace("\'","",$qz);
$result = mysqli_query($con,$qz);


while($row = mysqli_fetch_array($result))
  {

  $_SESSION['cs'] = $username;
  $_SESSION['id'] = $row['id'];
  $_SESSION['pro_pic'] = $row['pro_pic'];
  header("Location: home.php");
  }

    mysqli_close($con);
?>

</body>
</html>



