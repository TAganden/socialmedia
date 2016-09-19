<?php

$link = mysqli_connect("localhost", "dcaligiuri", "", "social");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




$cs = mysqli_real_escape_string($link, $_POST['cs']);
$real_name = mysqli_real_escape_string($link, $_POST['real-name']);
$age = mysqli_real_escape_string($link, $_POST['age']);
$height = mysqli_real_escape_string($link, $_POST['height']);
$occupation = mysqli_real_escape_string($link, $_POST['occupation']);
$boo = mysqli_real_escape_string($link, $_POST['boo']);
$affliation = mysqli_real_escape_string($link, $_POST['affliation']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$pro_pic = mysqli_real_escape_string($link, $_POST['pro-pic']);


$sql = "INSERT INTO users (cs, name, age, height, occupation, boo, affliation, password, pic) VALUES ('$cs', '$real_name', '$age', '$height', '$occupation', '$boo',
'$affliation', '$password', '$pro_pic')";
if(mysqli_query($link, $sql)){
    echo "Your account has been created!";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
