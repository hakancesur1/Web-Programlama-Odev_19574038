window.onload=function(){
	document.getElementById("newUser").onchange=checkNewUser;
	document.getElementById("userNameLabel").onclick=deleteUserName;
	document.getElementById("passwordLabel").onclick=deletePassword;
	document.getElementById("notification").onclick=removeNotification;
	
	form = document.getElementById("signupForm");
	form.onsubmit = checkCompleteness;
	form.onreset=checkReset;
}

function checkNewUser(){
	var isNewUser=document.getElementById("newUser");
	var confirmPass=document.getElementById("confirmPassword");
	
	confirmPass.disabled=!isNewUser.checked;
	
	loginButton=document.getElementById("login");
	
	if(isNewUser.checked)
		loginButton.value="Create";
	else
		loginButton.value="Login";
}

function deleteUserName(){
	document.getElementById("userName").value="";
}

function deletePassword(){
	document.getElementById("password").value="";
}

function removeNotification(){
	notify=document.getElementById("notification")
	notify.parentNode.removeChild(notify);
}

function checkCompleteness()
{
	//var isNewUser=document.getElementById("newUser");

    if( form.userName.value.length == 0 ) { // name entered
	alert("You must enter a user name");
	return false;
    }

    if( form.password.value.length == 0 ) { // password entered
	alert("You must enter a valid password");
	return false;
    }

    if(newUser.checked && form.password.value != form.confirmPassword.value ) { // passwords agree
	alert("Passwords do not agree");
	return false;
    }
	
	alert("Login Successfull");
	return true;
}

function checkReset(){
	window.confirm("Are you sure?")
}