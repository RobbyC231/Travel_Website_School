<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Book a fight</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
     <?php require("bootstrap.php") ?>
    <script src="js/jquery.redirect.js"></script>
	<style type="text/css">
	</style>
</head>
<body>
	<?php include "include/navbar.php"?>
	<section id="packageMenu" class="container-fluid">
		<h2 class="display-4">Search for flight booking</h2>
		<div>
			<div class="col bg-light py-2">
			<form action="include/flightdisplay.php" target="displayPort" method="post">
				<label>From:
					<input type="text" id="from" name="from" size="30vw"></label>
				<label>Destination:
					<input type="text" id="destination" name="destination" size="30vw">
				</label>
				<label>When:
					<input type="date" id="date" name="date">
				</label>
				<label>Days
					<input type="number" name="days">
				</label>
				<div class="d-flex flex-row-reverse">
					<input type="submit" class="p-2 bg-info btn btn-primary" value="Search">
				</div>
			</form>
			</div>
			<table id="heads" name="heads" class="table">
				<thead class="thead">
					<tr class="d-flex">
						<th style="width: 20vw;">Destination</th>
						<th style="width: 7vw;">Region</th>
						<th style="width: 9vw;">Fly From</th>
						<th style="width: 9vw;">Plane No</th>
						<th style="width: 13vw;">Departure Date</th>
						<th style="width: 14vw;">Return Date</th>
						<th style="width: 15vw;">Ticket Price</th>
						<th style="width: 9vw;"></th>
					</tr>
				</thead>
			</table>
			<iframe name="displayPort" id="displayPackages" src="include/flightdisplay.php" style="height: 80vh; width: 96.5vw;"></iframe>
		</div>
	</section>
	<?php include "include/footer.php"; ?>
	<script type="text/javascript">
		var dateControl = document.querySelector('input[type="date"]');
		var dateNow = new Date();

		var YearNow = dateNow.getFullYear();
		var MonthNow = dateNow.getMonth()+1;
		var DateNow = dateNow.getDate();

		if(MonthNow<10){MonthNow='0'+MonthNow;}
		if(DateNow<10){DateNow='0'+DateNow;}

		dateControl.value = YearNow+"-"+MonthNow+"-"+DateNow;

      	function verifyUserForBook($userId, $departPlnId, $returnPlnId){
    	    //console.log($userId);
        	if($userId!="")
          	{
          	  //alert("Logged in");
           	 	//EDIT THIS IF DIRECTORY IS CHANGED
           	 	//console.log($userId+" : "+$departPlnId+" : "+$returnPlnId);
           	 	$.redirect("confirmOrder.php",
           	   	{
            	    'userId': $userId,
            	    'departPlnId': $departPlnId,
            	    'returnPlnId': $returnPlnId
              	}
              	);
            	//window.location.href = "http://localhost/WebsiteProject/sqlact/addbooking.php";
          	}
        	else
          	{
            	alert("Please log in or register for new user");
            	$("#loginModal").modal('show');
          	}
        }

        if(window.outerHeight<=575){if(window.outerWidth<=425){$("#heads").hide();}}
        $(window).resize(function(){
        	if(window.outerHeight<=575){if(window.outerWidth<=425){$("#heads").hide();}}
    	});
	</script>
</body>
</html>