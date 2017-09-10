<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}

if(isset($_REQUEST['submit_x']))
{
	$currentvalue=trim($currentvalue);
	
	if($currentvalue==""){$flag=2;$errmsg="Please enter current value";}
	elseif(!(is_numeric($currentvalue)) || $currentvalue==0){$flag=2;$errmsg="Please enter valid current value";}
	
	if($flag!=2)
	{
		$update_settings_sql="update $tb_ref set sci_warrantdate='$warrantdate', sci_currentvalue='$currentvalue'";
		mysql_query($update_settings_sql) or die(mysql_error());
		$errmsg="Share settings are updated successfully";
	}
}
else
{
	$share_settings_sql="select sci_warrantdate, sci_currentvalue from $tb_ref";
	$share_settings_rs=mysql_query($share_settings_sql);
	$share_settings_arr=mysql_fetch_assoc($share_settings_rs);
	
	$warrantdate=$share_settings_arr['sci_warrantdate'];
	$currentvalue=$share_settings_arr['sci_currentvalue'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
<link type="text/css" rel="stylesheet" href="js_calendar/js_calendar.css" media="screen">
<script type="text/javascript" src="js_calendar/js_calendar.js"></script>
</head>

<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
      <form name="sharesettings" id="sharesettings" action="sharesettings.php" method="post">
        <table border="0" align="left" cellpadding="5" cellspacing="0" class="regiester-tbl">
		  <tr>
            <td colspan="2"><div id="errmsg" class="err_msg"><?php echo $errmsg; ?></div></td>
          </tr>
          <tr>
            <td>Warrant Date :</td>
            <td><input name="warrantdate" id="warrantdate" type="text" class="input_1" maxlength="10" value="<?php echo $warrantdate; ?>" readonly/><img src="cal_images/cal.gif" hspace="5" align="absmiddle"  onclick="displayCalendar(document.forms.sharesettings.warrantdate,'yyyy-mm-dd',this)"></td>
          </tr>
		  <tr>
            <td>Current Value INR :</td>
            <td><input name="currentvalue" id="currentvalue" type="text" class="input_1" maxlength="5" value="<?php echo $currentvalue; ?>"/></td>
          </tr>
		  
          <tr>
            <td><input name="submit" type="image" src="../images/save.png" alt="" value="Save" /></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2" class="manag_space"></td>
          </tr>
        </table>
      </form>
	<div class="clearfix"></div>
</div>
</body>
</html>