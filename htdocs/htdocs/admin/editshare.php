<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
	header('Location: login.php'); exit;
}

$sql="select sci_warrantdate,sci_currentvalue from $tb_ref";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res))
{
	$warrantdate=$row['sci_warrantdate'];
	$currentvalue=$row['sci_currentvalue'];
}

$share_info_sql="select * from $tb_transactions where sci_request_id='$transid'";
$share_info_rs=mysql_query($share_info_sql);
$share_info_arr=mysql_fetch_assoc($share_info_rs);
$warrantdate=$share_info_arr['sci_warrantdate'];
$transdate=$share_info_arr['sci_trans_date'];

if($_POST['action'] == 'SAVE')
{
	$investment=str_replace(",", "", $investment);
	if($transtype == 'Purchase' && $investment > 0) $numshare = floor($investment / 25.00);
	
	$update_share_sql="update $tb_transactions
set sci_investment = '$investment', sci_share_type = '$sharetype', sci_num_share = '$numshare', sci_pri_holder = '$priname', sci_joint = '$jointname', sci_benifit1 = '$benifit1', sci_benifit2 = '$benifit2' where sci_request_id='$transid' and sci_certficateno = 0";
	mysql_query($update_share_sql);

	header('Location: sharesearch_result.php'); exit;
}

if($_POST['action'] == 'UPDATE PAYMENT')
{
	$application=str_replace(",", "", $application);
	$allotment=str_replace(",", "", $allotment);
	$firstcall=str_replace(",", "", $firstcall);
	$secondcall=str_replace(",", "", $secondcall);
	$thirdcall=str_replace(",", "", $thirdcall);
	$investment=str_replace(",", "", $investment);
	if($transtype == 'Purchase' && $investment > 0)
	{
	$numshare = floor($investment / 25.00);
	$purchasevalue=number_format($investment / $numshare, 2);
	}

	$update_share_sql="update $tb_transactions
set sci_application = '$application', sci_allotment = '$allotment', sci_1stcall = '$firstcall', sci_2ndcall = '$secondcall', sci_3rdcall = '$thirdcall' where sci_request_id='$transid'";
	mysql_query($update_share_sql);

	$userid=mysql_result(mysql_query("select sci_cust_id from $tb_transactions where sci_request_id='$transid'"),0);
		
	$user_info_sql="select * from $tb_user where sci_cust_id='$userid'";
	$user_info_rs=mysql_query($user_info_sql) or die(mysql_error());
	$user_info_arr=mysql_fetch_assoc($user_info_rs);
	$username=$user_info_arr['sci_fname']." ".$user_info_arr['sci_lname'];
	$useremail=$user_info_arr['sci_email'];

	$totalpaid=$application+$allotment+$firstcall+$secondcall+$thirdcall;
	$balance=$investment - $totalpaid;

	$subject="SCIMORES SHARES R".$transid." PAYMENTS";
	$from=getAdminEmailAddress($tb_admin);
	$shareinfo = "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"160\">Request No </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"330\">R$transid</td>
					  </tr>";
					  
	$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Transaction Type </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$transtype</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Transaction Date </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$transdate</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Investment Amount </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">INR ".number_format($investment)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Share Type</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$sharetype</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Issue Open Till * </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$warrantdate</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Number of Shares </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">".number_format($numshare)."</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>
					  
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" colspan=2>SHARE HOLDERS</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>1. $priname</td>
					  </tr>";
					  
	if($jointname != "")
	$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>2. $jointname</td>
					  </tr>";
					  
	if($benifit1 != "")
	$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>3. $benifit1</td>
					  </tr>";
					  
	if($benifit2 != "")
	$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>4. $benifit2</td>
					  </tr>";


	$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2><br>*<br>
Purchase price will be fixed to face value of INR 25 a share during the issue open period.</td>
					  </tr>";


	$HTML="<html>
				<head>
				</head>
				<body>
				<table style=\"font-family:Tahoma\" width=\"500\" align=\"center\">
					  <tr>
						<td style=\"font-family:Tahoma; font-size:14px; font-weight:bold\" align=\"center\" colspan=2>SCIMORES Corporation</td>
					  </tr>
					  <tr>
						<td colspan=2>&nbsp;</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2>Dear $username,<br><br></td>
					  </tr>
					  <tr>
						<td colspan=2>
							<table width=\"500\" style=\"border:1px solid #000000; padding-left:5px\">
								<tr>
									<td colspan=2 height=10></td>
								</tr>
								$shareinfo
								<tr>
									<td colspan=2 height=10></td>
								</tr>
							</table>
						</td>
					  </tr>					 
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br>We have received your part payment towards your above request. Your current payment details are as below.<br><br></td>
					  </tr>
					  <tr>
						<td colspan=\"2\" style=\"font-family:Tahoma; font-size:12px; font-weight:bold\"><br>PAYMENT DETAILS:</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"200\">Requested Investment Amount</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"290\">= INR ".number_format($investment)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Number of Shares Allotted</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= ".number_format($numshare)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Purchasing Price</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= INR $purchasevalue</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>				  
					  <tr>
						<td colspan=\"2\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CALLS PAID:</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" width=\"200\">Application</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"290\">= INR ".number_format($application)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" width=\"200\">Allotment</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"290\">= INR ".number_format($allotment)."</td>
					  </tr>
<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" width=\"200\">1st Call</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"290\">= INR ".number_format($firstcall)."</td>
					  </tr>
<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" width=\"200\">2nd Call</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"290\">= INR ".number_format($secondcall)."</td>
					  </tr>
<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" width=\"200\">3rd Call</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"290\">= INR ".number_format($thirdcall)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" colspan=2>---------------------------------------------------------------------</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\">Total Paid</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= INR ".number_format($totalpaid)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; padding-left:38px\" colspan=2>---------------------------------------------------------------------</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>-----------------------------------------------------------------------------</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Balance Payment Due</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= INR ".number_format($balance)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>-----------------------------------------------------------------------------</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>Thanking you,<br><br><br>Sincerely,<br>
				IR Management<br>
				Scimores Corporation Limited<br></td>
					  </tr>
				 </table>
				</body>
				</html>";
	sendHTMLemail($HTML,$from,$useremail,$subject);

	header('Location: sharesearch_result.php'); exit;
}

