//this is the .js for the userdata form
//registered expressions used for postal code and phone number formats
//Chris Earle OOSD 5/26/2018
var postal_code_code = /^[a-zA-Z]\d[a-zA-Z] ?\d[a-zA-Z]\d$/;
var phone_code = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
//this array is the acceptable two letter provincial symbols
var province_codes = ["AB", "BC", "NL", "PE", "NS", "NB", "QC", "MB", "SK", "YT", "NT", "NU"];

//when the userdata form is submitted
var submitScript = document.getElementById('submit');
submitScript.onclick = function(){
	//defines variables from the ids from the userdata form, see html code
	var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var address = document.getElementById('address').value;
	var city = document.getElementById('city').value;
	var province = document.getElementById('province').value;
	var postal_code = document.getElementById('postal_code').value;
	var phone = document.getElementById('phone').value;

	//this is the final validation on submit
	if (first_name.length>0 && last_name.length>0 && address.length>0 && city.length>0 && province.length>0 && postal_code.match(postal_code_code) && phone.match(phone_code))
		{
			if (confirm("Are you sure")){
				document.getElementById('user_data').submit();
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
		document.getElementById('user_data').reset();
		//resets fail-pass icons
			document.getElementById("pcode_pass");
			pcode_pass.style.display="none";
			document.getElementById("phone_pass");
			phone_pass.style.display="none";
			document.getElementById("province_pass");
			province_pass.style.display="none";
			document.getElementById("fname_pass");
			fname_pass.style.display="none";
			document.getElementById("lname_pass");
			lname_pass.style.display="none";
			document.getElementById("address_pass");
			address_pass.style.display="none";
			document.getElementById("city_pass");
			city_pass.style.display="none";
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
		}
		else
		{
			document.getElementById("pcode_pass").src="icons/fail.png";
			pcode_pass.style.display="block";
			pcode_pass.style.display = "inline";
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
		var postal_code = document.getElementById('phone').value;
		if (phone.value.match(phone_code))
		{
			document.getElementById("phone_pass").src="icons/checked.png";
			phone_pass.style.display="block";
			phone_pass.style.display = "inline";
		}
		else
		{
			document.getElementById("phone_pass").src="icons/fail.png";
			phone_pass.style.display="block";
			phone_pass.style.display = "inline";
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
	function province_oninput(){
		var province = document.getElementById('province');
		var province = document.getElementById('province').value;
		var province = province.toUpperCase();
		if (province_codes.indexOf(province)>=0)
		{
			document.getElementById("province_pass").src="icons/checked.png";
			province_pass.style.display="block";
			province_pass.style.display = "inline";
		}
		else
		{
			document.getElementById("province_pass").src="icons/fail.png";
			province_pass.style.display="block";
			province_pass.style.display = "inline";
		}
	}

	//First Name
	function fname_oninput(){
		var fname = document.getElementById('first_name');
		var fname = document.getElementById('first_name').value;
		if (fname.length>0)
		{
			document.getElementById("fname_pass").src="icons/checked.png";
			fname_pass.style.display="block";
			fname_pass.style.display = "inline";
		}
		else
		{
			document.getElementById("fname_pass").src="icons/fail.png";
			fname_pass.style.display="block";
			fname_pass.style.display = "inline";
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
		}
		else
		{
			document.getElementById("lname_pass").src="icons/fail.png";
			lname_pass.style.display="block";
			lname_pass.style.display = "inline";
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
		}
		else
		{
			document.getElementById("address_pass").src="icons/fail.png";
			address_pass.style.display="block";
			address_pass.style.display = "inline";
		}
	}

	//City
	function city_oninput(){
		var city = document.getElementById('city');
		var city = document.getElementById('city').value;
		if (city.length>0)
		{
			document.getElementById("city_pass").src="icons/checked.png";
			city_pass.style.display="block";
			city_pass.style.display = "inline";
		}
		else
		{
			document.getElementById("city_pass").src="icons/fail.png";
			city_pass.style.display="block";
			city_pass.style.display = "inline";
		}
	}
