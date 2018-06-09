<?php
//session start was running twice do not add back in
//session_start();
// robert clements
/* User login process, checks if user exists and password is correct */

require "dbconnect.php"; //connect to database
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM customers WHERE CustEmail='$email'");


// echo $email;
// print_r($result); //use this to see what user email doesnt exist message wasnt coming up. it is because some customers dont have emails

if ( $result->num_rows == 0 ){ // User doesn't exist
  $_SESSION['message'] = "User with that email doesn't exist!";
  // echo $_SESSION['message'];
  header("location: ServerSideRegister/error.php");
}
else { // User exists
  $user = $result->fetch_assoc();



  // print_r($user); //used to see results of array
  if ( password_verify($_POST['password'], $user['CustPassword']) ) {

      $_SESSION['email'] = $user['CustEmail'];
      $_SESSION['first_name'] = $user['CustFirstName'];
      $_SESSION['last_name'] = $user['CustLastName'];
      $_SESSION['address'] = $user['CustAddress'];
      $_SESSION['city'] = $user['CustCity'];
      $_SESSION['phone'] = $user['CustBusPhone'];
      $_SESSION['active'] = $user['Active'];
      $_SESSION['userId'] = $user["CustomerId"];

      // This is how we'll know the user is logged in see under navbar.php -Chris
      $_SESSION['logged_in'] = true;
      //end Chris

      //do not add back in we do not want to redirect to contact
      //-Chris
      //header("location:contact_us.php");

  }
  else {
      $_SESSION['message'] = "You have entered wrong password, try again!";
      // echo $_SESSION['message'];
      $_SESSION['failed_password'] = "You have entered wrong password, try again!";
      //header('Location: ' . $_SERVER['HTTP_REFERER']);
      header("location: ServerSideRegister/error.php");




  }

}
// robert clements
?>
