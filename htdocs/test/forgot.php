<?php
require_once("config.php");
if(isset($_SESSION['user'])){
header('Location: my-port.php');
}

if(isset($_REQUEST['submit_x']))
{
	$txtemail=trim($txtemail);
	if($txtemail=="")
	{
		$error = true;
		$err_msg="Please enter email address";
	}
	elseif(isnotValidEmail($txtemail))
	{
		$error = true;
		$err_msg="Not a valid email address. Please verify";
	}
	else
	{
		$sql="select sci_username,sci_password,sci_fname,sci_lname from $tb_user where sci_email='$txtemail'";
		$res=mysql_query($sql);
		$user_exists=mysql_num_rows($res);
	
		if($user_exists > 0)
		{
			$flag=1;
			while($row=mysql_fetch_array($res))
			{
				$uname=$row['sci_username'];
				$username=$row['sci_fname']." ".$row['sci_lname'];
			}
			
			$passwdtemp_prefix_arr = array('yM', 'Kb', 'Ze', '2R', 'Tc');
			$passwdtemp_prefix = rand(12,98).$passwdtemp_prefix_arr[rand(0, 4)];
			$passwdtemp_middle = rand(12,98);
			$passwdtemp_suffix_arr = array('A3', 'S6', 'Ge', 'b8', '7H');
			$passwdtemp_suffix = $passwdtemp_suffix_arr[rand(0, 4)];
			$passwdtemp = $passwdtemp_prefix.$passwdtemp_middle.$passwdtemp_suffix;
		
			$subject="SCIMORES MEMBERSHIP USERNAME PASSWORD";
			$from=getAdminEmailAddress($tb_admin);
			$to=$txtemail;
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
						<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Dear $username,<br><br>Please find below your Login Details:<br><br>USERNAME: $uname<br>PASSWORD: $passwdtemp<br><br>Thanking you,<br><br><br>Sincerely,<br>
						IR Management<br>
						Scimores Corporation Limited<br>
						</td>
					</tr>
				</table>
				</body>
				</html>";
			sendHTMLemail($HTML,$from,$to,$subject);
			
			$passwdtemp=md5($passwdtemp);
			$update_password_sql="update $tb_user set sci_password='$passwdtemp' where sci_email='$txtemail'";
			mysql_query($update_password_sql) or die(mysql_error());
		}
		else
		{
			$error = true;
			$err_msg = "No User exists with the specified email address. Please verify.";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SCIMORES Corporation</title>
<link href="css/template_sci.css" rel="stylesheet" type="text/css"  />
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/default.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="register_backdrop">
<div id="template_main">
  <div id="navi_wrapper">
    <div id="navi_inner">
      <div id="logo">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="205" height="76">
          <param name="movie" value="flash/logo.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="transparent" />
          <embed src="flash/logo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="205" height="76" wmode="transparent"></embed>
        </object>
      </div>
      <!-- CSS VERTICAL MENU START -->
      <div class="space"></div>
      <div id="navi_mnu">
        <ul id="nav" class="dropdown dropdown-vertical">
          <li ><a href="overview.php" target="_self" title="Company"><span class="let_big">C</span>ompany</a>
              <ul>
                <li><a href="overview.php"><span class="let_big">O</span>VERVIEW</a></li>
                <!-- heading -->
                <li><a href="fact-sheet.php"><span class="let_big">C</span>OMPANY <span class="let_big">P</span>ROFILE</a>
                    <ul>
                      <li><a href="fact-sheet.php"><span class="let_big">F</span>act <span class="let_big">S</span>heet</a></li>
                      <li><a href="organization-stru.php"><span class="let_big">O</span>rganization <span class="let_big">S</span>tructure</a></li>
                      <li><a href="managemanent-pro.php"><span class="let_big">M</span>anagement <span class="let_big">P</span>rofiles</a></li>
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
          <li><a href="architect.php" target="_self"><span class="let_big">a</span>rchitectures</a>
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
    <div id="content-inner">
		<h2>Members login</h2>
		<form name="frmforgot" action="forgot.php" method="post">
		<table border="0" cellspacing="0" cellpadding="0" class="forgot_tbl_wrapper">
		<?php if($error==1){?>
		<tr>
			<td class="err_msg_forgot"><?php echo $err_msg; ?></td>
		</tr>
		<?php } ?>
		<?php if($flag==1){?>
		<tr>
			<td class="err_msg_forgot">Username and a temporary password has been sent to your email account. You can change the password in MY PORTFOLIO/ACCOUNT INFO. Please <a href="login.php">click here</a> to go back to the Login page.</td>
		</tr>
		<?php } ?>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
			<table border="0" cellspacing="0" cellpadding="2" class="forgot_tbl">
			  <tr>
				<td class="manag_less_space" colspan="3"></td>
			  </tr>
			  <tr>
				<td height="25" align="center">Enter Your Email Address</td>
				<td><input type="text" name="txtemail" class="input_forgot" /></td>
				<td><input name="submit" type="image" src="images/submit.png" alt="" value="Forgot" /></td>
			  </tr>
			  <tr>
				<td class="manag_less_space" colspan="3"></td>
			  </tr>
			</table>
			</td>
		</tr>
		</table>
		</form>
    </div>
  </div>
  <div class="clear-fix"></div>
  <!--dont remove this line-->
</div>
<!-- template main end -->
<!--footer-->
<?php include("footer.php"); ?>
</div>
</body>
</html>