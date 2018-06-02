 <html>
<head>
      <title>Travel Agency</title>
      <link href="home_style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script type="text/javascript"></script>


</head>
<body>

          <div class="bgimage" >
            <video id="video-bg" preload="auto" autoplay="true" loop="loop" muted="muted"  >
                <source src="video/background.mp4" type="video/mp4" >
                  video not supported

            </video>
                  <header>
                    <?php
                         include_once 'Banner/navbar.php';
                    ?>
                   </header>


                   <main>
                    <center><h1> OUR EXCITING OFFERS </h1> </center>
                                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                 <ol class="carousel-indicators">
                                   <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                   <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                   <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                 </ol>
                                 <div class="carousel-inner">
                                   <div class="carousel-item active">
                                     <img class="d-block w-100" src="images/bora_bora.jpeg" alt="First slide">
                                             <div class="carousel-caption d-none d-md-block">
                                                  <h3> Bora Bora </h3>
                                                  <h4> 6 Night 9 days... only $1500 </4>
                                            </div>
                                   </div>
                                   <div class="carousel-item">
                                     <img class="d-block w-100" src="images/goldengate.jpg" alt="Second slide">
                                             <div class="carousel-caption d-none d-md-block">
                                                  <h3> San Francisco </h3>
                                                  <h4> 3 Night 4 days... only $800 </4>
                                            </div>

                                   </div>
                                   <div class="carousel-item">
                                     <img class="d-block w-100" src="images/NYC.jpg" alt="Third slide">
                                           <div class="carousel-caption d-none d-md-block">
                                                <h3> New York </h3>
                                                <h4> 7 Night 8 days... only $1200 </4>
                                          </div>
                                   </div>
                                 </div>
                                 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                   <span class="sr-only">Previous</span>
                                 </a>
                                 <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                   <span class="sr-only">Next</span>
                                 </a>
                               </div>
                   </main>
                   <footer>
                     <?php
                          include_once 'footer.php';
                     ?>
                   </footer>
          </div>
</body>
</html>
