 <html>
<head>
      <title>Travel Agency</title>
      <link rel="stylesheet" href="/css/default.css">
      <?php require("bootstrap.php") ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="css/home_style.css" />


</head>

  <?php
    include("include/navbar.php");
  ?>

  <body>
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
    <!-- <video id="video-bg" preload="auto" autoplay="true" loop="loop" muted="muted"  >
    <source src="video/background.mp4" type="video/mp4" >
    video not supported</video> -->
  <div class="container mb-3 w-50">
    <h4 class="text-center">Popular Packages</h4>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/bora_bora.jpeg" alt="First slide">
          <div class="carousel-caption d-none d-sm-block">
            <h3> Bora Bora </h3>
            <h4> 6 Night 9 days... only $1500 </4>
          </div>
      </div>
     <div class="carousel-item">
          <img class="d-block w-100" src="images/goldengate.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-sm-block">
          <h3> San Francisco </h3>
          <h4> 3 Night 4 days... only $800 </4>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/NYC.jpg" alt="Third slide">
         <div class="carousel-caption d-none d-sm-block">
            <h3> New York </h3>
            <h4> 7 Night 8 days... only $1200 </4>
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
  <footer>
    <?php
      include("include/footer.php");
    ?>
  </footer>
</body>
</html>
