<?php
// robert clements
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
</head>
<body>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];
    else:
        header( "location: ../contact_us.php" );
    endif;
    ?>
    </p>
    <a href="../contact_us.php"><button class="button button-block"/>Home</button></a>
  <!-- robert clements   -->
</div>
</body>
</html>
