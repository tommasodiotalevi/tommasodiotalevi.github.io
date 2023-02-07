function verificaEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function controlloForm() {
  var nome = document.forms["formmail"]["nome"].value;
  var email = document.forms["formmail"]["email"].value;
  var msg = document.forms["formmail"]["msg"].value;
  var captchResponse = document.forms["formmail"]["response"].value;

  if (nome == "" || email == "" || msg == "") {
    alert("The fields Email, Name and Message are mandatory!");
    return false;
  }
  else if (verificaEmail(email) !== true) {
    alert("The email address does not seem correct!");
    return false;  
  }
  else if (captchResponse.length == 0 ){
  	alert("You have to check the recaptcha!")
	return false;
  }
  else{
    return true;
  }
}