<html>
	<head>
		<title>Customer Registration</title>
        <!--normalize css-->
                <link rel="stylesheet" type="text/css" href="css/default.css" />
				<?php require("bootstrap.php"); ?>
				<link rel="stylesheet" type="text/css" href="css/Accountinfo.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	</head>

	<body>
		<?php
		/*placeholder for unique page variable for if the account page is $active
		//the logout will return user to homepage, $active page is used in include/navbar.php
		we will need an active variable declared on every page or we will have a warning
		thrown above the navbar -Chris*/
		$activepage="accountinfo";
		/*Chris end*/
		include("include/navbar.php"); ?>
		<header>
			<header>
				<?php

				?>
			</header>
		</header>

  	<div id="main">

      <div id="leftcolumn">
				<center><h4> Personal Details </h4></center>

				<div id="table">

						<table height="200px" width=50% border="1">

									<tr>
												<td> First Name : </td>
												 <td><?php echo $_SESSION['first_name']; ?> </td>
									</tr>

									<tr>
												<td> Last Name : </td>
												<td><?php echo $_SESSION['last_name']; ?></td>
									</tr>

									<tr>
												<td> Address : </td>
												<td><?php echo $_SESSION['address']; ?></td>
									</tr>
									<tr>
												<td> City : </td>
												<td><?php echo $_SESSION['city']; ?></td>
									</tr>
									<tr>
												<td> Cell Phone : </td>
												<td>				</td>
									</tr>
									<tr>
												<td> Email : </td>
												<td>				</td>
									</tr>

						</table>

				</div>


			</div>

      <div id="rightcolumn">
                <center><h4> Purchase History </h4></center>
                <?php include("include/purchase_history.php") ?>
      </div>


		</div>
		<?php include "include/footer.php" ?>
		<!--also put in a modal creator script here-->
		<script type="text/javascript" src="js/customer_registration.js"></script>
	</body>
</html>
