<?php
require_once("config.php");
if(isset($_SESSION['user'])){
header('Location: my-port.php');
}

$flag=0;

if(isset($_REQUEST['submit_x']))
{
	$username=str_replace(" ", "", $username);$password=str_replace(" ", "", $password);
	$retypepassword=str_replace(" ", "", $retypepassword);$firstname=trim(ucfirst($firstname));
	$lastname=trim(ucfirst($lastname));$email=str_replace(" ", "", $email);$address=trim(ucfirst($address));
	$zipcode=trim($zipcode);

	if($username==""){ $flag=2;$errmsg="Please enter username";}
	elseif(strlen($username) < 6){ $flag=2;$errmsg="Username must be minimum of six letters";}
	elseif($password==""){ $flag=2;$errmsg="Please enter password";}
	elseif(strlen($password) < 6){ $flag=2;$errmsg="Password must be minimum of six letters";}
	elseif($password!=$retypepassword){	$flag=2;$errmsg="Passwords do not match";}
	elseif($firstname==""){	$flag=2;$errmsg="Please enter first name";}
	elseif($lastname==""){$flag=2;$errmsg="Please enter last name";}
	elseif($email==""){$flag=2;$errmsg="Please enter email address";}
	elseif(isnotValidEmail($email)){$flag=2;$errmsg="Please enter valid email address";}
	elseif($email==getAdminEmailAddress($tb_admin)){$flag=2;$errmsg="Please enter valid email address";}
	elseif($country==""){$flag=2;$errmsg="Please select country";}
	
	$check_uname_sql="select sci_username from $tb_user where sci_username='$username'";
	$check_uname_rs=mysql_query($check_uname_sql);
	if(mysql_num_rows($check_uname_rs)!=0){$flag=2;$errmsg="This username already exists.";}
	
	$sql="select sci_email from $tb_user where sci_email='$email'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)!=0){$flag=2;$errmsg="This email address already exists.";}
	
	$country_arr = getCountryInfo($tb_countries, $country);
	$country_name = $country_arr['Country'];
	$state_arr = getStateInfo($tb_states, $state);
	$state_name = $state_arr['Region'];
	$city_arr = getCityInfo($tb_cities, $city);
	$city_name = $city_arr['City'];
	
	if($flag!=2)
	{
		$password=md5($password);
		$regdate=date('Y-m-d H:i:s');
		
		$actcode_prefix_arr = array('CbX', 'fDB', 'MwA', 'VtN', 'ZSk', 'ErY');
		$actcode_prefix = $actcode_prefix_arr[rand(0, 5)];
		$actcode_suffix = rand(112,998);
		$actcode = $actcode_prefix."5".rand(13,98)."B".$actcode_suffix;
		
		$sql="insert into $tb_user(sci_cust_id,sci_username,sci_password,sci_fname,sci_lname,sci_email, sci_address, sci_address2,
		sci_city, sci_state, sci_country,sci_zip,sci_mobile,sci_phone, sci_referrer, sci_regdate, sci_actcode,sci_status)   							        values('', '$username', '$password', '$firstname','$lastname','$email', '$address', '$address2','$city', '$state', 		        '$country', '$zipcode', '$mobile', '$phone', '$referrer', '$regdate', '$actcode','')";
		mysql_query($sql);
		
		$userid=mysql_result(mysql_query("select sci_cust_id from $tb_user where sci_email='$email'"),0);
		$errmsg="Thank you for registering with Scimores Corporation! You will be receiving your account activation email to your address $email";
		$subject="Request for Membership";
		
		$msg="<table style=\"font-family:Tahoma; font-size:12px; font-weight:normal\" width=\"500\" align=\"center\">
				  <tr>
					<td colspan=\"2\" style=\"font-family:Tahoma; font-size:14px; font-weight:bold\" align=\"center\">MEMBER REGISTER INFORMATION</td>
				  </tr>
				  <tr>
					<td colspan=\"2\"></td>
				  </tr>
				 
				  <tr>
					<td width=\"192\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Member ID </td><td width=\"296\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">M$userid</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">First Name </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$firstname</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Last Name </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$lastname</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Email   </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$email</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Address Line 1</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$address</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Address Line 2</td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$address2</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">City </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$city_name</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">State/Province </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$state_name</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Country </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$country_name</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Zip or Postal Code </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$zipcode</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Mobile Number  </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$mobile</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Phone Number </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$phone</td>
				  </tr>
				  <tr>
					<td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">Referred By </td><td style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">$referrer</td>
				  </tr>
				  <tr><td colspan=\"2\" style=\"font-family:Tahoma; font-size:12px; font-weight:bold\">Admin Approval Action</td></tr>
				  <tr>
					<td><a href=\"$approvalurl?regapproval=APPROVED&userid=$userid\" target=\"_blank\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">APPROVE</a></td>
					<td><a href=\"$approvalurl?regapproval=DECLINED&userid=$userid\" target=\"_blank\" style=\"font-family:Tahoma; font-size:12px; font-weight:normal\">DECLINE</a></td>
				  </tr>
			 </table>";
		$to=getAdminEmailAddress($tb_admin);
		$from="$email";
		
		sendHTMLemail($msg,$from,$to,$subject);
		unset($_POST);
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
<script language="javascript" type="text/javascript" src="js/prototype/prototype.js"></script>
<script language="javascript" type="text/javascript">
function showstate(countryID)
{
	var stateslength = document.getElementById('state').options.length;
	for(var i=stateslength-1;i>0;i--)
	{
		document.getElementById('state').remove(i);
	}
	
	var citieslength = document.getElementById('city').options.length;
	for(var j=citieslength-1;j>0;j--)
	{
		document.getElementById('city').remove(j);
	}
	
	if(countryID != '')
	{
		new Ajax.Request("getstate.php?country_id="+countryID+"&sid="+Math.random(), { method: 'get', onSuccess: function(response)
		{
			var states_id_name_str = response.responseText;
			states_id_name_str = states_id_name_str.replace(/"/g, '');
			states_id_name_str = states_id_name_str.replace(/^\s*|\s*$/g,'');
			states_arr = states_id_name_str.split('#');
			for(var x=0; x<states_arr.length; x++)
			{
				state_arr = states_arr[x].split("@");
				var optn = document.createElement("OPTION");
				optn.text = state_arr[1];
				optn.value = state_arr[0];
				document.getElementById('state').options.add(optn);
			}
		}});
	}
}

function showcity(stateID)
{
	var citieslength = document.getElementById('city').options.length;
	for(var j=citieslength-1;j>0;j--)
	{
		document.getElementById('city').remove(j);
	}
	
	if(stateID != '')
	{
		new Ajax.Request("getcity.php?state_id="+stateID+"&sid="+Math.random(), { method: 'get', onSuccess: function(response)
		{
			var cities_id_name_str = response.responseText;
			cities_id_name_str = cities_id_name_str.replace(/"/g, '');
			cities_id_name_str = cities_id_name_str.replace(/^\s*|\s*$/g,'');
			cities_arr = cities_id_name_str.split('#');
			for(var x=0; x<cities_arr.length; x++)
			{
				city_arr = cities_arr[x].split("@");
				var optn = document.createElement("OPTION");
				optn.text = city_arr[1];
				optn.value = city_arr[0];
				document.getElementById('city').options.add(optn);
			}
		}});
	}
}
</script>
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
    <div id="content-inner-2">
      <h2>Register</h2>
      <form name="registration" id="regform" action="register.php" method="post">
        <table border="0" align="left" cellpadding="5" cellspacing="0" class="regiester-tbl">
          <?php if(($flag==0)or($flag==2)){ ?>
          <tr >
            <!-- tr space -->
            <td colspan="3"><div id="errmsg" class="err_msg"><?php echo $errmsg; ?></div></td>
          </tr>
          <tr>
            <td colspan="2" class="reg_head">PERSONAL INFORMATION</td>
            <td class="reg_head">&nbsp;</td>
          </tr>
          <tr>
            <td width="167">Username :</td>
            <td width="213"><input name="username" id="uname" type="text" class="input_4" maxlength="12" value="<?php echo $username; ?>"/></td>
            <td width="200"><span class="form_error" id="err_uname"></span></td>
          </tr>
          <tr>
            <td>Password :</td>
            <td><input name="password" id="passwd" type="password" class="input_6" maxlength="12"/></td>
            <td><span class="form_error" id="err_passwd"></span></td>
          </tr>
          <tr>
            <td>Confirm Password :</td>
            <td><input name="retypepassword" id="rpasswd" type="password" maxlength="12" class="input_6"/></td>
            <td><span class="form_error" id="err_rpasswd"></span></td>
          </tr>
          <tr>
            <td>First Name :</td>
            <td><input name="firstname" id="fname" type="text" class="input_4" maxlength="30" value="<?php echo $firstname; ?>"/></td>
            <td><span class="form_error" id="err_fname"></span></td>
          </tr>
          <tr>
            <td>Last Name :</td>
            <td><input name="lastname" id="lname" type="text" class="input_4" maxlength="30" value="<?php echo $lastname; ?>"/></td>
            <td><span class="form_error" id="err_lname"></span></td>
          </tr>
          <tr>
            <td>Email Address :</td>
            <td><input name="email" id="email" type="text" class="input_4" maxlength="50" value="<?php echo $email; ?>"/></td>
            <td><span class="form_error" id="err_email"></span></td>
          </tr>
		  
          <tr>
            <td>Address Line 1 :</td>
            <td><input name="address" id="address" type="text" class="input_4" maxlength="50" value="<?php echo $address; ?>"/></td>
            <td><span class="form_error" id="err_address"></span></td>
          </tr>
		  
		  <tr>
            <td style="padding-left:52px">Line 2 :</td>
            <td><input name="address2" id="address2" type="text" class="input_4" maxlength="50" value="<?php echo $address2; ?>"/></td>
            <td></td>
          </tr>
		  
		  <tr>
            <td>Country :</td>
            <td>
			  <select name="country" id="country" size="1" class="list_4" onchange="showstate(this.value);">
                <option value="">Select Country</option>
				<?php
                $countries_sql = "select * from $tb_countries where Country <>'World'";
				$countries_rs = mysql_query($countries_sql);
				while($countries_arr=@mysql_fetch_array($countries_rs))
				{
				?>
				<option value="<?php echo $countries_arr['CountryId']; ?>" <?php if($countries_arr['CountryId'] == $country) echo 'selected'; ?>><?php echo iconv("ISO-8859-1", "UTF-8", $countries_arr['Country']); ?></option>
				<?php
				}
				?>
              </select>
			</td>
            <td><span class="form_error" id="err_country"></span></td>
          </tr>
		  
		  <tr>
            <td>State/Province :</td>
            <td>
				<select name="state" id="state" size="1" class="list_4" onchange="showcity(this.value);">
				<option value="">Select State</option>
				<?php
				if($country != "")
				{
					$states_sql = "select * from $tb_states where CountryID = $country and Region <>'".$country_name."'";
					$states_rs = mysql_query($states_sql);
					$states_num = mysql_num_rows($states_rs);
					while($states_arr=mysql_fetch_array($states_rs))
					{
					?>
						<option value="<?php echo $states_arr['RegionID']; ?>" <?php if($states_arr['RegionID'] == $state) echo 'selected'; ?>><?php echo iconv("ISO-8859-1", "UTF-8", $states_arr['Region']); ?></option>
					<?php
					}
					if($states_num == 0) echo '<option value="9999" selected>Not Applicable</option>';
				}
				?>
				</select>
			</td>
            <td><span class="form_error" id="err_state"></span></td>
          </tr>
		  
          <tr>
            <td>City :</td>
            <td>
				<select name="city" id="city" size="1" class="list_4">
				<option value="">Select City</option>
				<?php
				if($state != "")
				{
					$cities_sql = "select * from $tb_cities where RegionID = $state";
					$cities_rs = mysql_query($cities_sql);
					$cities_num = mysql_num_rows($cities_rs);
					while($cities_arr=mysql_fetch_array($cities_rs))
					{
				?>
						<option value="<?php echo $cities_arr['CityId']; ?>" <?php if($cities_arr['CityId'] == $city) echo 'selected'; ?>><?php echo iconv("ISO-8859-1", "UTF-8", $cities_arr['City']); ?></option>
				<?php
					}					
					if($cities_num == 0) echo '<option value="99999" selected>Not Applicable</option>';
				}
				?>
				</select>
			</td>
            <td><span class="form_error" id="err_city"></span></td>
          </tr>
         
          <tr>
            <td>Zip or Postal Code :</td>
            <td><input name="zipcode" id="zipcode" type="text" class="input_4" maxlength="8" value="<?php echo $zipcode; ?>"/></td>
            <td><span class="form_error" id="err_zipcode"></span></td>
          </tr>
          <tr>
            <td colspan="3">Zip Code is required for US and Canada Residence</td>
          </tr>
          <tr>
            <td>Mobile Number :</td>
            <td><input name="mobile" id="mobile" type="text" class="input_4" maxlength="20" value="<?php echo $mobile; ?>"/ ></td>
            <td><span class="form_error" id="err_mobile"></span></td>
          </tr>
          <tr>
            <td>Home Number :</td>
            <td><input name="phone" id="phone" type="text" class="input_4" maxlength="20" value="<?php echo $phone; ?>"/></td>
            <td><span class="form_error" id="err_phone"></span></td>
          </tr>
		  <tr>
            <td>Referred By :</td>
            <td><input name="referrer" id="referrer" type="text" class="input_4" maxlength="50" value="<?php echo $referrer; ?>"/></td>
            <td></td>
          </tr>
		  
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td><input name="submit" type="image" src="images/submit.png" alt="" value="Register" /></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="3" class="manag_space"></td>
          </tr>
          <?php } ?>
        </table>
      </form>
      <div class="clear-fix"></div>
    </div>
  </div>
  <div class="clear-fix"></div>
  <!--dont remove this line-->
</div>
<script language="javascript" type="text/javascript" src="js/prototype/validation.js"></script>
<!-- template main end -->
<!--footer-->
<?php include("footer.php"); ?>
</div>
</body>
</html>