<?php
require_once("config.php");
if(isset($_SESSION['user'])){
header('Location: my-port.php'); exit;
}

if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
{
	$txtusername=trim($txtusername);
	$txtpassword=md5(trim($txtpassword));
	
	$sql="select * from $tb_user where sci_username='$txtusername' and sci_password='$txtpassword'";
	$res=mysql_query($sql);
	$row=mysql_num_rows($res);
	$user_info_arr=mysql_fetch_array($res);
	
	if($row>0)
	{
		if($user_info_arr['sci_status'] == 'APPROVED' || $user_info_arr['sci_status'] == '')
		{
			$flag='err';
			$errmsg="Please activate your Account";
		}
		elseif($user_info_arr['sci_status'] == 'DECLINED')
		{
			$flag='err';
			$errmsg="Invalid username or password";
		}
		elseif($user_info_arr['sci_status'] == 'ACTIVE')
		{
			$_SESSION['user']=$txtusername;
			
			if($_POST['remember'] == 1)
			{
				setcookie("scim_uname", $txtusername, time()+60*60*24*30, "/");
				setcookie("scim_passwd", $_POST['txtpassword'], time()+60*60*24*30, "/");
			}
			else
			{
				setcookie("scim_uname", "", time()-60*60*24*30, "/");
				setcookie("scim_passwd", "", time()-60*60*24*30, "/");
			}
			
			if(isset($_SESSION['lastvisitpage']))
			header('location: '.$_SESSION['lastvisitpage']);
			else
			header('location: my-port.php');
		}
	}
	else
	{
		$flag='err';
		$errmsg="Invalid username or password";
	}
}
/*elseif(isset($_REQUEST['actstatus']))
{
	if($actstatus == 1)
	$errmsg="Your Account is activated.";
	elseif($actstatus == 2)
	$errmsg="Your Account is already activated.";
	elseif($actstatus == 3)
	$errmsg="Invalid Activation code.";
}*/
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
                <li><a href="managemanent-pro.php"><span class="let_big">P</span>romoters</a></li>
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
            <li><a href="industry.php" target="_self"><span class="let_big">i</span>ndustry of <span class="let_big">f</span>ashion</a>   <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
                <li><a href="goldlip.php"><big>G</big>OLD <span class="let_big">L</span>IP <span class="let_big">HFC</span></a></li>
              </ul>
            </li>
            <li><a href="education.php" target="_self"><span class="let_big">e</span>ducational <span class="let_big">s</span>ector</a>
              <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
                <li><a href="intl-school.php"><big>S</big>CIMORES <big>I</big>nternational <big>S</big>chool</a></li>
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
    <div id="content-login-inner">
	<h2>Members login</h2>
      <form name="frmlogin" action="login.php" method="post">
        <table border="0" cellspacing="0" cellpadding="0" id="login_tbl">
          <tr>
            <td height="42" colspan="5"><h5>Sign in | Register </h5></td>
          </tr>
          <tr>
            <td class="msg-top" colspan="5">Member, want to purchase/sell shares</td>
          </tr>
          <tr>
            <td width="25" class="login_txt">&nbsp;&nbsp; </td>
            <td width="131" class="login_txt">Username</td>
<td width="112" class="login_txt">Password</td>
            <td colspan="2" >&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="text" name="txtusername" class="login_input" value="<?php echo $_COOKIE['scim_uname']; ?>"/></td>
<td><input type="password" name="txtpassword" class="login_input" value="<?php echo $_COOKIE['scim_passwd']; ?>"/>
<td width="60" align="left"><input name="image" type="image" src="images/signin.png"/></td>
            <td width="20" align="left">&nbsp;</td>
<td width="1"></td>
          </tr>
          <tr>
            <td colspan="5"><table border="0" cellspacing="0" cellpadding="0" id="login_stbl">
                <tr>
                  <td width="21" height="30">&nbsp;</td>
                  <td width="24"><input type="checkbox" name="remember" value="1" <?php if($_COOKIE['scim_uname'] != '') echo 'checked'; ?>></td>
<td width="106">Remember me </td>
                  <td width="197"><a href="forgot.php">Forgot the username/password?</a> </td>
                </tr>
                <?php if($flag=='err') { ?>
                <tr>
                  <td class="err_msg_login">&nbsp;</td>
				  <td colspan="3" class="err_msg_login"><?php echo $errmsg; ?></td>
				</tr>
                <?php } ?>
                <tr>
                  <td colspan="2" class="login_cbox">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class="b-top">
                  <td class="msg-top" colspan="4"><a href="register.php">Not a Member, Register Membership &gt;&gt; </a></td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
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