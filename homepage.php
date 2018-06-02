 <html>
<head>
      <title>Travel Agency</title>
      <link href="homestyle.css" rel="stylesheet" type="text/css">
      <script type="text/javascript">
                var cycle = 0;
                var allBackgrounds = [ "images/background1.jpg",
                     "images/background2.jpg",
                     "images/background3.jpg",
                     "images/background4.jpg",
                     "images/background5.jpg" ];

                function myFunction()
                {
                  if (cycle < 5)
                  {
                      document.body.style.backgroundImage = "url('" + allBackgrounds[cycle] + "')";
                      cycle += 1;
                  }
                  else
                  {
                      cycle = 0;
                  }
                }
      </script>
</head>      
<body onload="setTimeout(myFunction, 3000);">
          <div class="bgimage">
                  <header>
                    <?php
                         include_once 'Banner/navbar.php';
                    ?>
                   </header>

                   <main>
                        <center><h1 id="offers_title"> Our Exciting Offers </h1> </center>
                        <div class="package1">
                                <h3> Bora Bora </h3>
                        </div>
                        <div class="package2">
                                <h3> San Francisco </h3>
                        </div>
                        <div class="package3">
                                <h3> New York </h3>
                        </div>
                   </main>
          </div>
</body>
</html>
