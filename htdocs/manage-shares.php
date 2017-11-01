<?php
require_once("config.php");
if(!isset($_SESSION['user'])){
header('Location: login.php'); exit;
}

//session_unregister('shareauthcode');

unset($_SESSION['shareauthcode']);
$userid=mysql_result(mysql_query("select sci_cust_id from $tb_user where sci_username='".$_SESSION['user']."'"),0);

//$tdate=date('Y-m-d');
//if($dateofpurchase != "")
//$dateofpurchase=date('Y-m-d', strtotime($dateofpurchase));
function checkAuthorizationCode($tb_transactions, $txtauthcode, $userid)
{
	$check_authcode_sql="select sci_auth_code from $tb_transactions where sci_approval_status='' and sci_cust_id='$userid'";
	$check_authcode_rs=mysql_query($check_authcode_sql) or die(mysql_error());
	while($check_authcode_arr = @mysql_fetch_array($check_authcode_rs))
	{
		$check_authcode_arr['sci_auth_code'];
		if($txtauthcode==$check_authcode_arr['sci_auth_code']) $authcodevalid = true;
	}
	return $authcodevalid;
}

function usedAuthorizationCode($tb_transactions, $txtauthcode, $userid)
{
	$used_authcode_sql="select sci_auth_code from $tb_transactions where sci_approval_status!='' and sci_cust_id='$userid'";
	$used_authcode_rs=mysql_query($used_authcode_sql) or die(mysql_error());
	while($used_authcode_arr = @mysql_fetch_array($used_authcode_rs))
	{
		$used_authcode_arr['sci_auth_code'];
		if($txtauthcode==$used_authcode_arr['sci_auth_code']) $authcodeused = true;
	}
	return $authcodeused;
}

function checkCertificateNumber($tb_transactions, $certificateno, $userid)
{
	$check_certificatenum_sql="select sci_certficateno from $tb_transactions where sci_certficateno='$certificateno' and sci_cust_id='$userid' and sci_approval_status = 'ISSUED' AND sci_certficateno NOT IN(select sci_certficateno from $tb_transactions where sci_cust_id='$userid' and sci_approval_status = 'SOLD')";
	$check_certificatenum_rs=mysql_query($check_certificatenum_sql);
	$certificatenum_count=mysql_num_rows($check_certificatenum_rs);
	
	if($certificatenum_count > 0) $certificatenumvalid = true;
	return $certificatenumvalid;
}

$sql="select sci_warrantdate,sci_currentvalue from $tb_ref";
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res))
{
	$warrantdate=$row['sci_warrantdate'];
	$currentvalue=$row['sci_currentvalue'];
}

if($_POST['txtauthcode'] != '')
{
	$authcodevalid = checkAuthorizationCode($tb_transactions, $txtauthcode, $userid);
	$authcodeused = usedAuthorizationCode($tb_transactions, $txtauthcode, $userid);
	if($authcodevalid)
	{
		$share_info_sql="select * from $tb_transactions where sci_auth_code='$txtauthcode' and sci_cust_id='$userid'";
		$share_info_rs=mysql_query($share_info_sql);
		$share_info_arr=mysql_fetch_assoc($share_info_rs);
		
		$transtype=$share_info_arr['sci_trans_type'];
		$investment=$share_info_arr['sci_investment'];
		$sharetype=$share_info_arr['sci_share_type'];
		$warrantdate=$share_info_arr['sci_warrantdate'];
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
		$disablemodification=true;
	}
	elseif($authcodeused){ $txtauthcode=''; $errmsg="The request for this authorization code has already been submitted and processed. Please verify your records.";}
	else{ $txtauthcode=''; $errmsg="Invalid Authorization code";}
}
elseif($_POST['certificateno'] != '')
{
	$certificatenumvalid = checkCertificateNumber($tb_transactions, $certificateno, $userid);
	if($certificatenumvalid)
	{
		$share_info_sql="select * from $tb_transactions where sci_certficateno=$certificateno";
		$share_info_rs=mysql_query($share_info_sql);
		$share_info_arr=mysql_fetch_assoc($share_info_rs);
		
		$transtype='Sell';
		$certificateno=$share_info_arr['sci_certficateno'];
		$dateofpurchase=$share_info_arr['sci_purchase_date'];
		$investment=$share_info_arr['sci_investment'];
		$sharetype=$share_info_arr['sci_share_type'];
		$numshare=$share_info_arr['sci_num_share'];
		$purchasevalue=number_format($investment / $numshare, 2);
		$sellingamount=$numshare * $currentvalue;
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
		$disablemodification=true;
	}
	else{ $errmsg="Invalid Certificate Number";}
}

