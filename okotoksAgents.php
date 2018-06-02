<?php
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

 $grabAgentsOkotoks = mysqli_query($dbh, "SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=2");

 // print_r($grabAgentsCalgary); //used this to see if query came back with correct results

 $arrayAgentsOkotoks = mysqli_fetch_all($grabAgentsOkotoks, MYSQLI_ASSOC);

 foreach($arrayAgentsOkotoks as $agents){
   echo "<p>";
   foreach($agents as $key =>$value){
     echo $value . "<br>";
   }
   echo "</p>";
 }
 ?>
