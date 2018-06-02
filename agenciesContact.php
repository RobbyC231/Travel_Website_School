<?php
// robert code
  //this is used to connect to the database
    $dbh = new mysqli("localhost","root","","travelexperts");
  //check if connection is succesful
    if(!$dbh){
      echo "Error number:".mysqli_connect_errno().PHP_EOL; //shows error number
      echo "Error message:" .mysqli_connect_error().PHP_EOL; // shows error message
      exit;
    }
    else{
      // echo "Connection setup <br>";
    }
    //query to grab items from database
    $grabAgency = mysqli_query($dbh, "SELECT AgncyAddress, AgncyCity, AgncyProv, AgncyPostal, AgncyCountry, AgncyPhone, Agncyfax FROM agencies");
    // print_r($grabAgency); //this was to show if query was getting anything
    $array = mysqli_fetch_all($grabAgency, MYSQLI_ASSOC);
    // print_r($array); //this was used to see what was on the array

    echo "<div class='row'>";
    foreach($array as $agencies){
      echo "<div class='col-sm-6'>
              <p>";
      foreach($agencies as $key =>$value){
        echo $value . "<br>";
      }
      echo "   </p>
            </div>";
    }
    echo "</div>";
     ?>
