<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Confirm Order</title>
	<meta name="viewport" content="width=device-width">
    <link href="home_style.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.redirect.js"></script>
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
		.displayBookingInfo {
			display: flex; flex-wrap: wrap;
			background-color:#242424;
			margin: 3vw;
			margin-bottom: 0vw;
			opacity: 0.90;
		}
		.packageStyling{
			font-size: 150%;
			text-align: left;
			width: 90vw; height: 15vh;
			margin: 1vw; float: left;
			background-color:#3F3F3F;
		}
		.flightStyling{
			font-size: 150%;
			text-align: left;
			width: 44vw; height: 45vh;
			margin: 1vw; float: left;
			background-color:#3F3F3F;
		}
		.bookingModifiers
		{
			display: flex; flex-wrap: wrap;
			background-color:#242424;
			margin: 3vw;
			margin-top: 0;
			opacity: 0.90;
		}
		.bookingModifiersForm
		{
			font-size: 150%;color: black;
			text-align: left;
			width: 35vw;
			margin: 1vw;margin-right: 0;
			float: left;background-color:#BBBBBB;
		}
		.bookingClass
		{
			font-size: 150%;color: black;
			text-align: left;
			width: 55vw;position:relative;
			margin: 1vw;margin-left: 0;
			float: left;background-color:#BBBBBB;
		}
		.onerow{width: 90vw;}
		.submitbutton{position: absolute;right: 0;bottom: 0;}
		input[type=number]{
    		width: 5vw;
		}
	</style>

  <?php session_start();//if(isset($_SESSION)){session_start();}?>

</head>
<body>
	<?php include "include/navbar.php"?>
	<?php
			$dbinst = mysqli_connect("localhost","root","","travelexperts");
			if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	?>
	<section class="displayBookingInfo">
		<h2 class="sectHead">Confirm your booking:</h2>
		<!--ENCAPSULATE THIS IN A PHP TAG FOR INTERACTION-->
		<div name="packageInfo" class="packageStyling">
			<?php
				$result = mysqli_query($dbinst, "SELECT * FROM packages WHERE PackageId='".$_POST['packageId']."'");
				$row = mysqli_fetch_assoc($result);
				echo $row['PkgName']."<br/>";
				echo $row['PkgStartDate']."<br/>";
				echo $row['PkgEndDate']."<br/>";
				echo "Price breakdown: <br/>";
				echo "Base Price: ".$row['PkgBasePrice']."<br/>";
				echo "Agency Commission: ".$row['PkgBasePrice']."<br/>";
				
				
			?>
		</div>
		<!--ENCAPSULATE THIS IN A PHP TAG FOR INTERACTION-->
		<div name="DepartPlaneInfo" class="flightStyling">(DEPART PLANE INFO)</div>
		<div name="ReturnPlaneInfo" class="flightStyling">(RETURN PLANE INFO)</div>
	</section>
	<article class="bookingModifiers">
		<h3 class="onerow">Fill in required additional info:</h3>
		<div class="bookingModifiersForm">
			<label>How many people:
				<input type="number" name="TravelerCount" cols="1"></label>
			<br/>
			Class:<br/>
			<table>
				<tr>
					<td><label><input type="radio" name="class" value="DLX">Delux</input></label></td>
					<td><label><input type="radio" name="class" value="ECN">Economy</input></label></td>
					<td><label><input type="radio" name="class" value="SNG">Single</input></label></td>
				</tr>
				<tr>
					<td><label><input type="radio" name="class" value="FST">First Class</input></label></td>
					<td><label><input type="radio" name="class" value="BSN">Business</input></label></td>
					<td><label><input type="radio" name="class" value="DBL">Double</input></label></td>
				</tr>
				<tr>
					<td><label><input type="radio" name="class" value="INT">Interior</input></label></td>
					<td><label><input type="radio" name="class" value="OCNV">Ocean View</input></label></td>
				</tr>
			</table>
		</div>
		<div class="bookingClass">
			(Some class Information)<br/>
			>Dis gonna be a bullet<br/>
			>Dis gonna be a bullet<br/>
			>Dis gonna be a bullet<br/>
			<input type="button" class="submitbutton" name="finishbooking" value="Finish Booking">
		</div>
	</article>
	<?php
     	 //echo $_SESSION['userId'];
     	 include "include/footer.php"; ?>
</body>
</html>