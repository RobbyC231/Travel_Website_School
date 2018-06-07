<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Vacation Packages</title>
	<meta name="viewport" content="width=device-width">
    <link href="homestyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="js/jquery-3.3.1.min.js"></script>
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
	<?php include("include/navbar.php")?>
	<br/><br/>
	<section id="packageMenu">
		<h2 class="sectHead">Our Travel Packages</h2>
		<?php
			$dbinst = mysqli_connect("localhost","root","","travelexperts");
			if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
			$result = mysqli_query($dbinst, "SELECT * FROM packages");
			while ($row=mysqli_fetch_row($result))
				{
					$image = "";
					//Change image according to package name
					if($row[1]=="Carribean Tour"){$image="carribean.jpg";}
					else if($row[1]=="Polynesian Paradise"){$image="polynesia.jpg";}
					else if($row[1]=="Asian Expedition"){$image="asianhiking.jpg";}
					else if($row[1]=="European Vacation"){$image="europevac.jpg";}

					//Create items for packages
					echo
					"<div class='packageStyling' data-toggle='modal' data-target='#packageDisplay' onclick='popupTravel(\"".$image."\",\"".$row[1]."\")'
					style='background-image:url(\"images/flightpackagepics/".$image."\");'>"
					.$row[1]."</div>";
					//$row[2].$row[3].$row[4].$row[5]
				}
		?>
	</section>
	<p id="demo"></p>

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
       	 	  		<h4 class="modal-title" id="popupPrice">(Price)</h4><button type="button" class="btn btn-default">Book</button>
        	</div>
      		</div>
    	</div>
  	</div>
  	<script type="text/javascript">
  		function popupTravel($packname){
  			//console.log($packname);
  			if($packname=="carribean.jpg"){
  				$("#popupBox").css("backgroundImage", "url('images/flightpackagepics/carribean.jpg')");
  				$("#popupName").html("Caribbean Tour");
  				$("#popupContent").html(
  					"2018-06-11<br/>"+
  					"2018-06-20<br/>"+
  					"Cruise the Caribbean & Celebrate the New Year.<br/>");
  				$("#popupPrice").html("4800.00");
  			}
  			else if($packname=="polynesia.jpg"){
  				$("#popupBox").css("backgroundImage", "url('images/flightpackagepics/polynesia.jpg')");
  				$("#popupName").html("Polynesian Paradise");
  				$("#popupContent").html(
  					"2018-06-17<br/>"+
  					"2018-06-26<br/>"+
  					"9 Day All Inclusive Hawaiian Vacation.<br/>");
  				$("#popupPrice").html("3000.00");
  			}
  			else if($packname=="asianhiking.jpg"){
  				$("#popupBox").css("backgroundImage", "url('images/flightpackagepics/asianhiking.jpg')");
  				$("#popupName").html("Asian Expedition");
  				$("#popupContent").html(
  					"2018-06-14<br/>"+
  					"2018-06-29<br/>"+
  					"Airfaire, Hotel and Eco Tour.<br/>");
  				$("#popupPrice").html("2800.00");
  			}
  			else if($packname=="europevac.jpg"){
  				$("#popupBox").css("backgroundImage", "url('images/flightpackagepics/europevac.jpg')");
  				$("#popupName").html("European Vacation");
  				$("#popupContent").html(
  					"2018-06-02<br/>"+
  					"2018-06-17<br/>"+
  					"Euro Tour with Rail Pass and Travel Insurance.<br/>");
  				$("#popupPrice").html("3000.00");
  			}
  		}
  	</script>
		<?php include("include/footer.php") ?>
</body>
</html>
