<html>
    <!--Chris Earle OOSD 5/26/2018-->
    <!--this is the customer registration page-->
	<head>
		<title>Customer Registration</title>
        <!--normalize css-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
		<!--I have put in cutomer_registration.css, this is for things that I think may be unique to this page-->
		<!--this can either be added to the master css or kept in a seperate css-->
		<link rel="stylesheet" type="text/css" href="css/customer_registration.css">
		<!--create links to all other .css-->
	</head>

	<body>
		<header>
            <?php
                //placeholder for unique page variable to show active page on nav bar
                $active_num=3;
                //include .php for nav bar
                //include .php for banner
        	?>
		</header>

		<!--need to get bouncer.php put in for project-->
		<!--the img here is used for form validation check mark or an x-->
        <form action="bouncer.php" id="customer_data">
			<div>
				<div class="form_column">
					<div class="formline">
						<label class="field" for="first_name">First Name:</label>
						<input id="first_name" type="text" name="first_name" oninput="fname_oninput()" onfocus="fname_focus()" onblur="fname_blur()"/>
			            <img id="fname_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="last_name">Last Name:</label>
						<input id="last_name" type="text" name="last_name" oninput="lname_oninput()" onfocus="lname_focus()" onblur="lname_blur()"/>
						<img id="lname_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<!--country drop down goes here will change province/state and postalcode/zip, only for US and Canada-->
						<label class="field" for="country">Country:</label>
						<select id="country" class="sizing" name="country" onchange="country_onchange()">
							<option value=""></option>
							<option value="Canada">Canada</option>
							<option value="United States">United States</option>
						</select>
						<img id="country_pass"  style="display:none" src="icons/checked.png">

					</div>

					<div class="formline" id=province_toggle>
							<label class="field" for="province">Province:</label>
							<input id="province" type="text" name="province" oninput="province_oninput()" onfocus="province_focus()" onblur="province_blur()"/>
							<img id="province_pass"  style="display:none" src="icons/checked.png">
							<div id="province_note" style="display:inline;display:none">please enter the two letter provincial symbol</div>
					</div>
					<div class="formline" id=state_toggle style="display:none">
						<label class="field" for="state">State:</label>
						<input id="state" type="text" name="state" oninput="state_oninput()" onfocus="state_focus()" onblur="state_blur()"/>
						<img id="state_pass"  style="display:none" src="icons/checked.png">
						<div id="state_note" style="display:inline;display:none">please enter the two letter state symbol</div>
					</div>

					<div class="formline">
						<label class="field" for="city">City:</label>
						<input id="city" type="text" name="city" oninput="city_oninput()" onfocus="city_focus()" onblur="city_blur()"/>
						<img id="city_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline" id="pcode_toggle">
						<label class="field" for="postal_code">Postal Code:</label>
						<input id="postal_code" type="text" name="postal_code" oninput="pcode_oninput()" onfocus="pcode_focus()" onblur="pcode_blur()"/>
						<img id="pcode_pass"  style="display:none" src="icons/checked.png">
						<div id="pcode_note" style="display:inline;display:none">A1B 2C3</div>
					</div>
					<div class="formline" id="zip_toggle" style="display:none">
						<label class="field" for="zip_code">Zip Code:</label>
						<input id="zip_code" type="text" name="zip_code" oninput="zip_code_oninput()" onfocus="zip_code_focus()" onblur="zip_code_blur()"/>
						<img id="zip_code_pass"  style="display:none" src="icons/checked.png">
						<div id="zip_code_note" style="display:inline;display:none">12345</div>
					</div>
					<div class="formline">
						<label class="field" for="address">Address:</label>
						<input id="address" type="text" name="address" oninput="address_oninput()" onfocus="address_focus()" onblur="address_blur()"/>
						<img id="address_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="phone">Phone Number:</label>
						<input id="phone" type="text" name="phone" oninput="phone_oninput()" onfocus="phone_focus()" onblur="phone_blur()"/>
						<img id="phone_pass"  style="display:none" src="icons/checked.png">
						<div id="phone_note" style="display:inline;display:none">123-456-7890 area code included</div>
					</div>
					<div class="formline">
						<label class="field" for="bus_phone">Business Phone:</label>
						<input id="bus_phone" type="text" name="bus_phone" oninput="bus_phone_oninput()" onfocus="bus_phone_focus()" onblur="bus_phone_blur()"/>
						<img id="bus_phone_pass"  style="display:none" src="icons/checked.png">
						<div id="bus_phone_note" style="display:inline;display:none">if the same as your home phone, enter home phone</div>
					</div>
				</div>
				<div class="form_column">
					<div class="formline">
						<label class="field" for="email">Email:</label>
						<input id="email" type="text" name="email" oninput="email_oninput()" onfocus="email_focus()" onblur="email_blur()"/>
						<img id="email_pass"  style="display:none" src="icons/checked.png">
						<div id="email_note" style="display:inline;display:none">123-456-7890 area code included</div>
					</div>
					<div class="formline">
						<label class="field" for="conf_email">Confirm Email:</label>
						<input id="conf_email" type="text" name="conf_email" oninput="conf_email_oninput()" onfocus="conf_email_focus()" onblur="conf_email_blur()"/>
						<img id="conf_email_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="username">Username:</label>
						<input id="username" type="text" name="username" oninput="username_oninput()" onfocus="username_focus()" onblur="username_blur()"/>
						<img id="username_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="password">Password:</label>
						<input id="password" type="password" name="password" oninput="password_oninput()" onfocus="password_focus()" onblur="password_blur()"/>
						<img id="password_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="conf_password">Confirm Password:</label>
						<input id="conf_password" type="password" name="conf_password" oninput="conf_password_oninput()" onfocus="conf_password_focus()" onblur="conf_password_blur()"/>
						<img id="conf_password_pass"  style="display:none" src="icons/checked.png">
					</div>
				</div>
			</div>
			<br/>
			<br/>
			<div class="buttons">
				<button id="submit" value="submit">Submit</button>
				<button id="clear" value="clear">Reset</button>
			</div>


		</form>


		<!--copyrigth-->
		<?php
			//include 'include/footer.php';
		?>

        <!--this will be for the login modal should we decide to go ahead with that-->
        <!--this div tag and a script tag for a .js will need to be included on every page-->
        <!--modal css will need to be added to .css file-->
    	<div id="modal_creator">
		</div>
		<!--also put in a modal creator script here-->
		<script>

		</script>
		<script type="text/javascript" src="js/customer_registration.js"></script>


	</body>
</html>
