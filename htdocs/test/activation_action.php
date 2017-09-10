<script language="javascript" type="text/javascript" src="js/prototype/prototype.js"></script>
<script language="javascript" type="text/javascript">
window.opener.close();
function closewindow()
{
	window.close();
}

var pageurl = 'activation_ajax.php?'+'<?php echo $_SERVER['QUERY_STRING']; ?>&sid='+Math.random();
new Ajax.Request(pageurl, { method: 'get', onSuccess: function(response)
{
	var actionstatus = response.responseText;
	var actionstatusmsg = 'Processing is complete. ';
	if(actionstatus == 1)
		actionstatusmsg += "Your Account is activated.";
	else if(actionstatus == 2)
		actionstatusmsg += "Your Account is already activated.";
	else if(actionstatus == 3)
		actionstatusmsg += "Invalid Activation code.";
	else
		actionstatusmsg = 'Error occured in processing';
		
	$('actionstatusdiv').update(actionstatusmsg);
	setTimeout('closewindow()',10000);
}});
</script>

<div align="center" id="actionstatusdiv">Processing. Please wait...</div>
<div>&nbsp;</div>
<div align="center"><input type="button" name="closebutton" onclick="window.close();" value="Close Window" /></div>