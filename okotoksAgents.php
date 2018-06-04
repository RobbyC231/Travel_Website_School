<?php
// robert code
require "ServerSideRegister\dbconnect.php"; //database connection page

 $grabAgentsOkotoks = mysqli_query($mysqli, "SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=2");

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
