<?php
require_once("config.php");
if(!isset($_SESSION['user'])){
header('Location: login.php');
}

$flag=0;
if(isset($_REQUEST['cancel_x']))
{
header('Location: my-port.php');
}
if(isset($_REQUEST['submit_x']))
{
	$username=str_replace(" ", "", $username);$password=str_replace(" ", "", $password);
	$retypepassword=str_replace(" ", "", $retypepassword);$firstname=trim(ucfirst($firstname));
	$lastname=trim(ucfirst($lastname));$email=str_replace(" ", "", $email);$address=trim(ucfirst($address));
	$zipcode=trim($zipcode);

	if($username==""){ $flag=2;$errmsg="Please enter username";}
	elseif(strlen($username) < 6){ $flag=2;$errmsg="Username must be minimum of six letters";}
	elseif($password!="" && strlen($password) < 6){ $flag=2;$errmsg="Password must be minimum of six letters";}
	elseif($password!=$retypepassword){	$flag=2;$errmsg="Passwords do not match";}
	elseif($firstname==""){	$flag=2;$errmsg="Please enter first name";}
	elseif($lastname==""){$flag=2;$errmsg="Please enter last name";}
	elseif($email==""){$flag=2;$errmsg="Please enter email address";}
	elseif(isnotValidEmail($email)){$flag=2;$errmsg="Please enter valid email address";}
	elseif($email==getAdminEmailAddress($tb_admin)){$flag=2;$errmsg="Please enter valid email address";}
	elseif($country==""){$flag=2;$errmsg="Please select country";}
	
	/*
	$check_uname_sql="select sci_username from $tb_user where sci_username='$username' and sci_username<>'".$_SESSION['user']."'";
	$check_uname_rs=mysql_query($check_uname_sql);
	if(mysql_num_rows($check_uname_rs)!=0){$flag=2;$errmsg="This username already exists.";}*/
	
	$sql="select sci_email from $tb_user where sci_email='$email' and sci_email<>'".$_SESSION['email']."'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)!=0){$flag=2;$errmsg="This email address already exists.";}
	
	if($flag!=2)
	{
		if($password!="")
		{
			$password=md5($password);
			$update_password_sql="update $tb_user set sci_password='$password' where sci_username='".$_SESSION['user']."'";
			mysql_query($update_password_sql) or die(mysql_error());
		}
		
		$sql="update $tb_user set sci_fname='$firstname', sci_lname='$lastname',sci_email='$email', sci_address='$address',     sci_address2='$address2', sci_city='$city',sci_state='$state',sci_country='$country', sci_zip='$zipcode', sci_mobile='$mobile', sci_phone='$phone', sci_referrer='$referrer' where sci_username='".$_SESSION['user']."'";
		$ans=mysql_query($sql) or die(mysql_error());
		$errmsg="Your Account Information is updated successfully";
   	}
}
else
{
	$user_sql="select * from $tb_user where sci_username='".$_SESSION['user']."'";
	$user_rs=mysql_query($user_sql);
	$user_arr=mysql_fetch_array($user_rs);
	
	$username=$user_arr['sci_username'];
	$password=$user_arr['sci_password'];
	$firstname=$user_arr['sci_fname'];
	$lastname=$user_arr['sci_lname'];
	$_SESSION['email']=$email=$user_arr['sci_email'];
	$address=$user_arr['sci_address'];
	$address2=$user_arr['sci_address2'];
	$city=$user_arr['sci_city'];
	$state=$user_arr['sci_state'];
	$country=$user_arr['sci_country'];
	$zipcode=$user_arr['sci_zip'];
	$mobile=$user_arr['sci_mobile'];
	$phone=$user_arr['sci_phone'];
	$referrer=$user_arr['sci_referrer'];
}

$country_arr = getCountryInfo($tb_countries, $country);
$country_name = $country_arr['Country'];
$state_arr = getStateInfo($tb_states, $state);
$state_name = $state_arr['Region'];
$city_arr = getCityInfo($tb_cities, $city);
$city_name = $city_arr['City'];
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
<div class="company_backdrop">
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
      <h2>Account Info</h2>
      <form name="editaccount" id="regform" action="editaccount.php" method="post">
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
            <td width="213"><input name="username" id="uname" type="text" class="input_4" maxlength="12" value="<?php echo $username; ?>" readonly/></td>
            <td width="200"><span class="form_error" id="err_uname"></span></td>
          </tr>
          <tr>
            <td>New Password :</td>
            <td><input name="password" id="passwd" type="password" class="input_4" maxlength="12"/></td>
            <td><span class="form_error" id="err_passwd"></span></td>
          </tr>
          <tr>
            <td>Confirm Password :</td>
            <td><input name="retypepassword" id="rpasswd" type="password" class="input_4" maxlength="12"/></td>
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
            <td><input name="mobile" id="mobile" type="text" class="input_4" maxlength="20" value="<?php echo $mobile; ?>"/></td>
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
            <td><input name="submit" type="image" src="images/save.png" alt="" value="Save" /><input name="cancel" type="image" src="images/cancel.png" alt="" value="Cancel" /></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="3" class="manag_space"></td>
          </tr>
          <?php }?>
        </table>
      </form>
      <div class="clear-fix"></div>
    </div>
  </div>
  <div class="clear-fix"></div>
  <!--dont remove this line-->
</div>
<script language="javascript" type="text/javascript" src="js/prototype/validation_type2.js"></script>
<!-- template main end -->
<!--footer-->
<?php include("footer.php"); ?>
</div>
</body>
</html>