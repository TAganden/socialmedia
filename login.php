<html><body>
<?php




$username= $_GET['username'];
$password = $_GET['password'];

$con = mysqli_connect("localhost","dcaligiuri","","members");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
$qz = "SELECT id FROM members where username='".$username."' and password='".$password."'" ;
$qz = str_replace("\'","",$qz);
$result = mysqli_query($con,$qz);



while($row = mysqli_fetch_array($result))
  {
  echo "Welcome" . " " . $username . "!";
  }
    mysqli_close($con);
?>

</body>
</html>



