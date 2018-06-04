<?php
session_start();
// robert clements
/* User login process, checks if user exists and password is correct */

require "dbconnect.php"; //connect to database
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM customers WHERE CustEmail='$email'");

// echo $email;
// print_r($result); //use this to see what user email doesnt exist message wasnt coming up. it is beucase some customers dont have emails

if ( $result->num_rows == 0 ){ // User doesn't exist
  $_SESSION['message'] = "User with that email doesn't exist!";
  // echo $_SESSION['message'];
  // header("location: error.php");
}
else { // User exists
  $user = $result->fetch_assoc();
  // print_r($user); //used to see results of array
  if ( password_verify($_POST['password'], $user['CustPassword']) ) {

      $_SESSION['email'] = $user['CustEmail'];
      $_SESSION['first_name'] = $user['CustFirstName'];
      $_SESSION['last_name'] = $user['CustLastName'];
      $_SESSION['active'] = $user['Active'];

      // This is how we'll know the user is logged in
      $_SESSION['logged_in'] = true;
      // header("location:contact_us.php");

  }
  else {
      $_SESSION['message'] = "You have entered wrong password, try again!";
      // echo $_SESSION['message'];
      // header("location: ServerSideReegister/error.php");
  }
}
// robert clements
?>
