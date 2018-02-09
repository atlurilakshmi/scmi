<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}

if(count($_POST['usersid']) > 0)
{
	foreach($_POST['usersid'] as $userid)
	{
		$user_info_sql="select sci_actcode,sci_fname,sci_lname,sci_email from $tb_user where sci_cust_id='$userid'";
		$user_info_rs=mysql_query($user_info_sql) or die(mysql_error());
		$user_info_arr=mysql_fetch_assoc($user_info_rs);
		$username=$user_info_arr['sci_fname']." ".$user_info_arr['sci_lname'];
		$useremail=$user_info_arr['sci_email'];
	
		$to=$useremail;
		$subject="SCIMORES MEMBERSHIP";
		$from=getAdminEmailAddress($tb_admin);

		$_POST['action'] = strtolower($_POST['action']);
		if($_POST['action'] == 'approve')
		{
			$update_user_sql="update $tb_user set sci_status='APPROVED' where sci_cust_id='$userid'";
			mysql_query($update_user_sql);
			
			$actcode=$user_info_arr['sci_actcode'];
			$actlink=$base_url."/useractivation.php?code=".$actcode;
			
			$HTML="<html>
					<head>
					</head>
					<body>
					<table style=\"font-family:Tahoma; width:466px\" align=\"center\">
						  <tr>
							<td style=\"font-family:Tahoma; font-size:14px; font-weight:bold\" align=\"center\">SCIMORES Corporation</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\">Dear $username,<br><br>Member ID: M$userid<br><br>Thank you for registering at www.scimores.com. Your account is created and must be activated before you can use it.<br><br>To activate the account, click on the following link or copy-paste it in your browser:<br><a href=\"$actlink\" target=\"_blank\">$actlink</a><br><br>Thanking you,<br><br><br>Sincerely,<br>
			IR Management<br>
			Scimores Corporation Limited<br></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>						  
					 </table>
					</body>
				</html>";
			sendHTMLemail($HTML,$from,$to,$subject);
			$actionstatus='approved';
		}
		
		if($_POST['action'] == 'decline')
		{
			$update_user_sql="update $tb_user set sci_status='DECLINED' where sci_cust_id='$userid'";
			mysql_query($update_user_sql);
			
			$HTML="<html>
					<head>
					</head>
					<body>
					<table style=\"font-family:Tahoma\" width=\"500\" align=\"center\">
						<tr>
							<td style=\"font-family:Tahoma; font-size:14px; font-weight:bold\" align=\"center\">SCIMORES Corporation</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						  <tr>
							<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\">Dear $username,<br><br>We received your Scimores Member Registration Form. Thank you for your interest. But, we regret for not able to approve your request at this time due to few further validation requirements. One of our Investor Relations Manager will contact you shortly to clarify the required details, and approve your request at the earliest possible.<br><br>Thanking you,<br><br><br>Sincerely,<br>
					IR Management<br>
					Scimores Corporation Limited<br>
					</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>				  
					 </table>
					</body>
					</html>";
			sendHTMLemail($HTML,$from,$to,$subject);
			$actionstatus='declined';
		}
	}
	$statusmsg="Selected User(s) is/are ".$actionstatus;
}

$susername=trim($susername);
$firstname=trim(ucfirst($firstname));
$lastname=trim(ucfirst($lastname));
$email=trim($email);
$zipcode=trim($zipcode);
$country_str = @implode(", ",$country);
$state_str = @implode(", ",$state);
$city_str = @implode(", ",$city);

$users_sql = "SELECT * from $tb_user where sci_cust_id > 0";

if($susername!="")
{
	$users_sql .= " AND sci_username = '$susername'";
}	
if($firstname!="")
{
	$users_sql .= " AND sci_fname = '$firstname'";
}
if($lastname!="")
{
	$users_sql .= " AND sci_lname = '$lastname'";
}
if($email!="")
{
	$users_sql .= " AND sci_email = '$email'";
}
if($country_str!="")
{
	$users_sql .= " AND sci_country IN('$country_str')";
}
if($state_str!="")
{
	$users_sql .= " AND sci_state IN('$state_str')";
}
if($city_str!="")
{
	$users_sql .= " AND sci_city IN('$city_str')";
}
if($zipcode!="")
{
	$users_sql .= " AND sci_zip = '$zipcode'";
}
if($status!="")
{
	if($status=="PENDING") $status = '';
	$users_sql .= " AND sci_status = '$status'";
}