$investment=str_replace(",", "", $investment);
if($transtype == '') $transtype = 'Purchase';
if($name1percent == "") $name1percent = 100;
if($benifit3 != "") $ben5 = 'Beneficiary';
if($transtype == 'Purchase' && $investment > 0) $numshare = floor($investment / 25.00);

if(trim($priname) == '')
{
	$disableshareholder2 = true; $disablename1percent = true;
}
if(trim($jointname) == "" || $jb1 == "" || $name2percent == 0)
	$disableshareholder3 = true;
if(trim($benifit1) == "" || $jb2 == "" || $name3percent == 0)
	$disableshareholder4 = true;
if(trim($benifit2) == "" || $jb3 == "" || $name4percent == 0)
	$disableshareholder5 = true;

$user_certificates_sql="select sci_certficateno from $tb_transactions where sci_cust_id='$userid' and sci_approval_status = 'ISSUED' AND sci_certficateno NOT IN(select sci_certficateno from $tb_transactions where sci_cust_id='$userid' and sci_approval_status = 'SOLD') order by sci_certficateno";
$user_certificates_rs=mysql_query($user_certificates_sql);

if(isset($requestcancel_x) || isset($requestauth_x) || isset($requestsubmit_x))
{
	if(trim($priname)==""){$flag=2;$errmsg="Please enter Share Holder(s)";}
	elseif($termscond!=1){$flag=2;$errmsg="Please check the box to accept the terms and conditions detailed in the company's MoA and AoA";}
	
	if($transtype=='Purchase')
	{
		$currentdate = date('Y-m-d');
		
		$check_request_sql="select * from $tb_transactions where sci_trans_type='Purchase' and sci_request_date='$currentdate' and sci_cust_id='$userid'";
		$check_request_rs=mysql_query($check_request_sql);
		$check_request_num=mysql_num_rows($check_request_rs);
		
		if(notnumeric($investment) || $investment==0){$flag=2;$errmsg="Please enter valid Investment Amount";}
		elseif($sharetype==''){$flag=2;$errmsg="Please select Share Type";}
		elseif($check_request_num > 0){$flag=2;$errmsg="Only one purchase request is permitted in a day. You will receive your Onetime Authorization Code(OAC) within 1/2 hour. In case you like to submit a fresh request, cancel your previous request on receiving the OAC.";}
	}
	elseif($transtype=='Sell')
	{
		if($certificateno==''){$flag=2;$errmsg="Please select Certificate Number";}
	}
	
	if(isset($requestcancel_x))
	{
		if($txtauthcode!='' && $authcodevalid)
		{
			$errmsg="CANCEL will delete your current request from the database. You will be required to submit a fresh request. Please confirm your choice again.";
			$confirmcancel = true;
			
			if($confirmcancelhidden == 1)
			{
				$delete_requests_sql="delete from $tb_transactions where sci_approval_status='' AND sci_auth_code='$txtauthcode' AND sci_cust_id='$userid'";
				mysql_query($delete_requests_sql);
				header('Location: my-port.php'); exit;
			}
		}
		else
		{
			header('Location: my-port.php'); exit;
		}
	}	
	elseif(isset($requestauth_x) && $flag!=2)
	{
		$authcode_prefix_arr = array('C4X', '2DB', 'M8A', 'V9N', 'ZS3', 'ERY');
		$authcode_prefix = $authcode_prefix_arr[rand(0, 5)];
		$authcode_suffix = rand(112,998);
		$authcode = $authcode_prefix.'V'.rand(112,998).'L'.$authcode_suffix;
		$requestdate = date('Y-m-d');
	
		if($transtype=='Purchase')
		{
			$trans_request_sql="insert into $tb_transactions
(sci_request_id, sci_cust_id, sci_trans_type, sci_request_date, sci_trans_date, sci_investment, sci_share_type, sci_num_share, sci_purchase_date, sci_approval_status, sci_auth_code, sci_certficateno, sci_pri_holder, sci_joint, sci_benifit1, sci_benifit2, sci_warrantdate) values('', '$userid', '$transtype', '$requestdate', '', '$investment', '$sharetype', '$numshare', '', '', '$authcode', '', '$priname', '$jointname', '$benifit1', '$benifit2', '$warrantdate')";
		}
		
		if($transtype=='Sell')
		{
			$trans_request_sql="insert into $tb_transactions
(sci_request_id, sci_cust_id, sci_trans_type, sci_request_date, sci_trans_date, sci_investment, sci_share_type, sci_selling_amount, sci_num_share, sci_purchase_date, sci_approval_status, sci_auth_code, sci_certficateno, sci_pri_holder, sci_joint, sci_benifit1, sci_benifit2, sci_warrantdate) values('', '$userid', '$transtype', '$requestdate', '', '$investment', '$sharetype', '$sellingamount', '$numshare', '$dateofpurchase', '', '$authcode', '$certificateno', '$priname', '$jointname', '$benifit1', '$benifit2', '$warrantdate')";
		}
		
		mysql_query($trans_request_sql) or die(mysql_error());
		$transid=mysql_result(mysql_query("select sci_request_id from $tb_transactions where sci_auth_code='$authcode' and sci_cust_id='$userid'"),0);
		
		$user_info_sql="select sci_fname,sci_lname,sci_email from $tb_user where sci_cust_id='$userid'";
		$user_info_rs=mysql_query($user_info_sql) or die(mysql_error());
		$user_info_arr=mysql_fetch_assoc($user_info_rs);
		$username=$user_info_arr['sci_fname']." ".$user_info_arr['sci_lname'];
		$useremail=$user_info_arr['sci_email'];
					
		$errmsg="The Authorization code is sent to your email address $useremail. Please copy/paste the code below, and press SUBMIT.";
	
		$subject="SCIMORES SHARES R".$transid;
		$to=$useremail;
		$from=getAdminEmailAddress($tb_admin);
		
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
			<table style=\"font-family:Tahoma; font-size:12px\" width=\"500\" align=\"center\">
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
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>Your authorization code for the above request is {$authcode}.<br><br>Thanking you,<br><br><br>Sincerely,<br>
	IR Management<br>
	Scimores Corporation Limited<br></td>
				  </tr>
			 </table>
			</body>
			</html>";

		sendHTMLemail($HTML,$from,$to,$subject);
	}
	elseif(isset($requestsubmit_x))
	{
		$authcodevalid = checkAuthorizationCode($tb_transactions, $txtauthcode, $userid);
		if($authcodevalid)
		{
			$_SESSION['shareauthcode']=$txtauthcode;
			header('location: manage-shares_confirm.php');
		}
		else{ $errmsg="Invalid Authorization code";}
	}
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
<script language="javascript" type="text/javascript" src="js/prototype/prototype.js"></script>
<script type="text/javascript" language="javascript">
function trans(value)
{
	if(value=='Purchase')
	{
		document.frmmanageshare.investment.disabled=false;
		document.frmmanageshare.certificateno.disabled="disabled";
		allNodes = $$(".active");
        for(i = 0; i < allNodes.length; i++) {
         allNodes[i].writeAttribute("class", "inactive");
        }
	}
	if(value=='Sell')
	{
		document.frmmanageshare.certificateno.disabled=false;
		document.frmmanageshare.investment.disabled="disabled";
		allNodes = $$(".inactive");
        for(i = 0; i < allNodes.length; i++) {
         allNodes[i].writeAttribute("class", "active");
        }
	}
}

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

function submitform()
{
  var authcode=window.document.frmmanageshare.txtauthcode.value
  if(authcode.length == 11)
  window.document.frmmanageshare.submit();
}

function sellsubmit()
{
  var certificateno=window.document.frmmanageshare.certificateno.value
  if(certificateno == '')
  window.location='manage-shares.php';
  else
  window.document.frmmanageshare.submit();
}
</script>
<style type="text/css">

#navi_inner1 {
	background: url(../images/navi_inner_bg.gif) center repeat;
	border:2px solid #323131;
	float: left;
	height: 575px;
	margin: 0;
	padding: 0;
	width: 205px;
	}
