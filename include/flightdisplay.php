<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{color: white;}
		.itemStyling{
			width: 95%;height: 17vh;
			margin: 1vw;
			background-color:#3F3F3F;
		}
		.descStyling{margin: 1vw;}
	</style>
</head>
<body>
	<!--<div class="itemStyling"><a class="descStyling">Dummy Item</a></div>-->
	<?php
	$dbinst = mysqli_connect("localhost","root","","travelexperts");
		if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	if(!$_POST)
	{
		////////////////////////Testing
		$result = mysqli_query($dbinst, "SELECT * FROM flightstable LIMIT 0,25");
		while ($row=mysqli_fetch_row($result)) {
			echo "<div class='itemStyling'><a class='descStyling'>".
			"PlaneNo: ".$row[1]."<br/> ".
			"From: ".$row[4]." To: ".$row[5]." (".$row[6].")<br/> ".
			"Depart: ".$row[2]." Return: ".$row[3]."<br/>".
			"Price: ".$row[7]."<br/> ".
			"</a></div>";
		}
	}
	else
	{
		$querySearchCondition = "";
		$index = 0;
		foreach ($_POST as $key => $value) {

			if($index!=0&&$value!="")
				{$querySearchCondition .= " AND ";}

			if($key=='from'){$querySearchCondition .= "FltLocation LIKE '%".$value."%'";}
			else if($key=='destination'){$querySearchCondition .= "FltDestination LIKE '%".$value."%'";}
			$index++;
		}
		//echo $querySearchCondition;
		$result = mysqli_query($dbinst, "SELECT * FROM flightstable WHERE ".$querySearchCondition." LIMIT 0,25");
		while ($row=mysqli_fetch_row($result)) {
			echo "<div class='itemStyling'><a class='descStyling'>".
			"PlaneNo: ".$row[1]."<br/> ".
			"From: ".$row[4]." To: ".$row[5]." (".$row[6].")<br/> ".
			"Depart: ".$row[2]." Return: ".$row[3]."<br/>".
			"Price: ".$row[7]."<br/> ".
			"</a></div>";
		}
		
	}
	?>
</body>
</html>