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
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plusmnu.png' class='statusicon' />", "<img src='images/minusmnu.png' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>
<!-- switch content -->
<script type="text/javascript" src="js/switchcontent.js" ></script>
<!-- switch content -->
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
          <li><a href="industry.php" target="_self"><span class="let_big">i</span>ndustry of <span class="let_big">f</span>ashion</a>
              <ul>
                <h2><big>C</big>URRENT <big>P</big>ROJECTS</h2>
                <div style="border-bottom:1px solid #828283; margin: 5px 0;"></div>
                <h2><big>P</big>IPELINE <big>P</big>ROJECTS</h2>
                <li><a href="goldlip.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>G</big>OLD <span class="let_big">L</span>IP <span class="let_big">HFC</span></a></li>
               
              </ul>
          </li>
          <li><a href="education.php" target="_self"><span class="let_big">e</span>ducational <span class="let_big">s</span>ector</a>
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
    <div id="content-inner" style="height:561px; overflow-y:auto">
      <h2>Management Profiles</h2>
<!--       <p>To view profile, click on the name:</p> -->
      <!-- switch content div -->
  <!--     <h5 id="bobcontent1-title" class="handcursor">&nbsp;Hemanth Kumar Balasundaram</h5>
      <div id="bobcontent1" class="switchgroup1"><img src="images/mng_pro_hem.jpg" border="0" /></div>
      <h5 id="bobcontent2-title" class="handcursor">&nbsp;Shashi Devendran Vimalan</h5>
      <div id="bobcontent2" class="switchgroup1"><img src="images/mng_pro_shashi.jpg" border="0" /></div>
      <h5 id="bobcontent3-title" class="handcursor">&nbsp;Sivakumar Balasundaram</h5>
      <div id="bobcontent3" class="switchgroup1"><img src="images/mng_pro_shashi.jpg" border="0" /></div>
      <h5 id="bobcontent4-title" class="handcursor">&nbsp;Anju Hemanth</h5>
      <div id="bobcontent4" class="switchgroup1"><img src="images/mng_pro_anju.jpg" border="0" /></div> -->
<!-- <div style="padding-bottom:10px;"> <img style="width:615px;" src="images/prifiles/hemanth.png" border="0" /></div>
<div style="padding-bottom:10px;"> <img style="width:615px;" src="images/prifiles/kamal.png" border="0" /></div>
<div style="padding-bottom:10px;"> <img style="width:615px;" src="images/prifiles/shiva.png" border="0" /></div>
<div style="padding-bottom:10px;"> <img style="width:615px;" src="images/prifiles/rakesh.png" border="0" /></div>
<div style="padding-bottom:10px;"> <img style="width:615px;" src="images/prifiles/kartheek_1.png" border="0" /></div>
<div style="padding-bottom:10px"> <img style="width:615px;" src="images/prifiles/gokul.png" border="0" /></div> -->

<div style="padding-bottom:0px;"> <img style="width:615px;" src="images/prifiles/profile_1.png" border="0" /></div>
<div style="padding-bottom:1px;"> <img style="width:615px;" src="images/prifiles/profile_2.png" border="0" /></div>

      <script type="text/javascript">
// MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
// Call Instance.init() at the very end. REQUIRED

var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
bobexample.setStatus('<img src="images/minus.png" /> ', '<img src="images/plus.png" /> ')
bobexample.setColor('white', 'white')
bobexample.setPersist(true)
bobexample.collapsePrevious(true) //Only one content open at any given time
bobexample.init()
</script>
      <!-- switch content div -->
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