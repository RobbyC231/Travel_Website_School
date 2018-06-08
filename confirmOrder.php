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
			text-align: center;
			width: 90vw; display: inline-block;
			margin: 1vw; float: left;
			background-color:#3F3F3F;
		}
		.flightStyling{
			font-size: 150%;
			text-align: left;
			width: 44vw; display: inline-block;
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
				echo "Package Name: ".$row['PkgName']."<br/>";
				echo "Starting Date: ".$row['PkgStartDate']."<br/>";
				echo "Ending Date: ".$row['PkgEndDate']."<br/>";
				echo "Price breakdown: <br/>";
				echo "Base Price: ".$row['PkgBasePrice']."<br/>";
				echo "Agency Commission: ".$row['PkgAgencyCommission']."<br/>";
				$departPlnId = $row['DeparturePlnId'];
				$returnPlnId = $row['ReturnPlnId'];
			?>
		</div>
		<!--ENCAPSULATE THIS IN A PHP TAG FOR INTERACTION-->
		<div name="DepartPlaneInfo" class="flightStyling">
			<?php
				$result = mysqli_query($dbinst, "SELECT * FROM flightstable WHERE FlightId='".$departPlnId."'");
				$row = mysqli_fetch_assoc($result);
				echo "Plane information for departure:<br/>";
				echo "Plane No: ".$row['FltPlaneNo']."<br/>";
				echo "Departure date: ".$row['FltDepart']."<br/>";
				echo "Flight path: ".$row['FltLocation'].">".$row['FltDestination']."<br/>";
				echo "Region: ".$row['RegionId']."<br/>";
				echo "Ticket Price: ".$row['FltTicketPrice']."<br/>";
			?>
		</div>
		<div name="ReturnPlaneInfo" class="flightStyling">
			<?php
				$result = mysqli_query($dbinst, "SELECT * FROM flightstable WHERE FlightId='".$returnPlnId."'");
				$row = mysqli_fetch_assoc($result);
				echo "Plane information for return:<br/>";
				echo "Plane No: ".$row['FltPlaneNo']."<br/>";
				echo "Departure date: ".$row['FltReturn']."<br/>";
				echo "Flight path: ".$row['FltDestination'].">".$row['FltLocation']."<br/>";
				echo "Region: ".$row['RegionId']."<br/>";
				echo "Ticket Price: ".$row['FltTicketPrice']."<br/>";
			?>
		</div>
	</section>
	<article class="bookingModifiers">
		<h3 class="onerow">Fill in required additional info:</h3>
		<div class="bookingModifiersForm">
			<label>How many people:
				<input type="number" id="TravelerCount" name="TravelerCount" value="1" min="1" cols="1"></label>
			<br/>
			Class:<br/>
			<table>
				<tr>
					<td><label><input type="radio" class="classCk" name="class" value="DLX" onchange="classSelected('DLX')">Delux</input></label></td>
					<td><label><input type="radio" class="classCk" name="class" value="ECN" onchange="classSelected('ECN')">Economy</input></label></td>
					<td><label><input type="radio" class="classCk" name="class" value="SNG" onchange="classSelected('SNG')">Single</input></label></td>
				</tr>
				<tr>
					<td><label><input type="radio" class="classCk" name="class" value="FST" onchange="classSelected('FST')">First Class</input></label></td>
					<td><label><input type="radio" class="classCk" name="class" value="BSN" onchange="classSelected('BSN')">Business</input></label></td>
					<td><label><input type="radio" class="classCk" name="class" value="DBL" onchange="classSelected('DBL')">Double</input></label></td>
				</tr>
				<tr>
					<td><label><input type="radio" class="classCk" name="class" value="INT" onchange="classSelected('INT')">Interior</input></label></td>
					<td><label><input type="radio" class="classCk" name="class" value="OCNV" onchange="classSelected('INT')">Ocean View</input></label></td>
				</tr>
			</table>
		</div>
		<div class="bookingClass">
			<p id="classInfo"></p>
			<input type="button" class="submitbutton" id="finishbooking" name="finishbooking" value="Finish Booking"
			onclick="sendToAddBooking(
				`<?php echo $_POST['userId'];?>`,
				`<?php echo $_POST['packageId'];?>`,
				`<?php echo $departPlnId;?>`,
				`<?php echo $returnPlnId?>`
			)" hidden>
		</div>
	</article>
	<?php include "include/footer.php"; ?>
	<script type="text/javascript">
  		function sendToAddBooking($userId, $packageId, $DeparturePlnId, $ReturnPlnId){
  			var TravelerCount = $('#TravelerCount').val();
  			var ClassId = $(".classCk:checked").val();
  			//alert($userId+"\n"+$packageId+"\n"+$DeparturePlnId+"\n"+
  			//	$ReturnPlnId+"\n"+TravelerCount+"\n"+ClassId);
  			$.redirect("sqlact/addbooking.php",
              {
                'userId': $userId,
                'packageId': $packageId,
                'DeparturePlnId': $DeparturePlnId,
                'ReturnPlnId': $ReturnPlnId,
                'TravelerCount': TravelerCount,
                'ClassId': ClassId
              }
              );
  		}
  		function classSelected($classId)
  		{
  			$('#finishbooking').show();
  			$constructClassDesc = "";
  			if($classId=="DLX"){
  				$constructClassDesc+="Delux Class<br/>"+
  				"<ul>"+
  					"<li>You will enjoy our standard quality service.</li>"+
  					"<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>"+
  					"<li>Interdum et malesuada fames ac ante ipsum primis in faucibus.</li>"+
  					"<li>Nunc non tortor elementum, sollicitudin erat in, elementum elit.</li>"+
  				"<ul>";
  			}
  			if($classId=="ECN"){
  				$constructClassDesc+="Economy Class<br/>"+
  				"<ul>"+
  					"<li>You will enjoy our budget level services.</li>"+
  					"<li>Sed tempor, augue vel elementum ultrices, ante sem fringilla dui, sit amet tristique lacus lorem a nisi.</li>"+
  					"<li>Quisque placerat dolor vel elit hendrerit tristique nec a justo.</li>"+
  					"<li>Aliquam placerat nisi tincidunt dictum cursus.</li>"+
  				"<ul>";
  			}
  			if($classId=="SNG"){
  				$constructClassDesc+="Single Class<br/>"+
  				"<ul>"+
  					"<li>Have all the fun in the world ALONE.</li>"+
  					"<li>Ut mollis, sem vitae bibendum interdum, magna est convallis sem, at tincidunt eros urna sed dui.</li>"+
  					"<li>Pellentesque feugiat tempus ex ut aliquet.</li>"+
  					"<li>Vivamus sollicitudin in massa at ullamcorper.</li>"+
  				"<ul>";
  			}
  			if($classId=="FST"){
  				$constructClassDesc+="First Class<br/>"+
  				"<ul>"+
  					"<li>Enjoy a luxurious flight in our top quality plane suites.</li>"+
  					"<li>Etiam vitae diam at ipsum aliquam euismod facilisis dapibus dolor.</li>"+
  					"<li>Ut ut dolor et libero facilisis congue.</li>"+
  					"<li>Vestibulum vulputate elementum turpis, sit amet gravida metus ullamcorper ac.</li>"+
  				"<ul>";
  			}
  			if($classId=="BSN"){
  				$constructClassDesc+="Business Class<br/>"+
  				"<ul>"+
  					"<li>Ride a plane that'll keep you connected to your boss.</li>"+
  					"<li>Interdum et malesuada fames ac ante ipsum primis in faucibus.</li>"+
  					"<li>Quisque malesuada nibh ut tincidunt sodales.</li>"+
  					"<li>Phasellus varius ut dolor nec imperdiet.</li>"+
  				"<ul>";
  			}
  			if($classId=="DBL"){
  				$constructClassDesc+="Double Class<br/>"+
  				"<ul>"+
  					"<li>Going abroad for a honeymoon or vacation with your partner? WE GOT YOU.</li>"+
  					"<li>Cras egestas odio eu mauris efficitur commodo.</li>"+
  					"<li>Aenean facilisis risus at ipsum mattis finibus.</li>"+
  					"<li>In tellus eros, dapibus in tempus eu, aliquam et sapien.</li>"+
  				"<ul>";
  			}
  			if($classId=="INT"){
  				$constructClassDesc+="Interior Class<br/>"+
  				"<ul>"+
  					"<li>Fly with our employees and see how we work.</li>"+
  					"<li>Phasellus varius rhoncus erat, ac cursus turpis maximus et.</li>"+
  					"<li>Maecenas facilisis quam eget condimentum congue.</li>"+
  					"<li>Integer pretium faucibus diam at ultricies.</li>"+
  				"<ul>";
  			}
  			if($classId=="OCNV"){
  				$constructClassDesc+="Ocean View Class<br/>"+
  				"<ul>"+
  					"<li>TRAVEL BY BOAT. Ride your buoyancy effective planes.</li>"+
  					"<li>Nulla iaculis pretium augue, vel cursus lorem.</li>"+
  					"<li>Pellentesque accumsan velit sit amet lectus egestas, sed tincidunt nisi vulputate.</li>"+
  					"<li>Sed aliquet elementum metus, et pretium risus efficitur vestibulum.</li>"+
  				"<ul>";
  			}

  			$('#classInfo').html($constructClassDesc);
  		}
  	</script>
</body>
</html>