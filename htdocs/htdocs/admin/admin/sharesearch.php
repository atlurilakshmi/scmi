<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}

$user_sql="select sci_cust_id from $tb_transactions group by sci_cust_id";
$user_rs=mysql_query($user_sql);
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
      <form name="sharesearch" id="sharesearch" action="sharesearch_result.php" method="get">
        <table border="0" align="left" cellpadding="5" cellspacing="0">
          <tr>
            <td width="146">Investment Amount :</td>
            <td width="232">From <input name="investmin" id="investmin" type="text" class="input_1" maxlength="10"/></td>
            <td width="232">To <input name="investmax" id="investmax" type="text" class="input_1" maxlength="10"/></td>
          </tr>
		  
          <tr>
            <td>Number of Shares :</td>
            <td>From <input name="sharesmin" id="sharesmin" type="text" class="input_1" maxlength="10"/></td>
            <td>To <input name="sharesmax" id="sharesmax" type="text" class="input_1" maxlength="10"/></td>
          </tr>
		  
		  <tr>
            <td>Purchase Date :</td>
            <td>From <input name="pdatefrom" id="pdatefrom" type="text" class="input_1" maxlength="10" readonly/><img src="cal_images/cal.gif" hspace="5" align="absmiddle"  onclick="displayCalendar(document.forms.sharesearch.pdatefrom,'yyyy-mm-dd',this)"></td>
            <td>To <input name="pdateto" id="pdateto" type="text" class="input_1" maxlength="10" readonly/><img src="cal_images/cal.gif" hspace="5" align="absmiddle"  onclick="displayCalendar(document.forms.sharesearch.pdateto,'yyyy-mm-dd',this)"></td>
		  </tr>
		  
		  <tr>
            <td>Primary Name :</td>
            <td><input name="prname" id="prname" type="text" class="input_4" maxlength="30"/></td>
			<td></td>
          </tr>
		  
		  <tr>
            <td>Member ID :</td>
            <td>
				<select name="suserid" size="1" class="list_1">
					<option value="">Select</option>
					<?php while($user_arr=mysql_fetch_array($user_rs)) { ?>
					<option value="<?php echo $user_arr['sci_cust_id']; ?>"><?php echo 'M'.$user_arr['sci_cust_id']; ?></option>
					<?php } ?>
				</select>
			</td>
			<td></td>
          </tr>
		  
		  <tr>
            <td>Request Type :</td>
            <td>
				<select name="stranstype" id="stranstype" size="1" class="list_1">
					<option value="">Select</option>
					<option value="Purchase">Purchase</option>
					<option value="Sell">Sell</option>
				</select>
			</td>
          </tr>
		  
		  <tr>
            <td>Request Status :</td>
            <td>
				<select name="status" id="status" size="1" class="list_1">
				<option value="">Select Status</option>
				<option value="PENDING">PENDING</option>
				<option value="SUBMITTED">SUBMITTED</option>
				<option value="APPROVED">APPROVED</option>
				<option value="DECLINED">DECLINED</option>
				<option value="ALLOTED">ALLOTED</option>
				<option value="ISSUED">ISSUED</option>
				<option value="RECEIVED">RECEIVED</option>
				<option value="SOLD">SOLD</option>
				</select>
			</td>
          </tr>
		  
          <tr>
            <td colspan="3" class="manag_space"></td>
          </tr>
          <tr>
            <td><input name="submit" type="image" src="../images/submit.png" alt="" value="Search" /></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="3" class="manag_space"></td>
          </tr>
        </table>
      </form>
	<div class="clearfix"></div>
</div>
</body>
</html>