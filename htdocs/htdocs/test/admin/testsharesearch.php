<?php
require_once("../config.php");
//if(!isset($_SESSION['sciadmin'])){
	//header('Location: login.php'); exit;
//}

if(count($_POST['transid']) == 1 && $_POST['action'] == 'EDIT')
{
	$transid = implode(", ", $_POST['transid']);
	$share_info_sql="select * from $tb_transactions where sci_request_id='$transid'";
	$share_info_rs=mysql_query($share_info_sql);	
	$share_info_arr=mysql_fetch_assoc($share_info_rs);
	
	$transtype=$share_info_arr['sci_trans_type'];
	if($transtype=='Purchase')
	{	
		header('Location: editshare.php?transid='.$transid); exit;
	}
	else
	{
		$statusmsg="Only Purchase requests can be modified";
	}
}
elseif(count($_POST['transid']) > 1 && $_POST['action'] == 'EDIT')
{
	$statusmsg="Please select only one Purchase request to edit";
}

if(count($_POST['transid']) > 0 && $_POST['action'] != 'EDIT')
{
	foreach($_POST['transid'] as $transid)
	{
		$userid=mysql_result(mysql_query("select sci_cust_id from $tb_transactions where sci_request_id='$transid'"),0);
		
		$user_info_sql="select * from $tb_user where sci_cust_id='$userid'";
		$user_info_rs=mysql_query($user_info_sql) or die(mysql_error());
		$user_info_arr=mysql_fetch_assoc($user_info_rs);
		$username=$user_info_arr['sci_fname']." ".$user_info_arr['sci_lname'];
		$useremail=$user_info_arr['sci_email'];
		
		$country_arr = getCountryInfo($tb_countries, $user_info_arr['sci_country']);
		$country_name = $country_arr['Country'];
		$state_arr = getStateInfo($tb_states, $user_info_arr['sci_state']);
		$state_name = $state_arr['Region'];
		$city_arr = getCityInfo($tb_cities, $user_info_arr['sci_city']);
		$city_name = $city_arr['City'];
		
		$useraddress=$user_info_arr['sci_address']."&nbsp;".$user_info_arr['sci_address2']."<br>".$city_name.", ".$state_name.", ".$country_name.". Postal Code: ".$user_info_arr['sci_zip'];
		
		$share_info_sql="select * from $tb_transactions where sci_request_id='$transid'";
		$share_info_rs=mysql_query($share_info_sql);	
		$share_info_arr=mysql_fetch_assoc($share_info_rs);
		
		$transtype=$share_info_arr['sci_trans_type'];
		$certificateno=$share_info_arr['sci_certficateno'];
		$transdate=$share_info_arr['sci_trans_date'];
		$application=$share_info_arr['sci_application'];
        $allotment=$share_info_arr['sci_allotment'];
        $fstcall=$share_info_arr['sci_1stcall'];
        $sndcall=$share_info_arr['sci_2ndcall'];
        $thrdcall=$share_info_arr['sci_3rdcall'];
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
	
		$subject="SCIMORES SHARES R".$transid;
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
					  
		$paymentinfo="<tr>
						<td colspan=\"2\" style=\"font-family:Tahoma; font-size:12px; font-weight:bold\"><br>PAYMENT PROCEDURE:</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>
					  <tr>
						<td colspan=\"2\" style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" align=\"center\">ELECTRONIC FUND TRANSFER</td>
					  </tr>
					  <tr>
						<td colspan=2 height=10></td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" width=\"160\">Beneficiary Name</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"330\">: SCIMORES Corporation (India) Limited</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\">Beneficiary Account No.</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">: 0275779447</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\">Beneficiary Bank</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">: Citibank, N.A.</td>
					  </tr>
					  <tr>
						<td valign=\"top\" style=\"font-family:Tahoma; font-size:12px; font-weight:bold\">Beneficiary Bank Address</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">: 50 C.P.Ramaswamy Road, Abhiramapuram, Alwarpet,<br>&nbsp;&nbsp;Chennai-600018, India</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br>You could transfer your investment Amount in your local currency if they are in INR, USD, GBP, EURO or SD.</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br>For transfers from outside of India, your remitting bank may ask for the Beneficiary Bank and your local Beneficiary Correspondence Bank Swift Codes by currency and also the Nostro Account Nbr. Please refer to the below table for corresponding codes.</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br>Note: You can transfer your investment amount in your local currency without having to convert to
INR if they are in USD, GBP, EURO or SD.</td>
					  </tr>
					  <tr>
					  	<td colspan=2>
					  		<table width=\"500\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"color:#0000FF\">
							  <tr>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" width=\"92\">LOCATION</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" width=\"117\">CURRENCY</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" width=\"89\">ACCOUNT NO</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" width=\"92\">SWIFT CODE</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:bold\" width=\"92\">SWIFT CODE (INDIA)</td>
							  </tr>
							  <tr>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">New York</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">US Dollar</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">36241797</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIUS33</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIINBX</td>
							  </tr>
							  <tr>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">London</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Pound Sterling</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">600091</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIGB2L</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIINBX</td>
							  </tr>
							  <tr>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">London</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Euro</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">5501024</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIGB2L</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIINBX</td>
							  </tr>
							  <tr>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Singapore</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Singapore Dollars</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">700385019</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITISGSG</td>
								<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">CITIINBX</td>
							  </tr>
							</table>
						</td>
					  </tr>";
		
		$_POST['action'] = strtolower($_POST['action']);
		if($_POST['action'] == 'delete')
		{
			$delete_requests_sql="delete from $tb_transactions where sci_request_id='$transid'";
			mysql_query($delete_requests_sql);
			$actionstatus='deleted';
		}
		
		if($_POST['action'] == 'approve')
		{
			$update_share_sql="update $tb_transactions set sci_approval_status='APPROVED' where sci_request_id='$transid'";
			mysql_query($update_share_sql);
			
			if($transtype == 'Sell')
			$approvemessage = "We have received your above request. Kindly complete the attached form, and courier it along with the above related Share Certificate to one of the following addresses. We will process your request as soon as we receive them.<br><br>India:<br>SCIMORES Corporation (India) Limited<br>20/21 Conran Smith Road, B7<br>Gopalapuram, Chennai-600086<br>Tel : +91-950006705 (HemanthKumar Balasundaram)<br><br>USA:<br>SCIMORES Corporation Limited<br>410 Kings Court, Woodbridge, NJ-07095<br>Tel : +1-(848)260-7086 (Sivakumar Balasundaram)<br>Email: ir@scimores.com";
			elseif($transtype == 'Purchase')
			$approvemessage = "Your above request is approved. Thank you for your interest in SCIMORES Shares. We will email you your share details following their allotment.";
			
			$subject.=' APPROVED';
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
				$requestfile = "../pdf82e3c4A/".$requestfilename;
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
			$actionstatus='approved';
		}
		
		if($_POST['action'] == 'decline')
		{
			$update_share_sql="update $tb_transactions set sci_approval_status='DECLINED' where sci_request_id='$transid'";
			mysql_query($update_share_sql);
			
			$subject.=' DECLINED';
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
			$actionstatus='declined';
		}
		
		if($_POST['action'] == 'allot')
		{
			$update_share_sql="update $tb_transactions set sci_approval_status='ALLOTED' where sci_request_id='$transid'";
			mysql_query($update_share_sql);
			
			$subject.=' ALLOTTED';
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br>The following shares have been allotted towards your above request. Kindly remit your payment for issuing your share certificate.<br><br></td>
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>---------------------------------------------------------------------</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Total Payment Amount</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= INR ".number_format($investment)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>---------------------------------------------------------------------</td>
					  </tr>
					  
					  $paymentinfo
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>Thanking you,<br><br><br>Sincerely,<br>
				IR Management<br>
				Scimores Corporation Limited<br></td>
					  </tr>
				 </table>
				</body>

				</html>";
			sendHTMLemail($HTML,$from,$useremail,$subject);
			$actionstatus='allotted';
		}
		
		if($_POST['action'] == 'issue')
		{
			$certificates_sql="select sci_certficateno from $tb_transactions where sci_certficateno > 0 and sci_trans_type='Purchase'";
			$certificates_rs=mysql_query($certificates_sql);
			$certificates_count=mysql_num_rows($certificates_rs);
			$newcertificate_num=$certificates_count + 1;
			$purchase_date=date('Y-m-d');
		
			$update_share_sql="update $tb_transactions set sci_purchase_date='$purchase_date', sci_certficateno='$newcertificate_num', sci_approval_status='ISSUED' where sci_request_id='$transid' and sci_certficateno=0";
			mysql_query($update_share_sql);			
			$certificateno=mysql_result(mysql_query("select sci_certficateno from $tb_transactions where sci_request_id='$transid'"),0);
			
			$subject.=' ISSUED';
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br>Issuing your Share Certificate towards the above request:<br></td>
					  </tr>
					  
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Certificate Number</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= C$certificateno</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Number of Shares</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= ".number_format($numshare)."</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Purchasing Price</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= INR $purchasevalue</td>
					  </tr>
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Investment Amount</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">= INR ".number_format($investment)."</td>
					  </tr>
					 
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>We have couriered your Share Certificate to your following address. Kindly contact us at ir@scimores.com in case you do not receive your package within 5 business days from today.<br><br></td>
					  </tr>
					  
					  <tr>
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Name :</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$username</td>
					  </tr>
					  <tr>
						<td valign=\"top\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Address :</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$useraddress</td>
					  </tr>
					  <tr>
						<td valign=\"top\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" colspan=2>					<br><br>Thanking you,<br><br><br>Sincerely,<br>
				IR Management<br>
				Scimores Corporation Limited<br></td>
					  </tr>
				 </table>
				</body>
				</html>";
			sendHTMLemail($HTML,$from,$useremail,$subject);
			//$statusmsg="Shares for Selected transaction are issued";
			$actionstatus='issued';
		}
		
		if($_POST['action'] == 'received')
		{
			$update_share_sql="update $tb_transactions set sci_approval_status='RECEIVED' where sci_request_id='$transid'";
			mysql_query($update_share_sql);
			
			$subject.=' RECEIVED';
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>We have received your above related Share Certificate. We will encash you your shares ASAP.<br><br>Kindly contact us at ir@scimores.com in case you do not receive our confirmation on the above within 30 days from today.<br><br>Thanking you,<br><br><br>Sincerely,<br>
				IR Management<br>
				Scimores Corporation Limited<br></td>
					  </tr>
				 </table>
				</body>
				</html>";
			sendHTMLemail($HTML,$from,$useremail,$subject);
			$actionstatus='received';
		}
		
		if($_POST['action'] == 'sold')
		{
			$sold_date=date('Y-m-d');
			$update_share_sql="update $tb_transactions set sci_sold_date='$sold_date', sci_approval_status='SOLD' where sci_request_id='$transid'";
			mysql_query($update_share_sql);
			
			$soldcertificate_num=mysql_result(mysql_query("SELECT sci_certficateno from $tb_transactions where sci_request_id='$transid'"),0);
			
			$delete_othersellrequests_sql="delete from $tb_transactions where sci_certficateno='$soldcertificate_num' AND sci_request_id<>'$transid' AND sci_trans_type='Sell'";
			mysql_query($delete_othersellrequests_sql);
			
			$subject.=' SOLD';
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal; text-align:justify\" colspan=2><br><br>We have dispatched your credit towards the above in the amount equivalent to INR = ".number_format($sellingamount).".<br><br>Kindly contact us at ir@scimores.com in case you do not receive within 5 business days from today.<br><br>Thanking you,<br><br><br>Sincerely,<br>
				IR Management<br>
				Scimores Corporation Limited<br></td>
					  </tr>
				 </table>
				</body>
				</html>";
			sendHTMLemail($HTML,$from,$useremail,$subject);
			$actionstatus='sold';
		}
	}
	$statusmsg="Selected transaction(s) is/are ".$actionstatus;
}

