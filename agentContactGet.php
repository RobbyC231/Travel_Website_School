<?php
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
    $grabAgency = mysqli_query($dbh, "SELECT * FROM agencies");
    // print_r($grabAgency); //this was to show if query was getting anything
    $array = mysqli_fetch_all($grabAgency, MYSQLI_ASSOC);
    // print_r($array); //this was used to see what was on the array

    $grabAgentsCalgary = mysqli_query($dbh, "SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=1");
    // print_r($grabAgentsCalgary); //used to test if query resturned results

    $arrayCalgary = mysqli_fetch_all($grabAgentsCalgary, MYSQLI_ASSOC);
    // print_r($arrayCalgary); //used to see if assosative array had correct values

    foreach($arrayCalgary as $calgaryAgent){
      echo "<p>";
      foreach($calgaryAgent as $key =>$value){
        echo $value;
      }
      echo "</p>";
    }

    $grabAgentsOkotoks = mysqli_query($dbh, "SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=2");

    print_r($grabAgentsOkotoks); //used to test if query resturned results


     ?>
