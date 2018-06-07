//Chris Earle OOSD 6/4/2018


//need codes for db create associative arrays for this I think
//create pass/fail variables for submit
//Add all new fields to reset and submitted
//check out type="email"
//add password checklist
//comparing to dm make max field lenghts
//auto fill parenthesis and dashes where needed likely will make easier for php as always same character length
//complete province select
//username and password regular expressions

window.onload = function() {
    var paste_conf_password_block = document.getElementById('conf_password');
    var paste_conf_email_block = document.getElementById('conf_email');
    paste_conf_password_block.onpaste = function(no_password_for_you) {
        no_password_for_you.preventDefault();
    }
    paste_conf_email_block.onpaste = function(no_email_for_you) {
        no_email_for_you.preventDefault();
    }
}

var fname_passed=false;
var lname_passed=false;
var country_passed=false;
var province_passed=false;
var state_passed=false;
var city_passed=false;
var pcode_passed=false;
var zip_passed=false;
var address_passed=false;
var phone_passed=false;
var bus_phone_passed=false;
var email_passed=false;
var conf_email_passed=false;
var username_passed=false;
var password_passed=false;
var conf_password_passed=false;

//this is the .js for the userdata form
//registered expressions used for postal code and bus_phone number formats
//Chris Earle OOSD 5/26/2018
var postal_code_code = /^[a-zA-Z]\d[a-zA-Z] ?\d[a-zA-Z]\d$/;
var phone_code = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
var email_code = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
var zip_code_code = /^\d{5}(?:[-\s]\d{4})?$/;
//at least 8 char long with at least one number, one lowercase letter, one uppercase, one special char
var password_code = /^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*_])[\w!@#$%^&*]{8,}$/;

//	/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//this array is the acceptable two letter provincial symbols
//var province_codes = ["AB", "BC", "NL", "PE", "NS", "NB", "QC", "MB", "SK", "YT", "NT", "NU"];
var provinces = ["Alberta", "British Columbia", "Newfoundland and Labrador", "Prince Edward Island", "Nova Scotia", "New Brunswick", "Quebec", "Manatoba", "Saskatchewan", "Yukon", "Nunavut", "Northwest Territories"];
/*var state_codes = [
    "AL",
    "AK",
    "AS",
    "AZ",
    "AR",
    "CA",
    "CO",
    "CT",
    "DE",
    "DC",
    "FM",
    "FL",
    "GA",
    "GU",
    "HI",
    "ID",
    "IL",
    "IN",
    "IA",
    "KS",
    "KY",
    "LA",
    "ME",
    "MH",
    "MD",
    "MA",
    "MI",
    "MN",
    "MS",
    "MO",
    "MT",
    "NE",
    "NV",
    "NH",
    "NJ",
    "NM",
    "NY",
    "NC",
    "ND",
    "MP",
    "OH",
    "OK",
    "OR",
    "PW",
    "PA",
    "PR",
    "RI",
    "SC",
    "SD",
    "TN",
    "TX",
    "UT",
    "VT",
    "VI",
    "VA",
    "WA",
    "WV",
    "WI",
    "WY"
];*/

var states = ['Alabama','Alaska','American Samoa','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Federated States of Micronesia','Florida','Georgia','Guam','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine',
'Marshall Islands','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Northern Mariana Islands','Ohio','Oklahoma','Oregon','Palau','Pennsylvania',
'Puerto Rico','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virgin Island','Virginia','Washington','West Virginia','Wisconsin','Wyoming'];

var total_states = states.length;
var total_provinces = provinces.length;

//	document.getElementById("test").innerHTML = "You selected:"+"<br/>"+
//    "and more";
//create all the selection options for the states
for(var option=0; option<total_states; option++){
    var new_option = document.getElementById('state');
    new_option.insertAdjacentHTML("beforeend", "<option>"+states[option]+"</option>");
}

for(var option=0; option<total_provinces; option++){
    var new_option = document.getElementById('province');
    new_option.insertAdjacentHTML("beforeend", "<option>"+provinces[option]+"</option>");
}


//when the userdata form is submitted
var submitScript = document.getElementById('submit');
submitScript.onclick = function(){
	//defines variables from the ids from the userdata form, see html code
	/*var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var address = document.getElementById('address').value;
	var city = document.getElementById('city').value;
	var province = document.getElementById('province').value;
	var postal_code = document.getElementById('postal_code').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;*/

	//this is the final validation on submit
    /*first_name.length>0 && last_name.length>0 && address.length>0 && city.length>0 && province.length>0 && postal_code.match(postal_code_code) && phone.match(phone_code)*/
    if (fname_passed && lname_passed && country_passed && (province_passed || state_passed) && city_passed &&(pcode_passed || zip_passed) && address_passed && phone_passed && bus_phone_passed && email_passed && conf_email_passed && username_passed && password_passed && conf_password_passed)
		{
			if (confirm("Are you sure")){
				document.getElementById('customer_data').submit();
			}return false; //needed to prevent form submit when conditions are not met
		}
		else {
			alert("Please Fill Out All Feilds");
		}return false;
}

//when the userdata form is reset
var resetScript = document.getElementById('clear');
resetScript.onclick = function(){
	if(confirm("Are you sure?")){
		//resets fail-pass icons
        document.getElementsByClassName('checker');
        checker.style.display="none";
		}return false;
}

//This is for data validation
//look into box shadow for data forms in css
	//Postal Code
	function pcode_focus(){
		var pcode_note = document.getElementById('pcode_note');
		pcode_note.style.display = "block";
		pcode_note.style.display = "inline";
	}
	function pcode_blur(){
		pcode_note.style.display = "none";
	}
	function pcode_oninput(){
		var pcode = document.getElementById('postal_code');
		var postal_code = document.getElementById('postal_code').value;
		if (pcode.value.match(postal_code_code))
		{
			document.getElementById("pcode_pass").src="icons/checked.png";
			pcode_pass.style.display="block";
			pcode_pass.style.display = "inline";
            pcode_passed=true;
		}
		else
		{
			document.getElementById("pcode_pass").src="icons/fail.png";
			pcode_pass.style.display="block";
			pcode_pass.style.display = "inline";
            pcode_passed=false;
        }
	}

    function pcode_format(event){
        var pcode = document.getElementById('postal_code').value;
        //the above line will not work with converting to uppercase need to drop .value
        var pcodeupper = document.getElementById('postal_code');
        pcodeupper.value = pcodeupper.value.toUpperCase();
            if(pcode.length==3){
                document.getElementById('postal_code').value = pcode+" ";
            }
    }





	function zip_code_oninput(){
	//	var zip_code = document.getElementById('zip_code').value;
		if (zip_code.value.match(zip_code_code))
		{
			document.getElementById("zip_code_pass").src="icons/checked.png";
			zip_code_pass.style.display="block";
			zip_code_pass.style.display = "inline";
            zip_passed=true;
        }
		else
		{
			document.getElementById("zip_code_pass").src="icons/fail.png";
			zip_code_pass.style.display="block";
			zip_code_pass.style.display = "inline";
            zip_passed=false;
        }
	}


	//Phone
	function phone_focus(){
		var phone_note = document.getElementById('phone_note');
		phone_note.style.display = "block";
		phone_note.style.display = "inline";
	}
	function phone_blur(){
		phone_note.style.display = "none";
	}

	function phone_oninput(){
		var phone = document.getElementById('phone');


		if (phone.value.match(phone_code))
		{
            document.getElementById("phone_pass").src="icons/checked.png";
			phone_pass.style.display="block";
			phone_pass.style.display = "inline";
            phone_passed=true;
		}else{
			document.getElementById("phone_pass").src="icons/fail.png";
			phone_pass.style.display="block";
			phone_pass.style.display = "inline";
            phone_passed=false;
        }
	}


    function autophone_format(event){
        var phformat = document.getElementById('phone').value;
            if(phformat.length==1){
                document.getElementById('phone').value = "("+phformat;
            }else if(phformat.length==4){
                document.getElementById('phone').value = phformat+")";
            }else if(phformat.length==8){
                document.getElementById('phone').value = phformat+"-";
            }
    }



	//business phone
	function bus_phone_focus(){
		var bus_phone_note = document.getElementById('bus_phone_note');
		bus_phone_note.style.display = "block";
		bus_phone_note.style.display = "inline";
	}
	function bus_phone_blur(){
		bus_phone_note.style.display = "none";
	}
	function bus_phone_oninput(){
		var bus_phone = document.getElementById('bus_phone');
		if (bus_phone.value.match(phone_code))
		{
			document.getElementById("bus_phone_pass").src="icons/checked.png";
			bus_phone_pass.style.display="block";
			bus_phone_pass.style.display = "inline";
            bus_phone_passed=true;
    	}
		else
		{
			document.getElementById("bus_phone_pass").src="icons/fail.png";
			bus_phone_pass.style.display="block";
			bus_phone_pass.style.display = "inline";
            bus_phone_passed=false;
        }
	}




function busphone_format(event){
    var phformat = document.getElementById('bus_phone').value;
        if(phformat.length==1){
            document.getElementById('bus_phone').value = "("+phformat;
        }else if(phformat.length==4){
            document.getElementById('bus_phone').value = phformat+")";
        }else if(phformat.length==8){
            document.getElementById('bus_phone').value = phformat+"-";
        }
}


	//Province
	function province_focus(){
		var province_note = document.getElementById('province_note');
		province_note.style.display = "block";
		province_note.style.display = "inline";
	}
	function province_blur(){
		province_note.style.display = "none";
	}
	function province_onchange(){
		var province = document.getElementById('province').value;
		if (provinces.indexOf(province)>=0)
		{
			document.getElementById("province_pass").src="icons/checked.png";
			province_pass.style.display="block";
			province_pass.style.display = "inline";
            province_passed=true;
        }
		else
		{
			document.getElementById("province_pass").src="icons/fail.png";
			province_pass.style.display="block";
			province_pass.style.display = "inline";
            province_passed=false;
        }
	}


/*	function state_oninput(){
		var state = document.getElementById('state');
		var state = document.getElementById('state').value;
		var state = state.toUpperCase();
		if (state_codes.indexOf(state)>=0)
		{
			document.getElementById("state_pass").src="icons/checked.png";
			state_pass.style.display="block";
			state_pass.style.display = "inline";
		}
		else
		{
			document.getElementById("state_pass").src="icons/fail.png";
			state_pass.style.display="block";
			state_pass.style.display = "inline";
		}
	}
*/



	/*function country_onchange() {
    var e = document.getElementById("country");
	var strUser = e.options[e].text;
	document.getElementById("demo").innerHTML = "You selected: " + strUser;
	}*/

	function state_focus(){
		var state_note = document.getElementById('state_note');
		state_note.style.display = "block";
		state_note.style.display = "inline";
	}
	function state_blur(){
		state_note.style.display = "none";
	}


	function zip_code_focus(){
		var state_note = document.getElementById('state_note');
		zip_code_note.style.display = "block";
		zip_code_note.style.display = "inline";
	}
	function zip_code_blur(){
		zip_code_note.style.display = "none";
	}

    function state_onchange(){
    		var state = document.getElementById('state').value;
    		if (states.indexOf(state)>=0)
    		{
    			document.getElementById("state_pass").src="icons/checked.png";
    			state_pass.style.display="block";
    			state_pass.style.display = "inline";
                state_passed=true;
            }
    		else
    		{
    			document.getElementById("state_pass").src="icons/fail.png";
    			state_pass.style.display="block";
    			state_pass.style.display = "inline";
                state_passed=false;
            }
    	}


    //so that when the page loads province field and pstal code field already visible
    province_toggle.style.display="block";
    state_toggle.style.display="none";
    pcode_toggle.style.display="block";
    zip_toggle.style.display="none";


	function country_onchange(){
		var country = document.getElementById("country").value;
		if(country=="Canada"){
			document.getElementById("country_pass").src="icons/checked.png";
			country_pass.style.display="block";
			country_pass.style.display="inline";
			//document.getElementById("province").setAttribute("id", "paad");
			var province_toggle = document.getElementById("province_toggle");
			var state_toggle = document.getElementById("state_toggle");
			province_toggle.style.display="block";
			state_toggle.style.display="none";
			var province_toggle = document.getElementById("pcode_toggle");
			var state_toggle = document.getElementById("zip_toggle");
			pcode_toggle.style.display="block";
			zip_toggle.style.display="none";
            country_passed=true;

		/*	prov_or_state.innerHTML =
				'<label class="field" for="province">Province:</label>'+
				'<input id="province" type="text" name="province" oninput="province_oninput()" onfocus="province_focus()" onblur="province_blur()"/>'+
				'<img id="province_pass"  style="display:none" src="icons/checked.png">'+
				'<div id="province_note" style="display:inline;display:none">please enter the two letter province symbol</div>';*/

		}else if(country=="United States"){
			document.getElementById("country_pass").src="icons/checked.png";
			country_pass.style.display="block";
			country_pass.style.display="inline";
			//var prov_or_state = document.getElementById("prov_or_state");
			var province_toggle = document.getElementById("province_toggle");
			var state_toggle = document.getElementById("state_toggle");
			province_toggle.style.display="none";
			state_toggle.style.display="block";
			var province_toggle = document.getElementById("pcode_toggle");
			var state_toggle = document.getElementById("zip_toggle");
			pcode_toggle.style.display="none";
			zip_toggle.style.display="block";
            country_passed=true;

		/*	prov_or_state.innerHTML =
				'<label class="field" for="state">State:</label>'+
				'<input id="state" type="text" name="state" oninput="state_oninput()" onfocus="state_focus()" onblur="state_blur()"/>'+
				'<img id="state_pass"  style="display:none" src="icons/checked.png">'+
				'<div id="province_note" style="display:inline;display:none">please enter the two letter state symbol</div>';*/
		}else{
			document.getElementById("country_pass").src="icons/fail.png";
			country_pass.style.display="block";
			country_pass.style.display="inline";
            country_passed=false;
		}
	}


	//First Name
	function fname_oninput(){
		var fname = document.getElementById('first_name').value;
		if (fname.length>0)
		{
			document.getElementById("fname_pass").src="icons/checked.png";
			fname_pass.style.display="block";
			fname_pass.style.display = "inline";
            fname_passed=true;
		}
		else
		{
			document.getElementById("fname_pass").src="icons/fail.png";
			fname_pass.style.display="block";
			fname_pass.style.display = "inline";
            fname_passed=false;
        }
	}

	//Last Name
	function lname_oninput(){
		var lname = document.getElementById('last_name');
		var lname = document.getElementById('last_name').value;
		if (lname.length>0)
		{
			document.getElementById("lname_pass").src="icons/checked.png";
			lname_pass.style.display="block";
			lname_pass.style.display = "inline";
            lname_passed=true;
        }
		else
		{
			document.getElementById("lname_pass").src="icons/fail.png";
			lname_pass.style.display="block";
			lname_pass.style.display = "inline";
            lname_passed=false;
        }
	}

	//Address
	function address_oninput(){
		var address = document.getElementById('address');
		var address = document.getElementById('address').value;
		if (address.length>0)
		{
			document.getElementById("address_pass").src="icons/checked.png";
			address_pass.style.display="block";
			address_pass.style.display = "inline";
            address_passed=true;
        }
		else
		{
			document.getElementById("address_pass").src="icons/fail.png";
			address_pass.style.display="block";
			address_pass.style.display = "inline";
            address_passed=false;
        }
	}

	//City
	function city_oninput(){
		var city = document.getElementById('city').value;
		if (city.length>0)
		{
			document.getElementById("city_pass").src="icons/checked.png";
			city_pass.style.display="block";
			city_pass.style.display = "inline";
            city_passed=true;
		}
		else
		{
			document.getElementById("city_pass").src="icons/fail.png";
			city_pass.style.display="block";
			city_pass.style.display = "inline";
            city_passed=false;
        }
	}

	//email
	function email_oninput(){
		var email = document.getElementById('email').value;
		if (email.match(email_code))
		{
			document.getElementById("email_pass").src="icons/checked.png";
			email_pass.style.display="block";
			email_pass.style.display = "inline";
            email_passed=true;
		}
		else
		{
			document.getElementById("email_pass").src="icons/fail.png";
			email_pass.style.display="block";
			email_pass.style.display = "inline";
            email_passed=false;
        }
	//calling the confirm email so if this field changes so does confirm email validation

	//confirm email
	conf_email_oninput()
	}

	function conf_email_oninput(){
		var conf_email = document.getElementById('conf_email').value;
		if (conf_email.length>0 && conf_email==document.getElementById('email').value)
		{
			document.getElementById("conf_email_pass").src="icons/checked.png";
			conf_email_pass.style.display="block";
			conf_email_pass.style.display = "inline";
            conf_email_passed=true;
		}
		else
		{
			document.getElementById("conf_email_pass").src="icons/fail.png";
			conf_email_pass.style.display="block";
			conf_email_pass.style.display = "inline";
            conf_email_passed=false;
        }
	}


	//Username
	function username_oninput(){
		var username = document.getElementById('username').value;
		if (username.length>=5)
		{
			document.getElementById("username_pass").src="icons/checked.png";
			username_pass.style.display="block";
			username_pass.style.display = "inline";
            username_passed=true;
        }
		else
		{
			document.getElementById("username_pass").src="icons/fail.png";
			username_pass.style.display="block";
			username_pass.style.display = "inline";
            username_passed=false;
        }
	}



    function password_focus(){
        var password_checklist = document.getElementById('password_checklist');
        password_checklist.style.display = "block";
        password_checklist.style.display = "inline";
    }
    function password_blur(){
        password_checklist.style.display = "none";
    }


    function hasLowerCase(str) {
        return (/[a-z]/.test(str));
    }
    function hasUpperCase(str) {
        return (/[A-Z]/.test(str));
    }
    function hasNumber(str) {
        return (/[\d]/.test(str));
    }
    function hasSpecial(str) {
        return (/[!@#$%^&*_]/.test(str));
    }


	//password
	function password_oninput(){
		var password = document.getElementById('password').value;
		if (password.match(password_code))
		{
			document.getElementById("password_pass").src="icons/checked.png";
			password_pass.style.display="block";
			password_pass.style.display = "inline";
            password_passed=true;
		}else{
			document.getElementById("password_pass").src="icons/fail.png";
			password_pass.style.display="block";
			password_pass.style.display = "inline";
            password_passed=false;
        }

        if(password.length>=8){
            document.getElementById("eightchar_pass").src="icons/checked.png";
            eightchar_pass.style.display="block";
            eightchar_pass.style.display = "inline";
        }else{
            eightchar_pass.style.display="none";
        }

        if(hasLowerCase(password)){
            document.getElementById("lower_pass").src="icons/checked.png";
            lower_pass.style.display="block";
            lower_pass.style.display = "inline";
        }else{
            document.getElementById("lower_pass").src="icons/fail.png";
            lower_pass.style.display="block";
            lower_pass.style.display = "inline";
        }


        if(hasUpperCase(password)){
            document.getElementById("upper_pass").src="icons/checked.png";
            upper_pass.style.display="block";
            upper_pass.style.display = "inline";
        }else{
            document.getElementById("upper_pass").src="icons/fail.png";
            upper_pass.style.display="block";
            upper_pass.style.display = "inline";
        }


        if(hasNumber(password)){
            document.getElementById("num_pass").src="icons/checked.png";
            num_pass.style.display="block";
            num_pass.style.display = "inline";
        }else{
            document.getElementById("num_pass").src="icons/fail.png";
            num_pass.style.display="block";
            num_pass.style.display = "inline";
        }

        if(hasSpecial(password)){
            document.getElementById("special_pass").src="icons/checked.png";
            special_pass.style.display="block";
            special_pass.style.display = "inline";
        }else{
            document.getElementById("special_pass").src="icons/fail.png";
            special_pass.style.display="block";
            special_pass.style.display = "inline";
        }

	//calling the confirm password so if this field changes so does confirm password validation
	conf_password_oninput()
	}

    function conf_password_focus(){
        var password_checklist = document.getElementById('password_checklist');
        password_checklist.style.display = "block";
        password_checklist.style.display = "inline";
    }
    function conf_password_blur(){
        password_checklist.style.display = "none";
    }


    //confirm password
	function conf_password_oninput(){
		var conf_password = document.getElementById('conf_password').value;
        if (conf_password.match(password_code) && conf_password==document.getElementById('password').value)
		{
			document.getElementById("conf_password_pass").src="icons/checked.png";
			conf_password_pass.style.display="block";
			conf_password_pass.style.display = "inline";
            conf_password_passed=true;
        }
		else
		{
			document.getElementById("conf_password_pass").src="icons/fail.png";
			conf_password_pass.style.display="block";
			conf_password_pass.style.display = "inline";
            conf_password_passed=false;
        }
	}


/*    function username_unique(str){
        var xhttp;
        if (str.length == 0) {
            document.getElementById("username_note").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("username_note").innerHTML = this.responseText;
            }
        };
        xhttp.open("get","username_validate.php",true);
        xhttp.send();
    }


	/*function country_onchange() {
    var e = document.getElementById("country");
	var strUser = e.options[e].text;
	document.getElementById("demo").innerHTML = "You selected: " + strUser;
	}*/
