<?php
// robert code
  require("ServerSideRegister\dbconnect.php");//database connection page

    //query to grab items from database
    $grabAgency = "SELECT AgencyId, AgncyAddress, AgncyCity, AgncyProv, AgncyPostal, AgncyCountry, AgncyPhone, Agncyfax FROM agencies";
    // $array = mysqli_fetch_assoc($grabAgency);
    // print_r($array); //this was used to see what was on the array
    // echo "<div class='row'>";
    if($result = mysqli_query($mysqli, $grabAgency)){
      // print_r($result);//used to see if query worked
      while($row = mysqli_fetch_assoc($result)){
          echo $row["AgncyAddress"] . "<br>";
          echo $row["AgncyCity"] . $row["AgncyProv"]. $row["AgncyCountry"];
          echo $row["AgncyPostal"] . "<br>";
          echo $row["AgncyPhone"] . "<br>";
          echo $row["Agncyfax"] . "<br>";

          getAgentInfo($row["AgencyId"]);
        // print_r ($row); used to see if row is making array for each row
      }
    }

    function getAgentInfo($agencyId){

      require("ServerSideRegister\dbconnect.php");

       $grabAgents = "SELECT AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents where AgencyId=$agencyId";

         $count=0;

      if($result = mysqli_query($mysqli, $grabAgents)){
        // print_r($result);//used to see if query worked
        while($row = mysqli_fetch_assoc($result)){
          if($count%2==1){
            echo '<div class="row">';
          }
          echo '<div class="col-sm-6">';
          echo $row["AgtFirstName"] . " " . $row["AgtLastName"] . "<br>";
          echo $row["AgtBusPhone"] . "<br>";
          echo $row["AgtEmail"] . "<br>";
          // print_r($row); //used to see if array for each row was made
          echo "</div>";
          // print_r($count);
          $count++;
        }

     }

    }
      // echo "<div class='col-sm-6'>



    //         echo  "<p>";
    //   foreach($agencies as $key =>$value){
    //     echo $value . "<br>";
    //   }
    //   echo "   </p>";
    //         // </div>";
    // }
    // // echo "</div>";
     ?>
