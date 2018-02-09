<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php'); exit;
}

if(isset($_REQUEST['submit_x']))
{
	$password=trim($password);
	$retypepassword=trim($retypepassword);
	$email=trim($email);
	
	if($password!=$retypepassword){	$flag=2;$errmsg="Passwords do not match";}
	elseif($email==""){$flag=2;$errmsg="Please enter email address";}
	elseif(isnotValidEmail($email)){$flag=2;$errmsg="Please enter valid email address";}
	
	if($flag!=2)
	{
		if($password!="")
		{
			$password=md5($password);
			$update_password_sql="update $tb_admin set sci_admin_passwd='$password' where sci_admin_uname='".$_SESSION['sciadmin']."'";
			mysql_query($update_password_sql) or die(mysql_error());
		}
		
		$update_admin_sql="update $tb_admin set sci_admin_email='$email' where sci_admin_uname='".$_SESSION['sciadmin']."'";
		mysql_query($update_admin_sql) or die(mysql_error());
		$errmsg="Admin settings are updated successfully";
	}
}
else
{
	$admin_sql="select * from $tb_admin where sci_admin_uname='".$_SESSION['sciadmin']."'";
	$admin_rs=mysql_query($admin_sql);
	$admin_arr=mysql_fetch_array($admin_rs);
	
	$email=$admin_arr['sci_admin_email'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
<script language="javascript" type="text/javascript" src="../js/prototype/prototype.js"></script>
</head>

<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
      <form name="adminsettings" id="adminsettings" action="adminsettings.php" method="post">
        <table border="0" align="left" cellpadding="5" cellspacing="0" class="regiester-tbl">
		  <tr>
            <td colspan="3"><div id="errmsg" class="err_msg"><?php echo $errmsg; ?></div></td>
          </tr>
          <tr>
            <td>New Password :</td>
            <td><input name="password" id="passwd" type="password" class="input_4" maxlength="12"/></td>
            <td><span class="form_error" id="err_passwd"></span></td>
          </tr>
          <tr>
            <td>Retype Password :</td>
            <td><input name="retypepassword" id="rpasswd" type="password" class="input_4" maxlength="12"/></td>
            <td><span class="form_error" id="err_rpasswd"></span></td>
          </tr>
		  <tr>
            <td>Email Address :</td>
            <td><input name="email" id="email" type="text" class="input_4" maxlength="50" value="<?php echo $email; ?>"/></td>
            <td><span class="form_error" id="err_email"></span></td>
          </tr>
		  
          <tr>
            <td><input name="submit" type="image" src="../images/save.png" alt="" value="Save" /></td>
            <td></td>
			<td></td>
          </tr>
          <tr>
            <td colspan="3" class="manag_space"></td>
          </tr>
        </table>
      </form>
	<div class="clearfix"></div>
</div>
<script language="javascript" type="text/javascript" src="js/validation.js"></script>
</body>
</html>