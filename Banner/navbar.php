<head>
    <!--this css is for styling the login modal-->
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
</head>

<div class="menu">
  <div class="leftmenu">
      <h4>PARADISE TRAVELS</h4>
  </div>

  <div class="rightmenu">
        <ul>
              <li id="firstlist"><a href="homepage.php"> HOME </a></li>
              <li id="secondlist"><a href="TravPackages.html"> PACKAGE </a> </li>
              <li id="thirdlist"><a href="customer_registration.php"> REGISTER </li>
              <li id="fourthlist"><a href="contact_us.html"> CONTACT US </a></li>
              <!--I modified this link to open the login modal- Chris-->
              <li id="fourthlist"><a href="#loginModal.php" onclick="document.getElementById('loginModal').style.display='block'"> LOGIN </a></li>
        </ul>

        <?php
            //this it the include php for the login modal
            include '../include/login.php';
        ?>
  </div>
 </div>
