<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <!-- robert clements-->
  <!-- this is used to check for what method it used and if login was pressed or register was pressed -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if (isset($_POST['login'])) { //user logging in
      require $_SERVER["DOCUMENT_ROOT"] . '/WebsiteProject/ServerSideRegister/loginVerify.php';
    }
    elseif (isset($_POST['register'])) { //user registering
      header("location:customer_registration.php");
    }
    elseif (isset($_POST['logout'])){ //user logout
      require $_SERVER["DOCUMENT_ROOT"] . '/WebsiteProject/ServerSideRegister/logout.php';
    }
  }
  // var_dump($_SESSION); //used to check if the session is cleared after logged in
?>
<!-- robert clements-->
  <body>
    <!--Chris Earle- the modal html code along with js to close on click outside modal-->
<!-- The Modal -->
<div id="loginModal" class="modal">
    <!-- Modal Content -->
    <form class="modal-content animate" method="post">

    <div>
        <!--the little x to close the modal-->
        <span onclick="document.getElementById('loginModal').style.display='none'"
        class="close">&times;</span>

        <label for="username"><b>Username: </b></label>
        <input type="text" placeholder="Enter Username" name="username">
        <br/>

        <label for="password"><b>Password: </b></label>
        <input type="password" placeholder="Enter Password" name="password">
        <br/>

        <button class="buttons" type="submit" name="login">Login</button>

        <!--we can remove the remember me later, might be lots of work-->
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>
        <!--we can remove the forgot password later, might be lots of work-->
        <div class="container" style="background-color:#f1f1f1">
            <button class="buttons" type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="ServerSideRegister\emailFormReset.php">password?</a></span>
        </div>
        <button type="submit" name="register">Register</button>
        <button type="submit" name="logout">Logout</button>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('loginModal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
