<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/home_style.css" rel="stylesheet" type="text/css">
		<?php require("../bootstrap.php") ?>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/jquery.redirect.js"></script>
</head>
<body>
	<!--<div class="itemStyling"><a class="descStyling">Dummy Item</a></div>-->
<?php
	session_start();
	$userId="";
	if(isset($_SESSION['userId'])){$userId=$_SESSION['userId'];}
	//echo $_SESSION['userId'];

	$dbinst = mysqli_connect("localhost","root","","travelexperts");
		if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
?>

	<table class="table">
		<thead id="heads" class="thead">
			<tr>
				<th style="width: 16vw;">Destination</th>
				<th style="width: 6vw;">Region</th>
				<th style="width: 9vw;">Fly From</th>
				<th style="width: 11vw;">Plane No</th>
				<th style="width: 18vw;">Departure Date</th>
				<th style="width: 18vw;">Return Date</th>
				<th style="width: 10vw;">Ticket Price</th>
				<th style="width: 8vw;"></th>
			</tr>
		</thead>
<?php
	if(empty($_POST['from']) && empty($_POST['destination']) &&empty($_POST['days']))
	{
		////////////////////////Testing
		$result = mysqli_query($dbinst, "SELECT * FROM flightstable LIMIT 0,25");
		while ($row=mysqli_fetch_assoc($result)) {
?>
		<tr>
			<td><?php echo $row['FltDestination'];?></td>
			<td><?php echo $row['RegionId'];?></td>
			<td><?php echo $row['FltLocation'];?></td>
			<td><?php echo $row['FltPlaneNo'];?></td>
			<td><?php 
					$formatDate = date_create($row['FltDepart']);
          			$BookingDate= date_format($formatDate, "Y-m-d");
					echo $BookingDate;?></td>
			<td><?php
					$formatDate = date_create($row['FltReturn']);
          			$BookingDate= date_format($formatDate, "Y-m-d");
					echo $BookingDate;?></td>
			<td><i class="fas fa-dollar-sign"></i>
				<?php echo $row['FltTicketPrice'];?></td>
			<td>
				<input type='button' class='p-2 bg-info btn btn-primary' 
				id='book' name='book' value='Book' 
				onclick='parent.verifyUserForBook(
					<?php echo '"'.$userId.'", "'.$row["FlightId"].'", "'.$row["FlightId"].'"';?>
				)'>
			</td>
		</tr>
<?php
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
		while ($rowDepart=mysqli_fetch_assoc($resultFirst)) {
			while($rowReturn=mysqli_fetch_assoc($resultSecond)){
?>
				<tr>
					<td><?php echo $rowReturn['FltDestination'];?></td>
					<td><?php echo $rowReturn['RegionId'];?></td>
					<td><?php echo $rowDepart['FltLocation'];?></td>
					<td><?php echo $rowDepart['FltPlaneNo']." > ".$rowReturn['FltPlaneNo'];?></td>
					<td><?php 
						$formatDate = date_create($rowDepart['FltDepart']);
          				$BookingDate= date_format($formatDate, "Y-m-d");
						echo $BookingDate;?></td>
					<td><?php
						$formatDate = date_create($rowReturn['FltReturn']);
          				$BookingDate= date_format($formatDate, "Y-m-d");
						echo $BookingDate;?></td>
					<td><i class="fas fa-dollar-sign"></i>
						<?php echo $rowDepart['FltTicketPrice']+$rowReturn['FltTicketPrice'];?></td>
					<td>
						<input type='button' class='p-2 bg-info btn btn-primary' 
						id='book' name='book' value='Book' 
						onclick='parent.verifyUserForBook(
					<?php echo '"'.$userId.'", "'.$rowDepart["FlightId"].'", "'.$rowReturn["FlightId"].'"';?>
						)'>
					</td>
				</tr>
<?php
			}
		}
		
	}
?>
	</table>
	<script type="text/javascript">
        if(window.outerHeight>=575){if(window.outerWidth>425){$("#heads").hide();}}
        $(window).resize(function(){
        	if(window.outerHeight>=575){if(window.outerWidth>425){$("#heads").hide();}}
    	});
	</script>
</body>
</html>