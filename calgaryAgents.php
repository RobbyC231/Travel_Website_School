<?php
// robert code
require "ServerSideRegister\dbconnect.php"; //database connection page

 $grabAgentsCalgary = mysqli_query($mysqli, "SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=1");

 // print_r($grabAgentsCalgary); //used this to see if query came back with correct results

 $arrayAgentsCalgary = mysqli_fetch_all($grabAgentsCalgary, MYSQLI_ASSOC);

 foreach($arrayAgentsCalgary as $agents){
      echo  "<p>";
   foreach($agents as $key =>$value){
     echo $value . "<br>";
   }
   echo "</p>";
 }
 ?>
