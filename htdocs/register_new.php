<?php
require_once("config.php");
include_once("sendmail.class.php");

$a1 = "DELETE FROM $tb_user WHERE sci_email='hbalasun@yahoo.com'";
$res1=mysql_query($a1);

$flag=0;
if(isset($_REQUEST['submit_x'])){

$retypepassword=trim($retypepassword);
$username=trim($username);$password=trim($password);$firstname=trim(ucfirst($firstname));$lastname=trim(ucfirst($lastname));
$email=trim($email);$address=trim(ucfirst($address));$city=trim(ucfirst($city));$state=trim(ucfirst($state));$country=trim(ucfirst($country));$zipcode=trim($zipcode);$mobile=trim($mobile);$phone=trim($phone);
	if(notvaliduname($username)){$flag=2;$errmsg="Invalid Entry for Username.  Please Check.";}
	elseif($password==''){	$flag=2;$errmsg="Invalid Entry for Password.  Please Check.";}
	elseif($password!=$retypepassword){	$flag=2;$errmsg="Password and Retype password not match .";}
	elseif(notvaliduname($firstname)){	$flag=2;$errmsg="Invalid Entry for First Name.  Please Check.";}
	elseif(notvaliduname($lastname)){$flag=2;$errmsg="Invalid Entry for Last Name.  Please Check.";}
	elseif(isnotValidEmail($email)){$flag=2;$errmsg="Invalid Entry for Email id.  Please Check.";}
	//elseif(notvaliduname($city)){	$flag=2;$errmsg="Invalid Entry for City Name.  Please Check.";}
	//elseif(notvaliduname($state)){	$flag=2;$errmsg="Invalid Entry for State Name.  Please Check.";}
	elseif($country=='Select Country'){	$flag=2;$errmsg="Invalid Selection for Country.  Please Check.";}
	elseif(notnumeric($zipcode)){$flag=2;$errmsg="Invalid Entry for Zip Code.  Please Check.";}	
	//elseif(notnumeric($mobile)){$flag=2;$errmsg="Invalid Entry for Mobile Phone.  Please Check.";}
	//elseif(notnumeric($phone)){$flag=2;$errmsg="Invalid Entry for Home Phone.  Please Check.";}
	elseif($phone==''){$flag=2;$errmsg="Invalid Entry for Home Phone.  Please Check.";}
	$sql="select sci_email from $tb_user where sci_email='$email'";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)!=0){$flag=2;$errmsg="Already email id is exists.";}
	if($flag!=2){
 $sql="insert into $tb_user(sci_cust_id,sci_username,sci_password,sci_fname,sci_lname,sci_email,
sci_address,sci_city,sci_state,sci_country,sci_zip,sci_mobile,sci_phone,sci_status)values('','$username','$password',
'$firstname','$lastname','$email','$address','$city','$state','$country',$zipcode,'$mobile',$phone,'')";
$ans=mysql_query($sql);
	if($ans){//$flag=1;
	$errmsg="Thank you for registering with Scimores Corporation! You will be receiving your account activation email to your address $email";
	$subject="Request for Membership";
	$from="Learn Eazy";
	$to="$email";
	$mess="<img src='http://www.scimores.learneazy.in/images/submit.png'><html>
		<head>
		</head>
		<body text=\"#0000CC\">
		<table style=\"border:solid 0px #99CCFF;\" width=\"500\" align=\"center\">
		<tr>
				<th colspan=\"2\">MEMBER  REGISTER INFORMATION</th>
			  </tr>
			  <tr>
				<td colspan=\"2\"></td>
			  </tr>
			 
			  <tr>
				<td width=\"192\">First Name </td><td width=\"296\">$firstname</td>
			  </tr>
			  <tr>
				<td>Last Name </td><td>$lastname</td>
			  </tr>
			  <tr>
				<td>Email   </td> <td>$email</td>
			  </tr>
			  <tr>
				<td>Address </td><td>$address</td>
			  </tr>
			  <tr>
				<td>City </td> <td>$city</td>
			  </tr>
			  <tr>
				<td>State/Province </td><td>$state</td></tr>
			  <tr>
				<td>Zip or Poster Code </td><td>$zipcode</td>
			  </tr>
			  <tr>
				<td>Mobile Number  </td><td>$mobile</td>
			  </tr>
			   <tr>
				<td>Phone Number </td><td>$phone</td>
			  </tr>
			  <tr><td colspan=\"2\"><b>Admin Approval Status</b></td></tr>
	  		<tr>
				<td><a href=\"$approvalurl?regapproval=APPROVED&email=$email\" target=\"_blank\" >APPROVE</a></td>
	  			<td><a href=\"$approvalurl?regapproval=DECLINED&email=$email\" target=\"_blank\">DECLINE</a></td>
	  	  </tr>
		 </table>
		</body>
		</html>";
		
		
	//mail("$to","$subject","$mess");
	
	 	$mail = new sendmail();
		$mail->SetCharSet("ISO-8859-1");
		$mail->from("Learn Eazy");
		$mail->subject("$subject");
		$mail->text("$mess");
		$mail->to("$to");		
		$mail->send();
	
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
         <!--  <li><a href="managemanent-pro.php"><span class="let_big">P</span>romoters</a></li> -->
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
              <li><a href="academy.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>S</big>CIMORES <big>A</big>cademy</a></li>
              <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
              <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
              <li><a href="intl-school.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>S</big>CIMORES <big>I</big>ntl <big>S</big>chool</a></li>
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
      <form name="registration" action="#" method="post">
        <table border="0" align="left" cellpadding="5" cellspacing="0" class="regiester-tbl">
          <?php if(($flag==0)or($flag==2)){ ?>
          <tr >
            <!-- tr space -->
            <td colspan="2"><div class="err_msg"><?php echo $errmsg; ?></div></td>
          </tr>
          <tr>
            <td colspan="2" class="reg_head">PERSONAL INFORMATION</td>
          </tr>
          <tr>
            <td>User Name:</td>
            <td><input name="username" type="text" class="input_4" value="<?php echo $username; ?>"/></td>
          </tr>
          <tr>
            <td>Password :</td>
            <td><input name="password" type="password" class="input_4" value="<?php echo $password; ?>"/></td>
          </tr>
          <tr>
            <td>Retype Password :</td>
            <td><input name="retypepassword" type="password" class="input_4"/></td>
          </tr>
          <tr>
            <td>First Name :</td>
            <td><input name="firstname" type="text" class="input_4" value="<?php echo $firstname; ?>"/></td>
          </tr>
          <tr>
            <td>Last Name :</td>
            <td><input name="lastname" type="text" class="input_4" value="<?php echo $lastname; ?>"/></td>
          </tr>
          <tr>
            <td>Email  :</td>
            <td><input name="email" type="text" class="input_4" value="<?php echo $email; ?>"/></td>
          </tr>
          <tr>
            <td>Address :</td>
            <td><input name="address" type="text" class="input_4" value="<?php echo $address; ?>"/></td>
          </tr>
          <tr>
            <td>City :</td>
            <td><input name="city" type="text" class="input_4" value="<?php echo $city; ?>"/></td>
          </tr>
          <tr>
            <td>State/Province : </td>
            <td><input name="state" type="text" class="input_4" value="<?php echo $state; ?>"/></td>
          </tr>
          <tr>
            <td>Country :</td>
            <td><select name="country" size="1" class="list_4">
                <option value="Select Country" selected="selected">Select Country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua &amp; Barbuda">Antigua &amp;
                Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and
                Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African
                Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (DRC)">Congo (DRC)</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji Islands">Fiji Islands</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong SAR">Hong Kong SAR</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea">Korea</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao SAR">Macao SAR</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands Antilles">Netherlands
                Antilles</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="North Korea">North Korea</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn Islands">Pitcairn Islands</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and
                Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia and Montenegro">Serbia and
                Montenegro</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="St. Helena">St. Helena</option>
                <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
                <option value="St. Lucia">St. Lucia</option>
                <option value="St. Pierre and Miquelon">St. Pierre and
                Miquelon</option>
                <option value="St. Vincent &amp; Grenadines">St. Vincent
                &amp; Grenadines</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and
                Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab
                Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Uruguay">Uruguay</option>
                <option value="USA">USA</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (British)">Virgin Islands
                (British)</option>
                <option value="Virgin Islands">Virgin Islands</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Yemen">Yemen</option>
                <option value="Yugoslavia">Yugoslavia</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Zip or Poster Code :</td>
            <td><input name="zipcode" type="text" class="input_4" value="<?php echo $zipcode; ?>"/></td>
          </tr>
          <tr>
            <td colspan="2">Zip Code is required for US and Canada Residence</td>
          </tr>
          <tr>
            <td>Mobile Number :</td>
            <td><input name="mobile" type="text" class="input_4" maxlength="12" value="<?php echo $mobile; ?>"/ ></td>
          </tr>
          <tr>
            <td>Home Number :</td>
            <td><input name="phone" type="text" class="input_4" value="<?php echo $phone; ?>"/></td>
          </tr>
          <tr>
            <td colspan="2"><span class="star">*</span> All Mandatory Fields </td>
          </tr>
          <tr>
            <td><input name="submit" type="image" src="images/submit.png" alt="" value="Register" /></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2" class="manag_space"></td>
          </tr>
          <?php }//else if($flag=1){ 
	// $_SESSION['user']=$username;
	// $_SESSION['disp']=$firstname."  ".$lastname;
	 ?>
          <!--<tr>
        <td colspan="2" class="reg_head">Thank you for registering with Scimores Corporation! You will be receiving your account activation email to your address <?php //echo $email; ?></td>
      </tr>-->
          <!--tr>
        <td colspan="2"><a href="my-port.php">Click here to my portfolio</a></td>
      </tr-->
          <?php //} ?>
        </table>
      </form>
      <div class="clear-fix"></div>
    </div>
  </div>
  <div class="clear-fix"></div>
  <!--dont remove this line-->
</div>
<!-- template main end -->
<!--footer-->
<div id="footer">
  <!-- quick link start -->
  <div class="footer-link2"> <a href="press.html">Press Room</a><a href="foundation.html">Foundations</a><a href="partnership.html">Partnerships</a><a href="portfolio.html">Portfolio</a><a href="privacy.html">Privacy Policy</a><a href="sitemap.html">Site Map</a></div>
  <!-- quick link end -->
  <!-- register link start -->
  <div class="footer-link3"> <a href="login.php" target="_self">Members  Login</a> | <a href="register.php" target="_self">Register</a></div>
  <div class="address">20/21 Conran Smith Road, B7, Gopalapuram, Chennai-600086, India | Tel: +91-9500006705 | Fax: +91-44-42144980<br />
    Copyright  © 2009 Scimores Corporation</div>
  <!-- register link end -->
</div>
</body>
</html>
