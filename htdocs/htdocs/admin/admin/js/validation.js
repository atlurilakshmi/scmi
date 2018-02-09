Event.observe('adminsettings', 'submit', function(event) {
  var valid = true;
  var passwd = $F('passwd').strip();
  var rpasswd = $F('rpasswd').strip();
  var email = $F('email').strip();
  var emailformat = /^.+@.+\..{2,3}$/
  
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
	  $('err_rpasswd').update("Please retype password");
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
  
  if(valid == false)
  {
    Event.stop(event);
  }
});