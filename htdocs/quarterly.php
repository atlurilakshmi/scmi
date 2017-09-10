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
      <div id="content-inner">
        <h2>Quarterly Results</h2>
        The periods for the quarterly results are demarcated into four quarters in a particular year. The individual quarters are a cumulative sum of the months as described:<br />
        <br />
        Quarter 4 (January, February, March)<br />
        Quarter 3 (October, November, December)<br />
        Quarter 2 (July, August, September)<br />
        Quarter 1 (April, May, June)<br />
        <br />
        To view the reports, click on the respective report below:<br />
        <br />
		<?php
		$comp_results_sql = "SELECT * FROM sci_comp_results where sci_results_type='Quarterly' order by sci_quarter";
		$comp_results_rs = mysql_query($comp_results_sql);
		
		while($comp_results_arr=mysql_fetch_array($comp_results_rs))
		{
			$year = $comp_results_arr['sci_year'];
			if($comp_results_arr['sci_quarter'] == 'First') $quarternum = 1;
			if($comp_results_arr['sci_quarter'] == 'Second') $quarternum = 2;
			if($comp_results_arr['sci_quarter'] == 'Third') $quarternum = 3;
			if($comp_results_arr['sci_quarter'] == 'Fourth') $quarternum = 4;
		?>
        	>> <a href="viewpdf.php?resulttype=Quarterly&quarternum=<?php echo $quarternum; ?>&year=<?php echo $year; ?>" <?php if(isset($_SESSION['user'])) { ?>target="_blank"<?php } ?> class="yellow">FY <?php echo $year.' Q'.$quarternum; ?></a><br />
		<?php
		}
		?>
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