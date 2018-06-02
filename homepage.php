 <html>
<head>
      <title>Travel Agency</title>
     <link href="home_style.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


</head>
<body>

    <!--   style="background: url(images/background1.jpg);background-repeat:no-repeat; background-size:100% 100%"  -->
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
                        <center><h1 id="offers_title"> Our Exciting Offers </h1> </center>
                        <div class="package1">
                                <div class="package1_content">
                                  <h3> Bora Bora </h3>
                                  <h4> 3 Night 4 days... only $1200 </4>
                                </div>
                        </div>
                        <div class="package2">
                                <div class="package2_content">
                                  <h3> San Francisco </h3>
                                  <h4> 5 Night 6 days... only $800 </4>
                                </div>
                        </div>
                        <div class="package3">
                                <div class="package3_content">
                                  <h3> New York </h3>
                                  <h4> 6 Night 7 days... only $1000 </4>
                                </div>
                        </div>
                   </main>
          </div>
</body>
</html>