//echo $searchresulturl;
$prname=trim($prname);

$shares_sql = "SELECT * from $tb_transactions where sci_request_id > 0";

if($investmin!="" && $investmax!="")
{
	$shares_sql .= " AND sci_investment BETWEEN '$investmin' AND '$investmax'";
}
elseif($investmin!="")
{
	$shares_sql .= " AND sci_investment >= '$investmin'";
}	
elseif($investmax!="")
{
	$shares_sql .= " AND sci_investment <= '$investmax'";
}

if($sharesmin!="" && $sharesmax!="")
{
	$shares_sql .= " AND sci_num_share BETWEEN '$sharesmin' AND '$sharesmax'";
}
elseif($sharesmin!="")
{
	$shares_sql .= " AND sci_num_share >= '$sharesmin'";
}	
elseif($sharesmax!="")
{
	$shares_sql .= " AND sci_num_share <= '$sharesmax'";
}

if($pdatefrom!="" && $pdateto!="")
{
	$shares_sql .= " AND sci_purchase_date BETWEEN '$pdatefrom' AND '$pdateto'";
}
elseif($pdatefrom!="")
{
	$shares_sql .= " AND sci_purchase_date >= '$pdatefrom'";
}	
elseif($pdateto!="")
{
	$shares_sql .= " AND sci_purchase_date <= '$pdateto'";
}

