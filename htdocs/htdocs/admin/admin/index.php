<?php
require_once("../config.php");
if(isset($_SESSION['sciadmin'])){
header('Location: adminsettings.php');
}

if(isset($_REQUEST['txtusername']) && isset($_REQUEST['txtpassword']))
{
	$txtusername=trim($txtusername);
	$txtpassword=md5(trim($txtpassword));
	
	$sql="select * from sci_admin where sci_admin_uname='$txtusername' and sci_admin_passwd='$txtpassword'";
	$res=mysql_query($sql);
	$row=mysql_num_rows($res);
	
	if($row>0)
	{
		$_SESSION['sciadmin']=$txtusername;
		header('location: adminsettings.php');
	}
	else
	{
		$flag='err';
		$errmsg="Invalid username or password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<div id="header_wrapper">
  <div id="header">SCIMORES ADMIN PANEL</div>
</div>
<div class="clearfix"></div>
<div id="content_wrapper">
	<form name="frmlogin" action="index.php" method="post">
	<table border="0" align="center" cellpadding="5" cellspacing="0" width="400" style="border:1px solid #000000">
		<?php if ($flag=='err'){?>
		<tr>
			<td colspan="2"><div id="errmsg" class="err_msg"><?php echo $errmsg; ?></div></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="167">Username :</td>
			<td width="213"><input name="txtusername" id="uname" type="text" class="input_4" maxlength="12"/></td>
		</tr>
		<tr>
			<td>Password :</td>
			<td><input name="txtpassword" id="passwd" type="password" class="input_4" maxlength="12"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input name="signin" type="image" src="../images/signin.png"/></td>
		</tr>
	</table>
	</form>
	<div class="clearfix"></div>
</div>
</body>
</html>