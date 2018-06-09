 <html>
<head>
      <title>Travel Agency</title>
      <link rel="stylesheet" href="css/default.css">
      <?php require("bootstrap.php") ?>
      <link rel="stylesheet" type="text/css" href="css/home_style.css" />
      <link rel="stylesheet" href="css/footer.css">
</head>
  <body>
    <div class=content>
    <?php
      include("include/navbar.php");
    ?>
    <div class="jumbotron rounded-0">
      <div id="jumboInfo">
        <h1 class="display-4 text-center font-weight-bold">Travel Experts</h1>
        <h5 class="text-center">Your Experts in Travel!<h5>
      </div>
    </div>
    <div class="container-fluid">
      <h4>Who we are</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <br>
    <h2 class="text-center">Popular Packages</h2>

  <div id="package_container" class="container mb-3 w-150 ">  <!-- Brijesh  start-->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images\flightpackagepics\carribean.jpeg" alt="First slide">
          <div class="carousel-caption d-none d-sm-block">
            <h3> Caribbean Tour </h3>
            <h4> 8 Night 9 days... only $4800 </4>
          </div>
      </div>
     <div class="carousel-item">
          <img class="d-block w-100" src="images\flightpackagepics\polynesia.jpeg" alt="Second slide">
        <div class="carousel-caption d-none d-sm-block">
          <h3> Polynesian Paradise </h3>
          <h4> 8 Night 9 days... only $3000 </4>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images\flightpackagepics\asianhiking.jpeg" alt="Third slide">
         <div class="carousel-caption d-none d-sm-block">
            <h3> Asian Expedition </h3>
            <h4> 14 Night 15 days... only $2800 </4>
          </div>
    </div>
   </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
  </div>
</div>
</div>
  <footer>
    <?php
      include("include/footer.php");
    ?>
  </footer>
</body>
</html>  <!-- /Brijesh end -->
