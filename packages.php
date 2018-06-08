<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Vacation Packages</title>
	<meta name="viewport" content="width=device-width">
  <?php require("bootstrap.php") ?>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery.redirect.js"></script>
		<link rel="stylesheet" href="css/footer.css">
	<style type="text/css">
		body{color: white; border-top: 0;
    		margin: 0; padding: 0;clear: both;
    		font-family: 'Montserrat', sans-serif;
    		background-image: url("images/bora_bora2.jpeg");
    	}
		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			}
		#packageMenu {
			display: flex; flex-wrap: wrap;
			background-color:#242424;
			margin: 3vw;
			opacity: 0.90;
		}
		.sectHead{margin: 1vw;width: 100vw}
		.packageStyling{
			color: black; font-size: 250%;
			text-align: left;
			width: 40vw; height: 45vh;
			margin: 1vw; float: left;
			background-color:#3F3F3F;
		}
		#packageDisplay{
			color: black;
			width: 95vw;
		}
	</style>
</head>
<body>
	<div class="content">
	<?php include "include/navbar.php"?>
	<br/><br/>
	<section id="packageMenu">
		<h2 class="sectHead">Our Travel Packages</h2>
		<?php
			$dbinst = mysqli_connect("localhost","root","","travelexperts");
			if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
			$result = mysqli_query($dbinst, "SELECT * FROM packages");

			while ($row=mysqli_fetch_assoc($result))
				{
					$image;
					//Change image according to package name
					if($row['PkgName']=="Caribbean Tour"){$image="carribean.jpg";}
					else if($row['PkgName']=="Polynesian Paradise"){$image="polynesia.jpg";}
					else if($row['PkgName']=="Asian Expedition"){$image="asianhiking.jpg";}
					else if($row['PkgName']=="European Vacation"){$image="europevac.jpg";}
          //echo $_SESSION['userId'];

					//Create items for packages
					echo
					"<div name='packages' class='packageStyling' data-toggle='modal' data-target='#packageDisplay' onclick='popupTravel(\"".$row['PackageId']."\",\"".$row['PkgName']."\",\"".$row['PkgStartDate']."\",\"".$row['PkgEndDate']."\",\"".$row['PkgDesc']."\",\"".$row['PkgBasePrice']."\");'
					style='background-image:url(\"images/flightpackagepics/".$image."\");'>"
					.$row['PkgName']."</div>";
					//$row[2].$row[3].$row[4].$row[5]
				}
        //verifyUserForPackage(\"".$userId."\");
		?>
	</section>
</div>
	<?php
      //echo $_SESSION['userId'];
      include "include/footer.php"; ?>

	<!--Screenpopup-->
	<div class="modal fade" id="packageDisplay" role="dialog">
    	<div class="modal-dialog modal-lg">

      		<!-- Modal content-->
      		<div class="modal-content" id="popupBox">
        		<div class="modal-header" id="popupHead">
        	  	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	  		<h4 class="modal-title" id="popupName">(Tourname)</h4>
        		</div>
        		<div class="modal-body" id="popupContent">
        	  		<p>(Tourdescription)</p>
        		</div>
        		<div class="modal-footer">
                <h4 class="modal-title" id="popupPrice">(Price)</h4><button id="book" type="button" class="btn btn-default" >Book</button>
        	</div>
      		</div>
    	</div>
  	</div>
  	<script type="text/javascript">
  		function popupTravel($packageId, $packname, $packstart, $packend, $packdesc, $packprc){
  			//console.log($packname);
        var $image = "";
        if($packname=="Caribbean Tour"){$image="carribean.jpg";}
          else if($packname=="Polynesian Paradise"){$image="polynesia.jpg";}
          else if($packname=="Asian Expedition"){$image="asianhiking.jpg";}
          else if($packname=="European Vacation"){$image="europevac.jpg";}

        $("#popupBox").css("backgroundImage", "url('images/flightpackagepics/"+$image+"')");
        $("#popupName").html($packname);
        $("#popupContent").html(
            $packstart+"<br/>"+
            $packend+"<br/>"+
            $packdesc);
        $("#popupPrice").html($packprc);
        $("#book").click(function(){verifyUserForPackage(
          /////////pass UserId to verification
          <?php
            $userId = "";
            if($_SESSION){$userId=$_SESSION['userId'];}
            echo "'".$userId."'";
          ?>,
          /////////pass PackageId to verification
          $packageId
          );});
  		}

      function verifyUserForPackage($userId, $packageId){
        //console.log($userId);
        if($userId!="")
          {
            $("#packageDisplay").modal('hide');
            //alert("Logged in");
            //EDIT THIS IF DIRECTORY IS CHANGED
            $.redirect("confirmOrder.php",
              {
                'userId': $userId,
                'packageId': $packageId
              }
              );
            //window.location.href = "http://localhost/WebsiteProject/sqlact/addbooking.php";

          }
        else
          {
            $("#packageDisplay").modal('hide');
            alert("Please log in or register for new user");
            $("#loginModal").modal('show');
          }
      }
  	</script>
</body>
</html>
