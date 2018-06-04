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
		<form id="customer_data">
			<div>
				<div class="form_column">
					<div class="formline">
						<label class="field" for="first_name">First Name:</label>
						<input id="first_name" type="text" name="first_name" maxlength="25" oninput="fname_oninput()" onfocus="fname_focus()" onblur="fname_blur()"/>
			            <img class="checker" id="fname_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="last_name">Last Name:</label>
						<input id="last_name" type="text" name="last_name" maxlength="25" oninput="lname_oninput()" onfocus="lname_focus()" onblur="lname_blur()"/>
						<img class="checker" id="lname_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<!--country drop down goes here will change province/state and postalcode/zip, only for US and Canada-->
						<label class="field" for="country">Country:</label>
						<select id="country" class="sizing" name="country" onchange="country_onchange()">
							<option value=""></option>
							<option value="Canada">Canada</option>
							<option value="United States">United States</option>
						</select>
						<img class="checker" id="country_pass"  style="display:none" src="icons/checked.png">
					</div>



					<div class="formline" id="state_toggle" style="display:none">
						<label class="field" for="state">State:</label>
						<select id="state" class="sizing" name="test" onchange="state_onchange()">
							<option></option>
						</select>
						<img class="checker" id="state_pass"  style="display:none" src="icons/checked.png">
					</div>


					<div class="formline" id="province_toggle" style="display:none">
						<label class="field" for="province">Province:</label>
						<select id="province" class="sizing" name="test" onchange="province_onchange()">
							<option></option>
						</select>
						<img class="checker" id="province_pass"  style="display:none" src="icons/checked.png">
					</div>


					<div class="formline">
						<label class="field" for="city">City:</label>
						<input id="city" type="text" name="city" maxlength="50" oninput="city_oninput()" onfocus="city_focus()" onblur="city_blur()"/>
						<img class="checker" id="city_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline" id="pcode_toggle">
						<label class="field" for="postal_code">Postal Code:</label>
						<input id="postal_code" type="text" name="postal_code" maxlength="7" oninput="pcode_oninput()" onkeypress="pcode_format()" onfocus="pcode_focus()" onblur="pcode_blur()"/>
						<img class="checker" id="pcode_pass"  style="display:none" src="icons/checked.png">
						<div id="pcode_note" style="display:inline;display:none">A1B 2C3</div>
					</div>
					<div class="formline" id="zip_toggle" style="display:none">
						<label class="field" for="zip_code">Zip Code:</label>
						<input id="zip_code" type="text" name="zip_code" maxlength="5" oninput="zip_code_oninput()" onfocus="zip_code_focus()" onblur="zip_code_blur()"/>
						<img class="checker" id="zip_code_pass"  style="display:none" src="icons/checked.png">
						<div id="zip_code_note" style="display:inline;display:none">12345</div>
					</div>
					<div class="formline">
						<label class="field" for="address">Address:</label>
						<input id="address" type="text" name="address" maxlength="75" oninput="address_oninput()" onfocus="address_focus()" onblur="address_blur()"/>
						<img class="checker" id="address_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="phone">Phone Number:</label>
						<input id="phone" type="text" name="phone" maxlength="13" oninput="phone_oninput()" onkeypress="autophone_format()" onfocus="phone_focus()" onblur="phone_blur()"/>
						<img class="checker" id="phone_pass"  style="display:none" src="icons/checked.png">
						<div id="phone_note" style="display:inline;display:none">123-456-7890 area code included</div>
					</div>
					<div class="formline">
						<label class="field" for="bus_phone">Business Phone:</label>
						<input id="bus_phone" type="text" name="bus_phone" maxlength="13" oninput="bus_phone_oninput()" onkeypress="busphone_format()" onfocus="bus_phone_focus()" onblur="bus_phone_blur()"/>
						<img class="checker" id="bus_phone_pass"  style="display:none" src="icons/checked.png">
						<div id="bus_phone_note" style="display:inline;display:none">if the same as your home phone, enter home phone</div>
					</div>
				</div>
				<div class="form_column">
					<div class="formline">
						<label class="field" for="email">Email:</label>
						<input id="email" type="text" name="email" maxlength="50" oninput="email_oninput()" onfocus="email_focus()" onblur="email_blur()"/>
						<img class="checker" id="email_pass"  style="display:none" src="icons/checked.png">
						<div id="email_note" style="display:inline;display:none">123-456-7890 area code included</div>
					</div>
					<div class="formline">
						<label class="field" for="conf_email">Confirm Email:</label>
						<input id="conf_email" type="text" name="conf_email" maxlength="50" oninput="conf_email_oninput()" onfocus="conf_email_focus()" onblur="conf_email_blur()"/>
						<img class="checker" id="conf_email_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="username">Username:</label>
						<input id="username" type="text" name="username" maxlength="20" oninput="username_oninput()" onkeyup="username_unique(this)" onfocus="username_focus()" onblur="username_blur()"/>
						<img class="checker" id="username_pass"  style="display:none" src="icons/checked.png">
						<div id="username_note" style="display:inline;display:block">please enter a five character username</div>
					</div>
					<div class="formline">
						<label class="field" for="password">Password:</label>
						<input id="password" type="password" name="password" maxlength="20" oninput="password_oninput()" onfocus="password_focus()" onblur="password_blur()"/>
						<img class="checker" id="password_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div class="formline">
						<label class="field" for="conf_password">Confirm Password:</label>
						<input id="conf_password" type="password" name="conf_password" maxlength="20" oninput="conf_password_oninput()" onfocus="conf_password_focus()" onblur="conf_password_blur()"/>
						<img class="checker" id="conf_password_pass"  style="display:none" src="icons/checked.png">
					</div>
					<div id="password_checklist" style="display:none">
						<div class="formline">
							<b>at least eight characters long</b>
							<img class="checker" id="eightchar_pass"  style="display:none" src="icons/checked.png">
						</div>
						<div class="formline">
							<b>at least one lowercase letter</b>
							<img class="checker" id="lower_pass"  style="display:none" src="icons/checked.png">
						</div>
						<div class="formline">
							<b>at least one uppercase letter</b>
							<img class="checker" id="upper_pass"  style="display:none" src="icons/checked.png">
						</div>
						<div class="formline">
							<b>at least one number</b>
							<img class="checker" id="num_pass"  style="display:none" src="icons/checked.png">
						</div>
						<div class="formline">
							<b>at least one special character !@#$%^*_&</b>
							<img class="checker" id="special_pass"  style="display:none" src="icons/checked.png">
						</div>
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