$users_sql .= " ORDER BY sci_cust_id DESC";
$users_rs = mysql_query($users_sql);
$users_num = mysql_num_rows($users_rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
<script language="javascript" type="text/javascript">
function makecheckordecheckall()
{
	var usersidlength=document.usersearchres.elements['usersid[]'].length;
	for(var k=0; k<usersidlength; k++)
    {
		if(document.usersearchres.checkordecheckall.checked==true)
		{
			document.usersearchres.elements['usersid[]'][k].checked=true;
		}
		if(document.usersearchres.checkordecheckall.checked==false)
		{
			document.usersearchres.elements['usersid[]'][k].checked=false;
		}
    }
}
</script>
</head>
<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
	<form name="usersearchres" id="usersearchres" method="post">
    <table cellpadding="3" cellspacing="0" class="port_tbl">
        <tr>
          <td colspan="9">&nbsp;</td>
          <td colspan="3" align="center">
		  <div id="port_manage_butt"><a href="usersearch.php" target="_self">BACK TO SEARCH</a></div></td>
        </tr>
		<tr><td colspan="12"><div class="err_msg"><?php echo $statusmsg; ?></div></td></tr>
		<?php if($users_num > 0) { ?>
		<tr>
		  <td colspan="12" align="right">
			<?php if($status == '') { ?>
			<input type="submit" name="action" value="APPROVE" class="formbutton" />
			<input type="submit" name="action" value="DECLINE" class="formbutton" />
			<?php } ?>
		  </td>
		</tr>
        <tr>
		  <td><input name="checkordecheckall" type="checkbox" value="1" onclick="makecheckordecheckall();"></td>
          <td>Member ID</td>
          <td>Username</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email ID</td>
          <td>Country</td>
		  <td>State</td>
		  <td>Zipcode</td>
		  <td>Phone No</td>
		  <td>Mobile No</td>
          <td>Status</td>
        </tr>
		<?php } else { ?>
		<tr><td colspan="12"><div id="errmsg" class="err_msg">No records found matching the Search Criteria.</div></td></tr>
        <?php }
		while($users_arr=mysql_fetch_array($users_rs))
		{
			$i++;
			$country_arr = getCountryInfo($tb_countries, $users_arr['sci_country']);
			$country_name = iconv("ISO-8859-1", "UTF-8", $country_arr['Country']);
			$state_arr = getStateInfo($tb_states, $users_arr['sci_state']);
			$state_name = iconv("ISO-8859-1", "UTF-8", $state_arr['Region']);
			/*$city_arr = getCityInfo($tb_cities, $users_arr['sci_city']);
			$city_name = iconv("ISO-8859-1", "UTF-8", $city_arr['City']);*/
		?>
        <tr>
		  <td class="port_content" align="center"><input name="usersid[]" type="checkbox" value="<?php echo $users_arr['sci_cust_id']; ?>">
		  </td>
          <td class="port_content" align="center"><?php echo 'M'.$users_arr['sci_cust_id']; ?></td>
          <td class="port_content" align="left"><?php echo $users_arr['sci_username']; ?></td>
          <td class="port_content" align="left"><?php echo $users_arr['sci_fname']; ?></td>
          <td class="port_content" align="left"><?php echo $users_arr['sci_lname']; ?></td>
          <td class="port_content" align="left"><?php echo $users_arr['sci_email']; ?></td>
          <td class="port_content" align="left"><?php echo $country_name; ?></td>
		  <td class="port_content" align="left"><?php echo $state_name; ?></td>
		  <td class="port_content" align="left"><?php echo $users_arr['sci_zip']; ?></td>
		  <td class="port_content" align="left"><?php echo $users_arr['sci_phone']; ?></td>
		  <td class="port_content" align="left"><?php echo $users_arr['sci_mobile']; ?></td>
          <td class="port_content" align="left"><?php if($users_arr['sci_status'] == '') echo 'PENDING'; else echo $users_arr['sci_status']; ?></td>
        </tr>
        <?php
		}
		?>
    </table>
	<div class="clearfix"></div>
</div>
</body>
</html>