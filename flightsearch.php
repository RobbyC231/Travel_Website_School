<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Book a fight</title>
	<meta name="viewport" content="width=device-width">
    <link href="homestyle.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="js/jquery-3.3.1.min.js"></script>
	<style type="text/css">
		body{color: white; border-top: 0;
    		margin: 0; padding: 0;clear: both;
    		background-image: url("images/bora_bora2.jpeg");
    	}
		#packageMenu {
			width: 90vw;
			height: 90vh;
			background-color:#242424;
			margin: 3vw;
			opacity: 0.90;
		}
		#sectHead{margin: 1vw;}
		#searchBar{
			background-color:#3F3F3F;
			width: 95%;
			height: 15%;
			margin: 1vw;
		}
		#locations, #timeframe{display: block; float: left;margin: 1vw;}
		label{margin-right: 3vw;}
		.submit{float: right; margin: 1vw;}
		#displayPackages{
			background-color:#BCBCBC;
			width: 95%;height: 65vh;
			margin: 1vw;
			overflow: scroll;
		}
		.dummyItem{
			width: 95%;height: 15vh;
			margin: 1vw;
			background-color:#3F3F3F;
		}
		.dummyDesc{margin: 1vw;}
		input{color: black;}
	</style>
</head>
<body>
	<?php include "include/navbar.php"?>
	<br/><br/>
	<section id="packageMenu">
		<h2 id="sectHead">Search for flight booking</h2>
		<div id="searchBar">
			<form action="include/flightdisplay.php" target="displayPort" method="post">
				<label>From:
					<input type="text" id="from" name="from" required="true" size="30vw"></label>
				<label>Destination:
					<input type="text" id="destination" name="destination" required="true" size="30vw">
				</label>
				<label>When:
					<input type="date" name="date">
				</label>
				<label>Days
					<input type="number" name="days">
				</label>
				<input type="submit" class="submit" value="Search">
			</form>
		</div>
		<iframe name="displayPort" id="displayPackages" src="include/flightdisplay.php"></iframe>
	</section>
	<?php include "include/footer.php"; ?>
</body>
</html>