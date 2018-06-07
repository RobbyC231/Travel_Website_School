<!-- robert and brji and Chris -->
<?php
    session_start();
    $_SESSION['logged_in']=false; //this should change under loginVerify.php to true if login successful
    $_x=1;
    //not sure if we need a include for loginVerify.php
    //include("ServerSideRegister/loginVerify.php");
?>
<head>
    <!--this css is for styling the login modal-->
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
</head>
<?php
    //this it the include php for the login modal
    include('login.php');
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="#">Travel Experts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="homepage.php"> HOME <span class="sr-only">(current)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="packages.php"> PACKAGE </a></li>
              <li class="nav-item"><a class="nav-link" href="customer_registration.php"> REGISTER </li></a>
              <li class="nav-item"><a class="nav-link" href="contact_us.php"> CONTACT US </a></li>

              </li>
              <?php if($_SESSION['logged_in']){?>
                <li class='nav-item'>
                   <a class='nav-link' href='accountinfo.php'> ACCOUNT </a>
                </li>
            <?php }else{?>
                <li class='nav-item'>
                   <a class='nav-link' href='#loginModal.php' onclick='document.getElementById("loginModal").style.display="block"'> LOGIN </a>
                </li>
            <?php }?><!--Chris:end-->

            <?php?>
        </ul>
  </div>
</nav>
