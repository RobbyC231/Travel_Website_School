<!-- robert and brij and Chris -->
<?php
    session_start();
    /*$activepage checks if the active page is account info if it is
    then a session variable is created as this was required to
    get this info into the logout.php via href='ServerSideRegister/logout.php'
    if the session variable exists in the logout the user will be returned to
    the homepage if they are on the account page, otherwise they stay on the
    current page - Chris*/
    if(isset($activepage)){
        $_SESSION["activepage"]="accountinfo";
    }
    /*Chris end*/
?>
<head>
</head>
<script type="text/javascript">
    window.onload = function(){
            unset($email,$result);
    }
</script>

<?php
    //this it the include php for the login modal
    include 'include/login.php';
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
                <!--Chris-toggle account/login button when logging in-->
                <?php if(isset($_SESSION['logged_in'])){?>
                    <li class='nav-item'>
                        <!--when logged in the user will see ACCOUNT in the navbar-->
                        <a class='nav-link' href='accountinfo.php'> ACCOUNT </a>
                    </li>
                    <li class='nav-item'>
                        <!--when logged in the user will see lOGOUT in the navbar-->
                        <a class='nav-link' href='ServerSideRegister/logout.php'> LOGOUT </a>
                    </li>
                <?php }else{?>
                    <li class="nav-item">
                        <!--when not logged in the user will see LOGIN in the navbar-->
                        <a class="nav-link" data-toggle="modal" href="#loginModal"> LOGIN </a>
                    </li>
                <?php }?><!--Chris:end-->
        </ul>
  </div>
</nav>
