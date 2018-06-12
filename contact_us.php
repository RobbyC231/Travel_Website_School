<!DOCTYPE html>
<!-- robert clements -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <!-- normilize css file being lodaing in -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <!-- bootstrap being loading in -->
    <?php require("bootstrap.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/contactUs.css" />
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <div class="content">
    <?php include("include/navbar.php") ?>
    <!-- jumbotron is holding the image and contact us wordds at top of page -->
      <div class="jumbotron rounded-0">
        <div id="jumboInfo">
          <h1 class="display-3 text-center">Contact US</h1>
          <p class="lead text-center">We would love to hear from you!</p>
        </div>
      </div>

  <!-- this is a row to hold the contact info of each office -->
  <div class="container-fluid">
    <?php include("agenciesContact.php") ?>
  </div>
    <!--footer for page -->
  </div>
    <?php include("include/footer.php")  ?>
  </body>
<!-- robert   -->
</html>