if($_POST['action'] == 'CANCEL')
{
	header('Location: sharesearch_result.php'); exit;
}

$transtype=$share_info_arr['sci_trans_type'];
$application=$share_info_arr['sci_application'];
$allotment=$share_info_arr['sci_allotment'];
$firstcall=$share_info_arr['sci_1stcall'];
$secondcall=$share_info_arr['sci_2ndcall'];
$thirdcall=$share_info_arr['sci_3rdcall'];
$investment=$share_info_arr['sci_investment'];
$sharetype=$share_info_arr['sci_share_type'];
$numshare=$share_info_arr['sci_num_share'];
if($transtype=='Sell')
{
	$certificateno=$share_info_arr['sci_certficateno'];
	$dateofpurchase=$share_info_arr['sci_purchase_date'];
	$purchasevalue=number_format($investment / $numshare, 2);
	$sellingamount=$numshare * $currentvalue;
}
$priname=$share_info_arr['sci_pri_holder'];
$name1percent=$share_info_arr['sci_pri_percent'];
$jointname=$share_info_arr['sci_joint'];
$jb1=$share_info_arr['sci_jb1'];
$name2percent=$share_info_arr['sci_joint_percent'];
$benifit1=$share_info_arr['sci_benifit1'];
$jb2=$share_info_arr['sci_jb2'];
$name3percent=$share_info_arr['sci_benifit1_percent'];
$benifit2=$share_info_arr['sci_benifit2'];
$jb3=$share_info_arr['sci_jb3'];
$name4percent=$share_info_arr['sci_benifit2_percent'];
$benifit3=$share_info_arr['sci_benifit3'];
$name5percent=$share_info_arr['sci_benifit3_percent'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" language="javascript">
function processInvest(investamount)
{
	investamount = investamount.replace(/,/g, '');
	
	if(isNaN(investamount))
	{
		document.frmmanageshare.investment.value='';
		document.frmmanageshare.numshare.value='';
	}
	else
	{
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(investamount)) {
			investamount = investamount.replace(rgx, '$1' + ',' + '$2');
		}
		document.frmmanageshare.investment.value=investamount;
	}
}

function invest(val)
{
	if(val != '')
	{
		val = val.replace(/,/g, '');
		var cvalue=document.frmmanageshare.purchasevalue.value;
		var numshare=val/cvalue;
		numshare=Math.floor(numshare);
		var numberofshares=String(numshare);
		
		var regx = /(\d+)(\d{3})/;
		while (regx.test(numberofshares)) {
			numberofshares = numberofshares.replace(regx, '$1' + ',' + '$2');
		}
		document.frmmanageshare.numshare.value=numberofshares;
	}
}
</script>
</head>