if($prname!="")
{
	$shares_sql .= " AND sci_pri_holder = '$prname'";
}	
if($suserid!="")
{
	$shares_sql .= " AND sci_cust_id = '$suserid'";
}
if($stranstype!="")
{
	$shares_sql .= " AND sci_trans_type = '$stranstype'";
}
if($status!="")
{
	if($status=="PENDING") $status = '';
	$shares_sql .= " AND sci_approval_status = '$status'";
}
//echo $shares_sql;
$shares_rs = mysql_query($shares_sql);
$shares_num = mysql_num_rows($shares_rs);
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
	var transidlength=document.sharesearchres.elements['transid[]'].length;
	for(var k=0; k<transidlength; k++)
    {
		if(document.sharesearchres.checkordecheckall.checked==true)
		{
			document.sharesearchres.elements['transid[]'][k].checked=true;
		}
		if(document.sharesearchres.checkordecheckall.checked==false)
		{
			document.sharesearchres.elements['transid[]'][k].checked=false;
		}
    }
}
</script>
</head>
<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
	<form name="sharesearchres" id="sharesearchres" method="post">
    <table cellpadding="3" cellspacing="0" class="port_tbl">
        <tr>
          <td colspan="11">&nbsp;</td>
          <td colspan="3" align="center">
		  <div id="port_manage_butt"><a href="sharesearch.php" target="_self">BACK TO SEARCH</a></div></td>
        </tr>
		<tr><td colspan="14"><div class="err_msg"><?php echo $statusmsg; ?></div></td></tr>
		<?php if($shares_num > 0) { ?>
		<tr>
		  <td colspan="4" align="left">
		  <input type="submit" name="action" value="EDIT" class="formbutton" />
		  <input type="submit" name="action" value="DELETE" class="formbutton" onclick="return confirm('Are you sure want to delete the request(s)?');" /></td>
		  <td colspan="10" align="right">
			<?php if($status == 'SUBMITTED' || $status == '') { ?>
			<input type="submit" name="action" value="APPROVE" class="formbutton" />
			<input type="submit" name="action" value="DECLINE" class="formbutton" />
			<?php } if(($status == 'APPROVED' && $stranstype == 'Purchase') || $status == '') { ?>
			<input type="submit" name="action" value="ALLOT" class="formbutton" />
			<?php } if(($status == 'APPROVED' && $stranstype == 'Sell') || $status == '') { ?>
			<input type="submit" name="action" value="RECEIVED" class="formbutton" />
			<?php } if($status == 'APPROVED' && $stranstype == '') { ?>
			<input type="submit" name="action" value="ALLOT" class="formbutton" />
			<input type="submit" name="action" value="RECEIVED" class="formbutton" />
			<?php } if($status == 'ALLOTED' || $status == '') { ?>
			<input type="submit" name="action" value="ISSUE" class="formbutton" />
			<?php } if($status == 'RECEIVED' || $status == '') { ?>
			<input type="submit" name="action" value="SOLD" class="formbutton" />
			<?php } ?>		  </td>
		</tr>
        <tr>
		  <td><input name="checkordecheckall" type="checkbox" value="1" onclick="makecheckordecheckall();"></td>
          <td>Request ID</td>
		  <td>Member ID</td>
		  <td>Certificate Number</td>
          <td>Transaction Type</td>
          <td>Transaction Date</td>
		  <td>Purchase Date</td>
		  <td>Sold Date</td>
		  <td>Application</td>
		  <td>Allotment</td>
		  <td>1st call</td>
		  <td>2nd call</td>
		  <td>3rd call</td>
		  <td>Investment Amount</td>
		  <td>No of Shares</td>
          <td>Selling Amount</td>
          <td>Authorization Code</td>
          <td>Primary Name</td>
		  <td>Status</td>
        </tr>
		<?php } else { ?>
		<tr><td colspan="14"><div id="errmsg" class="err_msg">No records found matching the Search Criteria.</div></td></tr>
        <?php } while($shares_arr=mysql_fetch_array($shares_rs)){ $i++; ?>
        <tr>
		  <td class="port_content" align="center"><input name="transid[]" type="checkbox" value="<?php echo $shares_arr['sci_request_id']; ?>"></td>
          <td class="port_content" align="center"><?php echo 'R'.$shares_arr['sci_request_id']; ?></td>
		  <td class="port_content" align="center"><?php echo 'M'.$shares_arr['sci_cust_id']; ?></td>
		  <td class="port_content" align="center"><?php if($shares_arr['sci_certficateno'] > 0) echo 'C'.$shares_arr['sci_certficateno']; ?></td>
          <td class="port_content" align="left"><?php echo $shares_arr['sci_trans_type']; ?></td>
          <td class="port_content" align="center"><?php echo $shares_arr['sci_trans_date']; ?></td>
		  <td class="port_content" align="center"><?php echo $shares_arr['sci_purchase_date']; ?></td>
		  <td class="port_content" align="center"><?php echo $shares_arr['sci_sold_date']; ?></td>
		   <td class="port_content" align="center"><?php echo $shares_arr['sci_application']; ?></td>
		    <td class="port_content" align="center"><?php echo $shares_arr['sci_allotment']; ?></td>
		    <td class="port_content" align="center"><?php echo $shares_arr['sci_1stcall']; ?></td>
			 <td class="port_content" align="center"><?php echo $shares_arr['sci_2ndcall']; ?></td>
			  <td class="port_content" align="center"><?php echo $shares_arr['sci_3rdcall']; ?></td>
          <td class="port_content" align="right"><?php echo number_format($shares_arr['sci_investment']); ?></td>
          <td class="port_content" align="right"><?php echo number_format($shares_arr['sci_num_share']); ?></td>
          <td class="port_content" align="right"><?php echo number_format($shares_arr['sci_selling_amount']); ?></td>
          <td class="port_content" align="left"><?php echo $shares_arr['sci_auth_code']; ?></td>
          <td class="port_content" align="left"><?php echo $shares_arr['sci_pri_holder']; ?></td>
		  <td class="port_content" align="left"><?php if($shares_arr['sci_approval_status'] == '') echo 'PENDING'; else echo $shares_arr['sci_approval_status']; ?></td>
        </tr>
        <?php } ?>
    </table>
	</form>
	<div class="clearfix"></div>
</div>
</body>
</html>