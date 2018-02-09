<?php
require_once("config.php");
if(!isset($_SESSION['user'])){
header('Location: login.php'); exit;
}
if(!isset($_SESSION['shareauthcode'])){
header('Location: manage-shares.php'); exit;
}

$authcode=$_SESSION['shareauthcode'];
$email=mysql_result(mysql_query("select sci_email from $tb_user where sci_username='".$_SESSION['user']."'"),0);
$userid=mysql_result(mysql_query("select sci_cust_id from $tb_user where sci_username='".$_SESSION['user']."'"),0);

if(isset($authcode))
{
	$share_info_sql="select * from $tb_transactions where sci_auth_code='$authcode' and sci_cust_id='$userid'";
	$share_info_rs=mysql_query($share_info_sql);
	
	$share_info_arr=mysql_fetch_assoc($share_info_rs);
	$transid=$share_info_arr['sci_request_id'];
	$transtype=$share_info_arr['sci_trans_type'];
	$certificateno=$share_info_arr['sci_certficateno'];
	$investment=$share_info_arr['sci_investment'];
	$sharetype=$share_info_arr['sci_share_type'];
	$warrantdate=$share_info_arr['sci_warrantdate'];
	$numshare=$share_info_arr['sci_num_share'];
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
}
$errmsg="Please verify your request and CONFIRM";

