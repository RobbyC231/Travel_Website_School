<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);
//redirects to the page that the logout was run from - Chris

// echo "logout done <br>"; //debugging
?>
