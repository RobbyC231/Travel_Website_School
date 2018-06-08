	<!-- Brijesh & Robert-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Account Info</title>
        <!--normalize css-->
				<!-- <link rel="stylesheet" type="text/css" href="css/Accountinfo.css"> -->
		<?php require("bootstrap.php") ?>
		<link rel="stylesheet" href="css/footer.css">
		<!--I have put in cutomer_registration.css, this is for things that I think may be unique to this page-->
		<!--this can either be added to the master css or kept in a seperate css-->
		<!-- <link rel="stylesheet" type="text/css" href="css/customer_registration.css"> -->
		<!--create links to all other .css-->

	</head>

	<body>
		<?php
		/*placeholder for unique page variable for if the account page is $active
		//the logout will return user to homepage, $active page is used in include/navbar.php
		we will need an active variable declared on every page or we will have a warning
		thrown above the navbar -Chris*/
		$activepage="accountinfo";
		/*Chris end*/
		?>
	<div class="content">
		<?php include("include/navbar.php") ?>
			<h4> Personal Details </h4>
				<table class="table">
					<tbody>
						<tr>
							<th scope="row">Name</th>
								<td><div class="text-capitalize"><?php echo $_SESSION['first_name'] .  " " . $_SESSION['last_name']; ?></div></td>
							</tr>
							<tr>
								<th scope="row">Address</th>
								<td><div class="text-capitalize"><?php echo $_SESSION['address']; ?></div></td>
							</tr>
							<tr>
								<th scope="row">City</th>
								<td><div class="text-capitalize"><?php echo $_SESSION['city']; ?></div></td>
							</tr>
							<tr>
								<th scope="row">Cell Phone</th>
								<td><?php echo $_SESSION['phone']; ?></td>
							</tr>
							<tr>
								<th scope="row">Email</th>
								<td><?php echo $_SESSION['email']; ?></td>
							</tr>
						<tbody>
					</table>

   <?php
          //fetch purchased packaged data according to user
  	require "ServerSideRegister/dbconnect.php"; //connect to database
    $result= $mysqli->query("SELECT * FROM bookings  WHERE CustomerId='".$_SESSION['userId']."' ")  ;  //select booking data according to logged in user by userId
    if (!$result)
    	{
        printf("Error:" );
        exit();
      }

			?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Package</th>
						<th scope="col">Booking Code</th>
						<th scope="col">Date Booked</th>
						<th scope="col">People</th>
					</tr>
				</thead>
			<?php
    	while ($row=mysqli_fetch_array($result))
				// print_r($row); //to see array
        {
          $BookingDate=$row['BookingDate'];
          $BookingNo=$row['BookingNo'];
          $BookingTravelCount=$row['TravelerCount'];
					$package=$row['PackageId'];

        	$PackageDetail= $mysqli->query("SELECT PkgName FROM packages WHERE PackageId='".$package."' ")  ; //select package data according to bookingId
				$row=mysqli_fetch_array($PackageDetail);
					// print_r($row); //too see array
          	$packageName=$row['PkgName'];
          //  displaying purchased packaged details
            ?>
								<tbody>
									<tr>
										<td><?php echo $packageName ?></td>
										<td><?php echo $BookingNo ?></td>
										<td><?php echo $BookingDate ?></td>
										<td><?php echo $BookingTravelCount ?></td>
									</tr>
								</tbody>
						<?php
          }
					?></table>
		</div>
		<?php include "include/footer.php" ?>
		<!--also put in a modal creator script here-->
		<script type="text/javascript" src="js/customer_registration.js"></script>
	</body>

</html>
