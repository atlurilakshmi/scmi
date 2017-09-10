Event.observe('regform', 'submit', function(event) {
  var valid = true;
  var uname = $F('uname').strip();
  var passwd = $F('passwd').strip();
  var rpasswd = $F('rpasswd').strip();
  var fname = $F('fname').strip();
  var lname = $F('lname').strip();
  var email = $F('email').strip();
  var emailformat = /^.+@.+\..{2,3}$/
  var address = $F('address').strip();
  var city = $F('city').strip();
  var state = $F('state').strip();
  var country = $F('country').strip();
  var zipcode = $F('zipcode').strip();
  var mobile = $F('mobile').strip();
  var phone = $F('phone').strip();
  
  if ('' == uname)
  {
	  $('err_uname').update("Please enter username");
	  valid = false;
  }
  else
  {
	  $('err_uname').update("");
  }
  
  if ('' == passwd && '' != rpasswd)
  {
	  $('err_passwd').update("Please enter password");
	  valid = false;
  }
  else
  {
	  $('err_passwd').update("");
  }
  
  if ('' != passwd && '' == rpasswd)
  {
	  $('err_rpasswd').update("Please confirm password");
	  valid = false;
  }
  else
  {
	  $('err_rpasswd').update("");
  }
  
  if ('' != passwd && '' != rpasswd)
  {
	  if (passwd != rpasswd)
	  {
		  $('err_passwd').update("Passwords do not match");
		  $('err_rpasswd').update("Passwords do not match");
		  valid = false;
	  }
	  else
	  {
		  $('err_passwd').update("");
		  $('err_rpasswd').update("");
	  }
  }
  
  if ('' == fname)
  {
	  $('err_fname').update("Please enter first name");
	  valid = false;
  }
  else
  {
	  $('err_fname').update("");
  }
  
  if ('' == lname)
  {
	  $('err_lname').update("Please enter last name");
	  valid = false;
  }
  else
  {
	  $('err_lname').update("");
  }
  
  if ('' == email)
  {
	  $('err_email').update("Please enter email address");
	  valid = false;
  }
  else if(!(emailformat.test(email)))
  {
  	  $('err_email').update("Please enter valid email address");
	  valid = false;
  }
  else
  {
	  $('err_email').update("");
  }
  
  if ('' == address)
  {
	  $('err_address').update("Please enter address");
	  valid = false;
  }
  else
  {
	  $('err_address').update("");
  }
  
  if ('' == city)
  {
	  $('err_city').update("Please select city");
	  valid = false;
  }
  else
  {
	  $('err_city').update("");
  }
  
  if ('' == state)
  {
	  $('err_state').update("Please select state");
	  valid = false;
  }
  else
  {
	  $('err_state').update("");
  }
  
  if ('' == country)
  {
	  $('err_country').update("Please select country");
	  valid = false;
  }
  else
  {
	  $('err_country').update("");
  }
  
  if ('' == zipcode)
  {
	  $('err_zipcode').update("Please enter zipcode");
	  valid = false;
  }
  else
  {
	  $('err_zipcode').update("");
  }
  
  if ('' == mobile)
  {
	  $('err_mobile').update("Please enter mobile number");
	  valid = false;
  }
  else
  {
	  $('err_mobile').update("");
  }
  
  if ('' == phone)
  {
	  $('err_phone').update("Please enter home number");
	  valid = false;
  }
  else
  {
	  $('err_phone').update("");
  }
  
  if(valid == false)
  {
    Event.stop(event);
  }
});