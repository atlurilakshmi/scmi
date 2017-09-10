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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
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
      <h2>Articles of Association</h2>
      &gt;&gt; <a href="viewpdf.php?doc=AOA" <?php if(isset($_SESSION['user'])) { ?>target="_blank"<?php } ?> class="yellow">2009-10 AoA</a></div>
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