<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
	header('Location: login.php'); exit;
}

if($_POST['action'] == 'SAVE')
{
	
	$update_user_sql="update $tb_user
set sci_cust_id = '$userid',sci_username = '$username',sci_fname = '$fname',sci_lname = '$lname',sci_email = '$email',sci_state = '$state', sci_country = '$country', sci_zip = '$zip', sci_mobile = '$mobile', sci_phone = '$phone', sci_status = '$status' where sci_cust_id='$userid'";
	mysql_query($update_user_sql);

	header('Location: usersearch_result.php'); exit;
}
if($_POST['action'] == 'DELETE')
{
	
	$delete_user_sql="delete from $tb_user
where sci_cust_id = '$userid'";
	mysql_query($delete_user_sql);

	header('Location: usersearch_result.php'); exit;
}

if($_POST['action'] == 'CANCEL')
{
	header('Location: usersearch_result.php'); exit;
}

$sql="select sci_cust_id,sci_username,sci_fname,sci_lname,sci_email,sci_email,sci_state,sci_country,sci_zip,sci_mobile,sci_phone,sci_status from $tb_user";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res))
{
	$actcode=$row['sci_actcode'];
	
}

$user_info_sql="select * from $tb_user where sci_cust_id='$userid'";
$user_info_rs=mysql_query($user_info_sql);
$user_info_arr=mysql_fetch_assoc($user_info_rs);

$userid=$user_info_arr['sci_cust_id'];
$username=$user_info_arr['sci_username'];
$fname=$user_info_arr['sci_fname'];
$lname=$user_info_arr['sci_lname'];
$email=$user_info_arr['sci_email'];
$state=$user_info_arr['sci_state'];
$country=$user_info_arr['sci_country'];
$zip=$user_info_arr['sci_zip'];
$mobile=$user_info_arr['sci_mobile'];
$phone=$user_info_arr['sci_phone'];
$status=$user_info_arr['sci_status'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />

</head>

<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
      <div class="m_err_msg"><?php echo $errmsg; ?></div>
      <form name="frmmanageshare" method="post" autocomplete="off">
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
          <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">Username</td>
            <td width="146">
			<input name="username" type="text" class="input_1" maxlength="10" value="<?php echo $username; ?>"/>				</td>
            <td width="110" >Firstname</td>
            <td width="178" >
			<input name="fname" type="text" class="input_1" maxlength="10" value="<?php echo $fname; ?>"/>				</td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
		  
		    <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">Lastname</td>
            <td width="146">
			<input name="lname" type="text" class="input_1" maxlength="10" value="<?php echo $lname; ?>"/>			</td>
            <td width="110" >EmailID</td>
            <td width="178" ><input name="email" type="text" class="input_1" maxlength="10" value="<?php  echo $email; ?>"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
		  
		    <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">State</td>
            <td width="146">
			<input name="state" type="text" class="input_1" maxlength="10" value="<?php  echo $state; ?>"/></td>
            <td width="110" >Country</td>
            <td width="178" ><input name="country" type="text" class="input_1" maxlength="10" value="<?php  echo $country; ?>"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
		  
		    <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">Zipcode</td>
            <td width="146">
			<input name="zip" type="text" class="input_1" maxlength="10" value="<?php echo $zip; ?>"/>			</td>
            <td width="110" >Phone No </td>
            <td width="178"  ><input name="phone" type="text" class="input_1" maxlength="10" value="<?php echo $phone; ?>"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		    <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">Mobile No </td>
            <td width="146">
			<input name="mobile" type="text" class="input_1" maxlength="10" value="<?php echo $mobile; ?>"/>			</td>
            <td width="110" >Status</td>
            <td width="178" class=""><input name="status" type="text" class="input_1" maxlength="10" value="<?php echo $status; ?>"/></td>
          </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
		  <tr>
            <td class="manag_medium_space" colspan="3"></td>
          </tr>
          <tr>
            <td><input type="submit" name="action" value="SAVE" class="formbutton" /><input type="submit" name="action" value="CANCEL" class="formbutton" />
              <input type="submit" name="action" value="DELETE" class="formbutton" />            </td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="3"></td>
          </tr>
        </table>
      </form>
	<div class="clearfix"></div>
</div>
</body>
</html>