<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
      <div class="m_err_msg"><?php echo $errmsg; ?></div>
      <form name="frmmanageshare" method="post" autocomplete="off">
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl_extend">
          <tr>
            <td class="manag_space" colspan="6"></td>
          </tr>
          <tr>
            <td width="136">Purchase / Sell</td>
            <td width="146">
			<select name="transtype" size="1" class="list_1" <?php if($disablemodification) echo 'disabled'; ?>>
                <option value="Purchase" <?php if($transtype == 'Purchase') echo 'selected'; ?>>Purchase</option>
            </select>
			</td>
            <td width="110" class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>">Certificate Number</td>
            <td width="178" class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>">
			<select name="certificateno" size="1" class="list_1" onchange="sellsubmit()" <?php if($transtype == 'Purchase' || $authcodevalid) echo 'disabled'; ?>>
				<option value="">Select</option>
				<?php while($user_certificates_arr=mysql_fetch_array($user_certificates_rs)) { ?>
                <option value="<?php echo $user_certificates_arr['sci_certficateno']; ?>" <?php if($user_certificates_arr['sci_certficateno'] == $certificateno) echo 'selected'; ?>><?php echo 'C '.$user_certificates_arr['sci_certficateno']; ?></option>
                <?php } ?>
			</select>
			</td>
	    <td width="100">Application</td>
	    <td width="130"><input name="application" type="text" class="input_1" maxlength="10" value="<?php if($application > 0) echo number_format($application); ?>"></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="6"></td>
          </tr>
          <tr>
            <td>Investment Amount INR</td>
            <td><input name="investment" type="text" class="input_1" maxlength="10" value="<?php if($investment > 0) echo number_format($investment); ?>" onblur="invest(this.value)" onkeyup="processInvest(this.value);" <?php if($disablemodification) echo 'disabled'; ?>/></td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>">Date of Purchase</td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>"><input name="dateofpurchase" type="text" class="input_1" value="<?php echo $dateofpurchase;?>" disabled/></td>
	    <td>Allotment</td>
	    <td><input name="allotment" type="text" class="input_1" maxlength="10" value="<?php if($allotment > 0) echo number_format($allotment); ?>"></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="6"></td>
          </tr>
          <tr>
            <td>Share Type *</td>
            <td><select name="sharetype" size="1" class="list_1" <?php if($disablemodification) echo 'disabled'; ?>>
                	<option value="Equity" <?php if($sharetype == 'Equity') echo 'selected'; ?>>Equity</option>
              	</select>
			</td>
            <td>Purchase Value INR</td>
            <td>
			<?php if($transtype == 'Purchase') { ?>
			<input name="purchasevalue" type="text" class="input_1" value="25.00" disabled="disabled"/>
			<?php } elseif($transtype == 'Sell') { ?>
			<input name="purchasevalue" type="text" class="input_1" value="<?php echo $purchasevalue; ?>" disabled="disabled"/>
			<?php } ?>
			</td>
	    <td>1st Call</td>
	    <td><input name="firstcall" type="text" class="input_1" maxlength="10" value="<?php if($firstcall > 0) echo number_format($firstcall); ?>"></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="6"></td>
          </tr>
          <tr>
            <td>Issue Open Till</td>
            <td><input name="warrantdate" type="text" class="input_1" value="<?php echo $warrantdate; ?>" disabled="disabled"/></td>
            <td>Current Value INR</td>
            <td><input name="currentvalue" type="text" class="input_1" value="<?php echo $currentvalue; ?>" disabled="disabled"/></td>
	    <td>2nd Call</td>
	    <td><input name="secondcall" type="text" class="input_1" maxlength="10" value="<?php if($secondcall > 0) echo number_format($secondcall); ?>"></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="6"></td>
          </tr>
          <tr>
            <td>Number of Shares</td>
            <td><input name="numshare" type="text" class="input_1" value="<?php if($investment > 0) echo number_format($numshare); ?>" disabled="disabled"/></td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>">Selling Amount INR</td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>"><input name="sellingamount" type="text" class="input_1" value="<?php if($sellingamount > 0) echo number_format($sellingamount); ?>" disabled="disabled"/></td>
	    <td>3rd Call</td>
	    <td><input name="thirdcall" type="text" class="input_1" maxlength="10" value="<?php if($thirdcall > 0) echo number_format($thirdcall); ?>"></td>
          </tr>
		  <tr>
            <td class="manag_space" colspan="6"></td>
          </tr>
        </table>
        <!-- manage shares  -->
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
          <tr>
            <td colspan="4">Share Holder(s):</td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
          <tr>
            <td class="manag_tr2">Name 1</td>
            <td class="manag_tr3"><input name="priname" type="text" value="<?php echo $priname; ?>" class="input_3" <?php if($disablemodification) echo 'disabled'; ?>/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Name 2</td>
            <td><input name="jointname" type="text" value="<?php echo $jointname; ?>" class="input_3" <?php if($disablemodification) echo 'disabled'; ?>/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Name 3</td>
            <td><input name="benifit1" type="text" value="<?php echo $benifit1; ?>" class="input_3" <?php if($disablemodification) echo 'disabled'; ?>/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Name 4 </td>
            <td><input name="benifit2" type="text" value="<?php echo $benifit2; ?>" class="input_3" <?php if($disablemodification) echo 'disabled'; ?>/></td>
          </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
		  <tr>
            <td class="manag_medium_space" colspan="3"></td>
          </tr>
          <tr>
            <td><input type="submit" name="action" value="UPDATE PAYMENT" class="formbutton" /><input type="submit" name="action" value="SAVE" class="formbutton" /><input type="submit" name="action" value="CANCEL" class="formbutton" />
            </td>
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