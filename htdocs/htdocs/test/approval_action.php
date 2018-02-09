<script language="javascript" type="text/javascript" src="js/prototype/prototype.js"></script>
<script language="javascript" type="text/javascript">
window.opener.close();
function closewindow()
{
	window.close();
}

var pageurl = 'approval_ajax.php?'+'<?php echo $_SERVER['QUERY_STRING']; ?>&sid='+Math.random();
new Ajax.Request(pageurl, { method: 'get', onSuccess: function(response)
{
	var actionstatus = response.responseText;
	var actionstatusmsg = 'Processing is complete. ';
	if(actionstatus == "transactionapproved")
		actionstatusmsg += 'The Transaction Request is approved';
	else if(actionstatus == "transactiondeclined")
		actionstatusmsg += 'The Transaction Request is declined';
	else if(actionstatus == "userapproved")
		actionstatusmsg += 'The User is approved';
	else if(actionstatus == "userdeclined")
		actionstatusmsg += 'The User is declined';
	else
		actionstatusmsg = 'Error occured in processing';
		
	$('actionstatusdiv').update(actionstatusmsg);
	setTimeout('closewindow()',10000);
}});
</script>

<div align="center" id="actionstatusdiv">Processing. Please wait...</div>
<div>&nbsp;</div>
<div align="center"><input type="button" name="closebutton" onclick="window.close();" value="Close Window" /></div>