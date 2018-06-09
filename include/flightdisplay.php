<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{color: white;}
		.itemStyling{
			position: relative;
			width: 95%;height: 17vh;
			margin: 1vw;
			background-color:#3F3F3F;
		}
		.descStyling{margin: 1vw;}
		.flightBookButton{z-index: 5;position: absolute;right: 1vh;bottom: 1vh;}
	</style>
</head>
<body>
	<!--<div class="itemStyling"><a class="descStyling">Dummy Item</a></div>-->
	<?php
	session_start();
	$userId="";
	if($_SESSION){$userId=$_SESSION['userId'];}
	//echo $_SESSION['userId'];

	$dbinst = mysqli_connect("localhost","root","","travelexperts");
		if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	if(empty($_POST['from']) && empty($_POST['destination']) &&empty($_POST['days']))
	{
		////////////////////////Testing
		$result = mysqli_query($dbinst, "SELECT * FROM flightstable LIMIT 0,25");
		while ($row=mysqli_fetch_row($result)) {
			echo "<div class='itemStyling'><a class='descStyling'>".
			"PlaneNo: ".$row[1]."<br/> ".
			"From: ".$row[4]." To: ".$row[5]." (".$row[6].")<br/> ".
			"Depart: ".$row[2]." Return: ".$row[3]."<br/>".
			"Price: ".$row[7]."<br/></a>".
			"<input type='button' class='flightBookButton' id='book' name='book' value='Book flight' onclick='parent.verifyUserForBook(\"".$userId."\", \"".$row[0]."\", \"".$row[0]."\")'></div>";
		}
	}
	else
	{
		$querySearchCondition = "";
		foreach ($_POST as $key => $value) {

			if(!empty($querySearchCondition)&&!empty($value)&&$key!='days')
				{$querySearchCondition .= " AND ";}

			$currentDate = "";

			if($key=='from'&&!empty($value)){$querySearchCondition .= "FltLocation LIKE '%".$value."%'";}
			else if($key=='destination'&&!empty($value)){$querySearchCondition .= "FltDestination LIKE '%".$value."%'";}
			else if($key=='date'&&!empty($value)){
				$FProximityStart=date("Y-m-d H:i:s",strtotime($value."-3 days"));
				$FProximityEnd=date("Y-m-d H:i:s",strtotime($value."+3 days"));
				$querySearchCondition.="(FltDepart BETWEEN '".$FProximityStart."' AND '".$FProximityEnd."')";

				$currentDate = $value;
			}
		}

		//echo "SELECT * FROM flightstable WHERE ".$querySearchCondition." LIMIT 0,25<br/><br/>";
		$resultFirst = mysqli_query($dbinst, "SELECT * FROM flightstable WHERE ".$querySearchCondition." LIMIT 0,25");

		$querySearchCondition = "";
		foreach ($_POST as $key => $value) {

			if(!empty($querySearchCondition)&&!empty($value)&&$key!='date')
				{$querySearchCondition .= " AND ";}

			$currentDate = "";

			if($key=='from'&&!empty($value)){$querySearchCondition .= "FltLocation LIKE '%".$value."%'";}
			else if($key=='destination'&&!empty($value)){$querySearchCondition .= "FltDestination LIKE '%".$value."%'";}
			else if($key=='date'&&!empty($value)){$currentDate = $value;}
			else if($key=='days'&&!empty($value)){
				$forwardedDate = date("Y-m-d H:i:s",strtotime($currentDate."+".$value." days"));
				$FProximityStart=date("Y-m-d H:i:s",strtotime($forwardedDate."-3 days"));
				$FProximityEnd=date("Y-m-d H:i:s",strtotime($forwardedDate."+3 days"));
				$querySearchCondition.="(FltReturn BETWEEN '".$FProximityStart."' AND '".$FProximityEnd."')";
			}
		}

		//echo "SELECT * FROM flightstable WHERE ".$querySearchCondition." LIMIT 0,25<br/><br/>";
		$resultSecond = mysqli_query($dbinst, "SELECT * FROM flightstable WHERE ".$querySearchCondition." LIMIT 0,25");
		
		while ($rowDepart=mysqli_fetch_row($resultFirst)) {
			while($rowReturn=mysqli_fetch_row($resultSecond)){
				echo "<div class='itemStyling'><a class='descStyling'>".
				"PlaneNoDepart: ".$rowDepart[1]." > ".$rowReturn[1]."<br/> ".
				"From: ".$rowDepart[4]." To: ".$rowReturn[5]." (".$rowDepart[6].")<br/> ".
				"Depart: ".$rowDepart[2]." Return: ".$rowReturn[3]."<br/>".
				"Price: ".$rowDepart[7].$rowReturn[7]."<br/></a>".
				"<input type='button' class='flightBookButton' id='book' name='book' value='Book flight' onclick='parent.verifyUserForBook(\"".$userId."\", \"".$rowDepart[0]."\", \"".$rowReturn[0]."\")'></div>";
			}
		}
		
	}
	?>
</body>
</html>