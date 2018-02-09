<?php
require_once("config.php");
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
<?php
if(isset($_SESSION['lastclickedlink']) && isset($_SESSION['user']))
{
?>
<script language="javascript" type="text/javascript">
	window.open ('<?php echo $_SESSION['lastclickedlink']; ?>');
</script>
<?php
}
unset($_SESSION['lastclickedlink']);
?>
</head>
<body>
<div class="fashion_backdrop">
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
        <li class="cur_main_mnu"><a href="industry.php" target="_self"><span class="let_big">i</span>ndustry of <span class="let_big">f</span>ashion</a>
            <ul>
              <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
              <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
              <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
              <li><a href="goldlip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>G</big>OLD <span class="let_big">L</span>IP <span class="let_big">HFC</span></a></li>
             
            </ul>
        </li>
        <li class="cur_main_mnu" ><a href="education.php" target="_self"><span class="let_big">e</span>ducational <span class="let_big">s</span>ector</a>
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
<div id="content-inner">
<h2>INDUSTRY OF FASHION: PIPELINE PROJECTs</h2>
<h3>ALBA.T.K. </h3>
<div class="intl-school_img_wrapper">
<div class="intl-school_img"> <img src="images/alba_big.jpg" alt="international school" /> </div>
<div class="intl_button"><a href="http://www.albatk.com" target="_blank" title="ALBA.T.K."><img src="images/visit-website.gif" alt="visit website" border="0" height="20" /></a>&nbsp;<a href="#"><img src="images/viewplan.gif" alt="view plan" border="0" height="20" /></a>&nbsp;<a href="industry.php" ><img src="images/view_all.gif" alt="view all" border="0"  width="100" height="20" /></a></div>
</div>
<div class="intl-school_txt">ALBA.T.K. – owned and promoted by Scimores Corporation (India) Limited will be specializing in the creation of high-quality fashion footwear, leather goods and accessories, with close attention to detail and fine craftsmanship. 
<br />
<br />
ALBA.T.K. has its own spirit and personality, and present diverse range of footwear that combine design with imagination and functionality. Shoes are unique, original and constantly surprising.
<br />
<br />
ALBA.T.K. will be dedicated to bringing you both quality and cutting-edge trends at affordable prices, season after season. Whether the latest footwear trends are breaking in London, Milan, Paris, New York or Tokyo, ALBA.T.K. will have them on your feet!<br />
<p><br />
  <br />
</p>
</div>
</div>
</div>
</div>
<div class="clear-fix"></div>
<!--dont remove this line-->
</div>
<!-- template main end -->
<!--footer-->
<?php include("footer.php"); ?>
<!-- backdrop div -->
</div>
</body>
</html>