</style>
</head>
<body>
<div class="company_backdrop">
<div id="template_main">
  <div id="navi_wrapper">
    <div id="navi_inner1">
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
                <!-- heading -->
                <li><a href="fact-sheet.php"><span class="let_big">C</span>OMPANY <span class="let_big">P</span>ROFILE</a>
                    <ul>
                      <li><a href="fact-sheet.php"><span class="let_big">F</span>act <span class="let_big">S</span>heet</a></li>
                      <li><a href="organization-stru.php"><span class="let_big">O</span>rganization <span class="let_big">S</span>tructure</a></li>
                      <!--  <li><a href="managemanent-pro.php"><span class="let_big">P</span>romoters</a></li> -->
                      <li><a href="awards.php"><span class="let_big">A</span>wards &amp; <span class="let_big">R</span>ecognitions</a></li>
                    </ul>
                  <!-- heading -->
                </li>
                <li><a href="quarterly.php"><span class="let_big">R</span>ESULTS</a>
                    <ul>
                      <li><a href="quarterly.php"><span class="let_big">Q</span>uarterly</a></li>
                      <li><a href="annual.php"><span class="let_big">A</span>nnual</a></li>
                    </ul>
                </li>
                <!-- heading -->
                <li class="dir"><a href="share-price.php"><span class="let_big">S</span>HARES</a>
                    <ul>
                      <li><a href="share-price.php"><span class="let_big">S</span>hare <span class="let_big">P</span>rice</a></li>
                      <li><a href="shareholding-patt.php"><span class="let_big">S</span>hareholding <span class="let_big">P</span>attern</a></li>
                      <li><a href="analyst-cov.php"><span class="let_big">A</span>nalyst <span class="let_big">C</span>overage </a></li>
                      <li><a href="my-port.php"><span class="let_big">M</span>y <span class="let_big">P</span>ortfolio</a></li>
                    </ul>
                </li>
                <li><a href="board-direct.php"><span class="let_big">C</span>ORPORATE <span class="let_big">G</span>OVERNANCE</a>
                    <ul>
                      <li><a href="board-direct.php"><span class="let_big">B</span>oard <span class="let_big">o</span>f <span class="let_big">D</span>irectors</a></li>
                      <li><a href="memorandum-asso.php"><span class="let_big">M</span>emorandum <span class="let_big">o</span>f <span class="let_big">A</span>ssociation </a></li>
                      <li><a href="article-asso.php"><span class="let_big">A</span>rticles <span class="let_big">o</span>f <span class="let_big">A</span>ssociation</a></li>
                    </ul>
                </li>
                <li><a href="conferences-event.php"><span class="let_big">C</span>ONFERENCES &amp; <span class="let_big">E</span>VENTS</a></li>
                <li><a href="investor-supp.php"><span class="let_big">I</span>NVESTOR <span class="let_big">S</span>UPPORT</a></li>
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
                <li><a href="alba.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>A</big>lba<big>.T.K.</big> </a></li>
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
    <div id="content-inner-2">
      <h2>Manage Shares</h2>
      <div class="m_err_msg"><?php echo $errmsg; ?></div>
      <form name="frmmanageshare" action="manage-shares.php" method="post" autocomplete="off">
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
          <tr>
            <td class="manag_space" colspan="4"></td>
          </tr>
          <tr>
            <td width="136">Purchase / Sell</td>
            <td width="146">
			<select name="transtype" size="1" class="list_1" onchange="trans(this.value)" <?php if($disablemodification) echo 'disabled'; ?>>
                <option value="Purchase" <?php if($transtype == 'Purchase') echo 'selected'; ?>>Purchase</option>
                <option value="Sell" <?php if($transtype == 'Sell') echo 'selected'; ?>>Sell</option>
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
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
          <tr>
            <td>Investment Amount INR</td>
            <td><input name="investment" type="text" class="input_1" maxlength="10" value="<?php if($investment > 0) echo number_format($investment); ?>" onblur="invest(this.value)" onkeyup="processInvest(this.value);" <?php if($disablemodification) echo 'disabled'; ?>/></td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>">Date of Purchase</td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>"><input name="dateofpurchase" type="text" class="input_1" value="<?php echo $dateofpurchase;?>" disabled/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
          <tr>
            <td>Share Type </td>
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
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
          <tr>
            <td>Issue Open Till * </td>
            <td><input name="warrantdate" type="text" class="input_1" value="<?php echo $warrantdate; ?>" disabled="disabled"/></td>
            <td>Current Value INR</td>
            <td><input name="currentvalue" type="text" class="input_1" value="<?php echo $currentvalue; ?>" disabled="disabled"/></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
          <tr>
            <td>Number of Shares</td>
            <td><input name="numshare" type="text" class="input_1" value="<?php if($investment > 0) echo number_format($numshare); ?>" disabled="disabled"/></td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>">Selling Amount INR</td>
            <td class="<?php if($transtype == 'Purchase') echo 'inactive'; ?>"><input name="sellingamount" type="text" class="input_1" value="<?php if($sellingamount > 0) echo number_format($sellingamount); ?>" disabled="disabled"/></td>
          </tr>
		  <tr>
            <td class="manag_space" colspan="4"></td>
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
		  <tr>
            <td class="manag_medium_space" colspan="4"></td>
          </tr>
		  
          <tr>
            <td colspan="4"><input name="termscond" type="checkbox" value="1" <?php if($authcodevalid) echo 'checked disabled'; ?> />&nbsp;I accept to the terms and conditions detailed in the company’s <a href="viewpdf.php?doc=MOA" target="_blank" class="yellow">MoA</a> and <a href="viewpdf.php?doc=AOA" target="_blank" class="yellow">AoA</a> available herein</td>
          </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" class="manag_tbl">
		  <tr>
            <td class="manag_space" colspan="3"></td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="3"></td>
          </tr>
          <tr>
            <td colspan="3">Enter Authorization Code </td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="3"><input name="confirmcancelhidden" type="hidden" value="<?php echo $confirmcancel; ?>"></td>
          </tr>
          <tr>
            <td width="120"><input name="txtauthcode" type="text" class="input_1" value="<?php echo $txtauthcode; ?>" maxlength="11" onkeyup="submitform();"/></td>
            <td width="176"><input name="requestauth" type="image" src="images/request.png" style="margin-left:8px" alt="" value="REQUEST AUTHORIZATION" <?php if($authcodevalid) echo 'disabled class="nofill"'; ?>/></td>
            <td width="304" style="padding-right:60px" align="right">
			<input name="requestcancel" type="image" src="images/cancel.png" alt="" value="CANCEL" />
			<input name="requestsubmit" type="image" src="images/submit.png" alt="" value="SUBMIT" <?php if(!($authcodevalid)) echo 'disabled class="nofill"'; ?>/>
              </td>
          </tr>
		  <tr>
            <td class="manag_medium_space" colspan="3"></td>
          </tr>
          <tr>
		  	<td colspan="3" style="padding-right:60px">*<br />
Purchase price will be fixed to face value of INR 25 a share during the issue open period.</td>
		  </tr>
		  <tr>
            <td class="manag_medium_space" colspan="3"></td>
          </tr>
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