<?php
// robert code
  require "ServerSideRegister\dbconnect.php"; //database connection page

    //query to grab items from database
    $grabAgency = mysqli_query($mysqli, "SELECT AgncyAddress, AgncyCity, AgncyProv, AgncyPostal, AgncyCountry, AgncyPhone, Agncyfax FROM agencies");
    // print_r($grabAgency); //this was to show if query was getting anything
    $array = mysqli_fetch_all($grabAgency, MYSQLI_ASSOC);
    // print_r($array); //this was used to see what was on the array
    // echo "<div class='row'>";
    foreach($array as $agencies){
      if($agencies==1){
        echo "<h5>Travel Experts Calgary</h5>";
      }
      else{
        echo "<h5>Travel Exprets Okotoks</h5>";
      }
      // echo "<div class='col-sm-6'>
            echo  "<p>";
      foreach($agencies as $key =>$value){
        echo $value . "<br>";
      }
      echo "   </p>";
            // </div>";
    }
    // echo "</div>";
     ?>
