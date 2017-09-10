<?php
require_once("config.php");

if(isset($purchaseregapproval))
{
	$userid=mysql_result(mysql_query("select sci_cust_id from $tb_transactions where sci_request_id='$transid'"),0);
	
	$sql="update $tb_transactions set sci_approval_status='$purchaseregapproval' where sci_request_id='$transid'";
	mysql_query($sql);
	
	$user_info_sql="select sci_fname,sci_lname,sci_email from $tb_user where sci_cust_id='$userid'";
	$user_info_rs=mysql_query($user_info_sql) or die(mysql_error());
	$user_info_arr=mysql_fetch_assoc($user_info_rs);
	$username=$user_info_arr['sci_fname']." ".$user_info_arr['sci_lname'];
	$useremail=$user_info_arr['sci_email'];
	
	$share_info_sql="select * from $tb_transactions where sci_request_id='$transid'";
	$share_info_rs=mysql_query($share_info_sql);	
	$share_info_arr=mysql_fetch_assoc($share_info_rs);
	
	$transtype=$share_info_arr['sci_trans_type'];
	$certificateno=$share_info_arr['sci_certficateno'];
	$transdate=$share_info_arr['sci_trans_date'];
	$investment=$share_info_arr['sci_investment'];
	$sellingamount=$share_info_arr['sci_selling_amount'];
	$sharetype=$share_info_arr['sci_share_type'];
	$warrantdate=$share_info_arr['sci_warrantdate'];
	$numshare=$share_info_arr['sci_num_share'];
	$purchasevalue=number_format($investment / $numshare, 2);
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
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Transaction Date </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$transdate</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Investment Amount </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">INR ".number_format($investment)."</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Share Type * </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$sharetype</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Lock-In Date </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$warrantdate</td>
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
					<td colspan=2 height=10></td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>*<br>Shares sold within the Lock-In Date will be settled at the same price purchased along with 70% of the FD interest any earned over it minus the taxes - as a hedge measure for both investors and the company. The purchase price is currently fixed at INR 25.00 per share.</td>
				  </tr>";
	
	$subject="SCIMORES SHARES R".$transid." ".$purchaseregapproval;
	$from=getAdminEmailAddress($tb_admin);
  	if($purchaseregapproval=='APPROVED')
	{
		if($transtype == 'Sell')
		$approvemessage = "We have received your above request. Kindly complete the attached form, and courier it along with the above related Share Certificate to one of the following addresses. We will process your request as soon as we receive them.<br><br>India:<br>SCIMORES Corporation (India) Limited<br>20/21 Conran Smith Road, B7<br>Gopalapuram, Chennai-600086<br>Tel : +91-950006705 (HemanthKumar Balasundaram)<br><br>USA:<br>SCIMORES Corporation Limited<br>410 Kings Court, Woodbridge, NJ-07095<br>Tel : +1-(848)260-7086 (Sivakumar Balasundaram)<br>Email: ir@scimores.com";
		elseif($transtype == 'Purchase')
		$approvemessage = "Your above request is approved. Thank you for your interest in SCIMORES Shares. We will email you your share details following their allotment.";
		
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
							<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>$approvemessage<br><br>Thanking you,<br><br><br>Sincerely,<br>
			IR Management<br>
			Scimores Corporation Limited<br></td>
						  </tr>
					 </table>
					</body>
					</html>";
					
		if($transtype == 'Sell')
		{
			$requestfilename = "sellRequestForm.pdf";
			$requestfile = "pdf82e3c4A/".$requestfilename;
			$rand = md5(uniqid(time()));
			
			$file_size = filesize($requestfile);
			$handle = fopen($requestfile, "r");
			$filecontent = fread($handle, $file_size);
			fclose($handle);
			$filecontent = chunk_split(base64_encode($filecontent));
			
			$mailheaders = "From: $from\r\n";
			$mailheaders .= "MIME-Version: 1.0\r\n";
			$mailheaders .= "Content-Type: multipart/mixed; boundary=$rand\r\n";
			$mailheaders .= "--".$rand."\r\n";
			$mailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$mailheaders .= "$HTML\r\n";
			$mailheaders .= "--".$rand."\r\n";
			$mailheaders .= "Content-Type: application/pdf; name=$requestfilename\r\n";
			$mailheaders .= "Content-Transfer-Encoding: base64\r\n";
			$mailheaders .= "Content-Disposition: attachment; filename=$requestfilename\r\n";
			$mailheaders .= "$filecontent\r\n";
			$mailheaders .= "--".$rand."--";
			mail($useremail, $subject, "", $mailheaders);
		}
		elseif($transtype == 'Purchase')
		{
			sendHTMLemail($HTML,$from,$useremail,$subject);
		}
		$actionstatus="transactionapproved";
	}
	elseif($purchaseregapproval=='DECLINED')
	{
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
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>Thank you for your interest in SCIMORES Shares. We regret that we are unable to serve your request at this time. However, we have retained your request in our system. One of our Investor Relations Manager will contact you during our next offering.<br><br>Thanking you,<br><br><br>Sincerely,<br>
			IR Management<br>
			Scimores Corporation Limited<br></td>
				  </tr>
			 </table>
			</body>
			</html>";
		sendHTMLemail($HTML,$from,$useremail,$subject);
		$actionstatus="transactiondeclined";
	}
}
elseif(isset($regapproval))
{
	$sql="update $tb_user set sci_status='$regapproval' where sci_cust_id='$userid'";
	mysql_query($sql);
	
	$sql="select sci_actcode,sci_fname,sci_lname,sci_email from $tb_user where sci_cust_id='$userid'";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	
	$username=$row['sci_fname']." ".$row['sci_lname'];
	$actcode=$row['sci_actcode'];
	$actlink=$base_url."/useractivation.php?code=".$actcode;
	$to=$row['sci_email'];
	$subject="SCIMORES MEMBERSHIP";
	$from=getAdminEmailAddress($tb_admin);
	
	if($regapproval=='APPROVED')
	{
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
		$actionstatus="userapproved";
	}
	elseif($regapproval=='DECLINED')
	{
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
		$actionstatus="userdeclined";
	}
}
echo $actionstatus;
?>