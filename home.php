<?php

  include('templates/nav.html');
  include('templates/header.html');

?>

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



</html>


