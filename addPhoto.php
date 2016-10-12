<?php
    include("templates/header.html");
    $url_to_add = $_POST['add-photo-url'];
    $logged_call_sign = $_SESSION['cs'];
    $logged_id = $_SESSION['id'];
    $con = mysqli_connect("localhost","dcaligiuri","","social");
    $sql = "INSERT INTO pictures (hero_id, url)
        VALUES ('$logged_id', '$url_to_add')";
   
    if ($con->query($sql) === TRUE) {
        header("Location: photos.php");
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }

    mysqli_close($con);

?>