if(isset($requestcancel_x))
{
	$errmsg="CANCEL will delete your current request from the database. You will be required to submit a fresh request. Please confirm your choice again.";
	$confirmcancel = true;
		
	if($confirmcancelhidden == 1)
	{
		$delete_requests_sql="delete from $tb_transactions where sci_approval_status='' AND sci_auth_code='$authcode' AND sci_cust_id='$userid'";
		mysql_query($delete_requests_sql);
		header('Location: my-port.php'); exit;
	}
}
elseif(isset($requestconfirm_x))
{
	$transdate=date('Y-m-d');
	$update_share_sql="update $tb_transactions set sci_trans_date='$transdate', sci_approval_status='SUBMITTED' where sci_request_id='$transid' and sci_cust_id='$userid' and sci_approval_status=''";
	mysql_query($update_share_sql) or die(mysql_error());
	$update_share_status = mysql_affected_rows();
	
	if($update_share_status > 0)
	{
		//mail to admin
		$subject="Request for ".$transtype;
		$from=$email;
		$to=getAdminEmailAddress($tb_admin);
		$emailheading=strtoupper($transtype).' APPROVAL REQUEST';
		
		$shareinfo = "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"160\">Request No </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"330\">R$transid</td>
					  </tr>";
					  
		if($transtype == 'Sell')
		{
		$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Certificate Number </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">C$certificateno</td>
					  </tr>";
		}
			
		$shareinfo.= "<tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Transaction Type </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$transtype</td>
					  </tr>
					 
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Investment Amount </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">INR ".number_format($investment)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Share Type </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$sharetype</td>
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" colspan=2>SHARE HOLDER(S)</td>
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
			<table style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"500\" align=\"center\">
				  <tr>
					<td colspan=\"2\" style=\"font-family:Tahoma; font-size:14px; font-weight:bold\" align=\"center\">$emailheading</td>
				  </tr>
				  <tr>
					<td colspan=\"2\"></td>
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
				  </tr>";
				  
		$HTML.=  "<tr><td colspan=\"2\" style=\"font-family:Tahoma; font-size:12px; font-weight:bold\">Admin Approval Action</td></tr>
				  <tr>
					<td><a href=\"$approvalurl?purchaseregapproval=APPROVED&transid=$transid\" target=\"_blank\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">APPROVE</a></td>
					<td><a href=\"$approvalurl?purchaseregapproval=DECLINED&transid=$transid\" target=\"_blank\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">DECLINE</a></td>
				  </tr>
			 </table>
			</body>
			</html>";
		
		sendHTMLemail($HTML,$from,$to,$subject);
		$statusmsg = "Thank you for your interest in SCIMORES Shares! Your Request No = R$transid. An email will be sent to your ID $email confirming your above request to this effect.";
	}	
	$confirmrequest = true;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Corporation!</title>
<link href="css/template_sci.css" rel="stylesheet" type="text/css"  />
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/default.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="company_backdrop">
<div id="template_main">
  <div id="navi_wrapper">
    <div id="navi_inner">
      <div id="logo">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="205" height="76">
          <param name="movie" value="flash/logo.swf" />
          <param name="quality" value="high" />
          <embed src="flash/logo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="205" height="76"></embed>
        </object>
      </div>
      <!-- CSS VERTICAL MENU START -->
      <div class="space"></div>
      <div id="navi_mnu">
        <ul id="nav" class="dropdown dropdown-vertical">
          <li class="cur_main_mnu"><a href="overview.php" target="_self" title="Company"><span class="let_big">C</span>ompany</a>
              <ul>
                <li><a href="overview.php"><span class="let_big">O</span>VERVIEW</a></li>
                 <li><a href="managemanent-pro.php"><span class="let_big">P</span>romoters</a></li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="space_bord_split"></div>
      <div id="navi_mnu">
        <ul id="nav" class="dropdown dropdown-vertical">
          <li ><a href="architect.php" target="_self"><span class="let_big">a</span>rchitectures</a>
              <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
              </ul>
          </li>
          <li><a href="recreat.php" target="_self"><span class="let_big">r</span>ecreation &amp; <span class="let_big">h</span>otels</a>
              <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
              </ul>
          </li>
          <li><a href="industry.php" target="_self"><span class="let_big">i</span>ndustry of <span class="let_big">f</span>ashion</a>
              <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
                <li><a href="goldlip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>G</big>OLD <span class="let_big">L</span>IP <span class="let_big">HFC</span></a></li>
               
              </ul>
          </li>
          <li ><a href="education.php" target="_self"><span class="let_big">e</span>ducational <span class="let_big">s</span>ector</a>
              <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
                <li><a href="intl-school.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>S</big>CIMORES <big>I</big>nternational <big>S</big>chool</a></li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="space_bord_split"></div>
      <div id="navi_mnu">
        <ul id="nav" class="dropdown dropdown-vertical">
          <li><a href="news.php" target="_self"><span class="let_big">N</span>ews &amp; <span class="let_big">a</span>nnouncements</a></li>
          <li><a href="contact.php" target="_self"><span class="let_big">c</span>ontact <span class="let_big">u</span>s</a></li>
        </ul>
      </div>
      <!-- CSS VERTICAL MENU END -->
    </div>
  </div>
  <div id="content_wrap">
    <div id="content-inner">
      <h2>Manage Shares</h2>
      <div class="m_err_msg"><?php if($confirmrequest) echo $statusmsg; else echo $errmsg; ?></div>
      <form name="frmmanageshareconfirm" action="manage-shares_confirm.php" method="post">
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
          <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">Transaction Type</td>
            <td width="146"><input name="txttranstype" type="text" value="<?php echo $transtype; ?>" disabled="disabled" class="input_1"/></td>
            <td width="110">Transaction Date</td>
            <td width="178"><input name="txttransdate" type="text" value="<?php echo date('Y-m-d'); ?>" class="input_1" disabled="disabled" /></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Investment Amount INR</td>
            <td><input name="txtinvest" type="text" value="<?php echo number_format($investment); ?>" disabled="disabled" class="input_1"/></td>
			<?php if($transtype == 'Sell') { ?>
            <td>Certificate Number</td>
            <td><input name="txtcertificateno" type="text" value="<?php echo 'C '.$certificateno; ?>" class="input_1" disabled="disabled"/></td>
			<?php } else { ?>
			<td>&nbsp;</td>
            <td>&nbsp;</td>
			<?php } ?>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Share Type</td>
            <td><input name="txtsharetype" type="text" class="input_1" value="<?php echo $sharetype; ?>" disabled="disabled"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Lock-In Date</td>
            <td><input name="txtwarrant" type="text" value="<?php echo $warrantdate; ?>" disabled="disabled" class="input_1"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td>Number of Shares</td>
            <td><input name="txtnumshare" type="text" value="<?php echo number_format($numshare); ?>" disabled="disabled" class="input_1"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" class="manag_space"></td>
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
            <td class="manag_tr3"><input name="priname" type="text" value="<?php echo $priname; ?>" disabled="disabled" class="input_3"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td class="manag_tr2">Name 2</td>
            <td class="manag_tr3"><input name="jointname" type="text" value="<?php echo $jointname; ?>" disabled="disabled" class="input_3"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td class="manag_tr2">Name 3</td>
            <td class="manag_tr3"><input name="benifit1" type="text" value="<?php echo $benifit1; ?>" disabled="disabled" class="input_3"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td class="manag_tr2">Name 4 </td>
            <td class="manag_tr3"><input name="benifit2" type="text" value="<?php echo $benifit2; ?>" disabled="disabled" class="input_3"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>		  
        </table>
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
		  <tr><td colspan="2">&nbsp;</td></tr>
		  <?php if(!($confirmrequest)) { ?>
          <tr>
            <td width="300">&nbsp;</td>
            <td width="300" align="right" style="padding-right:60px">
			<input name="confirmcancelhidden" type="hidden" value="<?php echo $confirmcancel; ?>">
			<input name="requestconfirm" type="image" src="images/confirm.png" alt="" value="CONFIRM" />&nbsp;<input name="requestcancel" type="image" src="images/cancel.png" alt="" value="CANCEL" />
			</td>
          </tr>
		  <?php } if($confirmrequest) { ?>
          <tr>
            <td colspan="2" align="right" style="padding-right:60px"><a href="my-port.php" class="yellow"><img src="images/portfolio.png" border="0"></a></td>
          </tr>
		  <?php } ?>
        </table>
      </form>
    </div>
  </div>
  <!-- important line-->
  <div class="clear-fix"></div>
</div>
<!-- template main end -->
<!--footer-->
<?php include("footer.php"); ?>
</div>
</body>
</html>