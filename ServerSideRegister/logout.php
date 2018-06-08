<?php
session_start();
//echo $_SESSION["actives"];

//start Chirs
//This is to redirect to homepage for logout if accout page is active
if(isset($_SESSION["activepage"])){
    header("location: ../homepage.php");
}else{
    //redirects to the page that the logout was run from
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
//End Chris

/* Log out process, unsets and destroys session variables */

session_unset();
session_destroy();

if($_SESSION["current"] == "register")
{

  header("http://localhost:8080/phpcourse1/Travel_Website/homepage.php");
}
else {
     header('Location: ' . $_SERVER['HTTP_REFERER']);
}
//redirects to the page that the logout was run from - Chris

// echo "logout done <br>"; //debugging




?>
