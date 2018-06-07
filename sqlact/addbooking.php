<?php
	$dbinst = mysqli_connect("localhost","root","","travelexperts");
			if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	//echo $_POST['userId'].": ".$_POST['packageId']."<br/>";

	///////CONSTRUCT BOOKINGS NEW ROW
	$sqlcommand = "INSERT INTO bookings ";
	$columns = "(";
	$values = " VALUES (";
	//Values for randomizing Booking no SUBJECT TO CHANGE
	$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
	//BookingDate
	$columns .= "BookingDate, ";
	$values .= "'".date("Y-m-d h:m:s")."', ";
	//BookingNo
	shuffle($seed);
	$rand = '';
	foreach (array_rand($seed, 5) as $k){$rand.=$seed[$k];}
	$columns .= "BookingNo, ";
	$values .= "'".$rand."', ";
	//TravelCount SUBJECT TO CHANGE
	$columns .= "TravelerCount, ";
	$values .= "'1', ";
	//CustomerId
	$columns .= "CustomerId, ";
	$values .= "'".$_POST['userId']."', ";
	//TripTypeId SUBJECT TO CHANGE
	$columns .= "TripTypeId, ";
	$values .= "'L', ";
	//PackageId
	$columns .= "PackageId)";
	$values .= "'".$_POST['packageId']."')";
	/////////Construct SQL Statement
	$sqlcommand .= $columns.$values;
	$result = mysqli_query($dbinst, $sqlcommand);

	//mysqli_insert_id($dbinst);
	//////////Retrieving required info for BOOKINGINFO
	$bookingRow = mysqli_fetch_assoc(mysqli_query($dbinst, "SELECT * FROM bookings WHERE BookingId='".mysqli_insert_id($dbinst)."'"));
	$packageRow  = mysqli_fetch_assoc(mysqli_query($dbinst, "SELECT * FROM packages WHERE PackageId='".$bookingRow['PackageId']."'"));
	$departPlanRow = mysqli_fetch_assoc(mysqli_query($dbinst, "SELECT * FROM flightstable WHERE FlightId='".$packageRow['DeparturePlnId']."'"));
	$returnPlanRow = mysqli_fetch_assoc(mysqli_query($dbinst, "SELECT * FROM flightstable WHERE FlightId='".$packageRow['ReturnPlnId']."'"));
	//print_r($departPlanRow);
	//////////CONSTRUCTING BOOKINGINFO
	$sqlcommand = "INSERT INTO bookingdetails ";
	$columns = "(";
	$values = " VALUES (";
	//Values for randomizing ItineraryNo SUBJECT TO CHANGE
	$seed = str_split('0123456789');
	//ItineraryNo
	shuffle($seed);
	$rand = '';
	foreach (array_rand($seed, 5) as $k){$rand.=$seed[$k];}
	$columns .= "ItineraryNo, ";
	$values .= "'".$rand."', ";
	//TripStart
	$columns .= "TripStart, ";
	$values .= "'".$packageRow['PkgStartDate']."', ";
	//TripEnd
	$columns .= "TripEnd, ";
	$values .= "'".$packageRow['PkgEndDate']."', ";
	//Description
	$columns .= "Description, ";
	$explodedDest =  explode(",", $departPlanRow['FltDestination']);
	$values .= "'".$departPlanRow['FltLocation']."/".$explodedDest[0]."/".$departPlanRow['FltLocation']."', ";
	//Destination
	$columns .= "Destination, ";
	$values .= "'".$departPlanRow['FltDestination']."', ";
	//BasePrice
	$columns .= "BasePrice, ";
	$values .= "'".$packageRow['PkgBasePrice']."', ";
	//AgencyCommission
	$columns .= "AgencyCommission, ";
	$values .= "'".$packageRow['PkgAgencyCommission']."', ";
	//BookingId
	$columns .= "BookingId, ";
	$values .= "'".$bookingRow['BookingId']."', ";
	//RegionId
	$columns .= "RegionId, ";
	$values .= "'".$departPlanRow['RegionId']."', ";
	//ClassId SUBJECT TO CHANGE
	$columns .= "ClassId, ";
	$values .= "'SNG', ";
	//FeeId SUBJECT TO CHANGE
	$columns .= "FeeId, ";
	$values .= "'BK', ";
	//ProductSupplierId SUBJECT TO CHANGE
	$columns .= "ProductSupplierId, ";
	$values .= "'10', ";
	//DeparturePlnId
	$columns .= "DeparturePlnId, ";
	$values .= "'".$departPlanRow['FlightId']."', ";
	//ReturnPlnId
	$columns .= "ReturnPlnId)";
	$values .= "'".$returnPlanRow['FlightId']."')";
	//Compiling and return to packages 
	$sqlcommand .= $columns.$values;
	$result = mysqli_query($dbinst, $sqlcommand);
	header("Location: ../packages.php");//SUBJECT TO CHANGE

?>