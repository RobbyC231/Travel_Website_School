<?php
  // Robert Clements
  // this is being used to connect to the database
  $mysqli = new mysqli("localhost","root","","travelexperts");
    //check if connection is succesful
      if(!$mysqli){
        echo "Error number:".mysqli_connect_errno().PHP_EOL; //shows error number
        echo "Error message:" .mysqli_connect_error().PHP_EOL; // shows error message
        exit;
      }
      else{
        // echo "Connection setup <br>";
      }
 ?>
