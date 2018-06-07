<?php
// robert code
//database connection page

function getAgentInfo($agencyId){

  require "ServerSideRegister\dbconnect.php";

   $grabAgents = 'SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=$row["AgencyId"]';

  if($result = mysqli_query($mysqli, $grabAgents)){
    // print_r($result);//used to see if query worked
    while($row = mysqli_fetch_assoc($result)){
      // $count=2;
      // if($count%2==1){
      //   echo "<div class=row>";
      // }
      // echo $row["AgtFirstName"] . " " . $row["AgtLastName"] . "<br>";
      // echo $row["AgtBusPhone"] . "<br>";
      print_r($row);
    }
 }
}

 // print_r($grabAgentsCalgary); //used this to see if query came back with correct results

 // $arrayAgentsCalgary = mysqli_fetch_all($grabAgentsCalgary, MYSQLI_ASSOC);
 //
 // foreach($arrayAgentsCalgary as $agents){
 //      echo  "<p>";
 //   foreach($agents as $key =>$value){
 //     echo $value . "<br>";
 //   }
 //   echo "</p>";
 // }
 ?>
