function $(id) {
	return document.getElementById(id);
}

function resetRegister(f) {
	if (window.confirm("Do you really want to start over?")) {
		$("email_label").style.color = "black";
		$("name_label").style.color = "black";
		$("pass1_label").style.color = "black";
		$("pass2_label").style.color = "black";
		return true;
	} else return false;
}

function checkRegister(f) {
	var e = false, u = false, p, p1 = false, p2 = false;

	if (f['email'].value) {
		if (f['email'].value.match(/^[a-zA-Z]([a-zA-Z0-9\-\_]*[a-zA-Z0-9])?@([a-zA-Z]([a-zA-Z0-9\-\_]*[a-zA-Z0-9])?\.)+[a-zA-Z]([a-zA-Z0-9\-\_]*[a-zA-Z0-9])?$/)) {
			e = true;
			$("email_label").style.color = "black";
		} else $("email_label").style.color = "red";
	} else $("email_label").style.color = "red";
	if (f['name'].value) {
		u = true;
		$("name_label").style.color = "black";
	} else $("name_label").style.color = "red";
	if (f['password1'].value) {
		p1 = true;
		$("pass1_label").style.color = "black";
	} else $("pass1_label").style.color = "red";
	if (f['password2'].value) {
		p2 = true;
		$("pass2_label").style.color = "black";
	} else $("pass2_label").style.color = "red";

	if (!e || !u || !p1 || !p2) {
		var string = "Please fill out";
		if (!e) string += " email address";
		if (!u) string += (!e
					? ((!e && !p1) || (!e && !p2) || (!p1 && !p2)
					? ","
					: " and")
					: "") + " username";
		if (!p1) string += (!e || !u
					? ((!e && !u) && p2
					? ", and"
					: ((!e && !p2) || (!u && !p2)
					? ","
					: ""))
					: "") + " the first password field";
		if (!p2) string += (!e || !u || !p1
					? ((!e && !u) || (!e && !p1) || (!u && !p1)
					? ", and"
					: " and")
					: "") + " the second password field";
		string += ".";
		if (!e) string += "\n\nThe email id must be in the form of xxx@domain.suffix, "
					+ "optionally with multiple levels of domains.";
		window.alert(string);
		return false;
	} else if (f['password1'].value !== f['password2'].value) {
		window.alert("Passwords did not match !");
		return false;
	}
	f['checked'].value = "true";
	return true;
}

function checkLogin(f) {
	var e = false, p = false;

	if (f['email'].value) {
		if (f['email'].value.match(/^[a-zA-Z]([a-zA-Z0-9\-\_]*[a-zA-Z0-9])?@([a-zA-Z]([a-zA-Z0-9\-\_]*[a-zA-Z0-9])?\.)+[a-zA-Z]([a-zA-Z0-9\-\_]*[a-zA-Z0-9])?$/)) {
			e = true;
			$("top_email_label").style.color = "white";
		} else $("top_email_label").style.color = "red";
	} else $("top_email_label").style.color = "red";
	if (f['password'].value) {
		p = true;
		$("top_pass_label").style.color = "white";
	} else $("top_pass_label").style.color = "red";

	if (!e || !p) {
		var string = "Please fill out";
		if (!e) string += " email address";
		if (!p) string += (!e
					? " and"
					: "") + " password";
		string += ".";
		if (!e) string += "\n\nThe email must follow the form xxx@domain.suffix, "
					+ "optionally with multiple levels of domains.";
		window.alert(string);
		return false;
	}
	f['checked'].value = "true";
	return true;
}

function checkAdd(f) {
	if (!f['name'].value || !f['price'].value || !f['description'].value
			|| !f['filename'].value) {
		alert("Please fill everything !");
		return false;
	}
	f['checked'].value = "true";
	return true;
}