<?php

include('templates/header.html');

$to_add_cs = $_POST['friends_call_sign'];
$logged_call_sign = $_SESSION['cs'];
$logged_id = $_SESSION['id'];


$con = mysqli_connect("localhost","dcaligiuri","","social");


$qz = "SELECT friends.hero_id, users.id, users.cs, friends.cs_friend
      FROM friends
      INNER JOIN users
      ON users.id=friends.hero_id
      WHERE users.cs='$logged_call_sign'";
      
$qz = str_replace("\'","",$qz);
$result = mysqli_query($con,$qz);

if($row = mysqli_fetch_array($result))
  {
    $add_friend_cs = $to_add_cs;
    $where_to_add_id = $row['id'];
    
    $sql = "INSERT INTO friends (hero_id, cs_friend)
VALUES ('$where_to_add_id', '$add_friend_cs')";



if ($con->query($sql) === TRUE) {
    header("Location: friends.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

  }
  else{
      $sql = "INSERT INTO friends (hero_id, cs_friend)
VALUES ('$logged_id', '$to_add_cs')";



if ($con->query($sql) === TRUE) {
    header("Location: friends.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

  }




 
    mysqli_close($con);
    
    
    //  INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
?>




            
