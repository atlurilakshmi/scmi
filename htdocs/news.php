<?php
require_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SCIMORES Corporation</title>
    <link href="css/template_sci.css" rel="stylesheet" type="text/css" />
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
        oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
            //do nothing
        },
        onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
            //do nothing
        }
    })
    </script>
    <!-- switch content -->
    <script type="text/javascript" src="js/switchcontent.js"></script>
    <!-- switch content -->
    <?php
if(isset($_SESSION['lastclickedlink']) && isset($_SESSION['user']))
{
?>
        <script language="javascript" type="text/javascript">
        window.open('<?php echo $_SESSION['
            lastclickedlink ']; ?>');
        </script>
        <?php
}
unset($_SESSION['lastclickedlink']);
?>
</head>

<body>
    <div class="news_backdrop">
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
                            <li><a href="overview.php" target="_self" title="Company"><span class="let_big">C</span>ompany</a>
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
                            <li><a href="education.php" target="_self"><span class="let_big">e</span>ducational <span class="let_big">s</span>ector</a>
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
                            <li class="cur_main_mnu"><a href="news.php" target="_self"><span class="let_big">N</span>ews &amp; <span class="let_big">a</span>nnouncements</a></li>
                            <li><a href="contact.php" target="_self"><span class="let_big">c</span>ontact <span class="let_big">u</span>s</a></li>
                        </ul>
                    </div>
                    <!-- CSS VERTICAL MENU END -->
                </div>
            </div>
            <div id="content_wrap">
                <div id="content-inner">
                    <h2>NEWS & ANNOUNCEMENTS</h2>                  
                         
                    <br> 2017-07-19&nbsp;&nbsp;&nbsp;Submitted <a href="http://ldsnet.fairfaxcounty.gov/ldsnet/CustomSubmit.aspx?typ=PAWS&tot=1&sel=5" <?php if(isset($_SESSION[ 'user'])) { ?>target="_blank"<?php } ?> class="yellow">Site Plan to Department of Planning and Zoning</a>
                    <br> 2017-06-06&nbsp;&nbsp;
                    <a href="http://ldsnet.fairfaxcounty.gov/ldsnet/ZAPSMain.aspx?cde=SE&seq=4215221" <?php if(isset($_SESSION[ 'user'])) { ?>target="_blank"<?php } ?> class="yellow">Rezoning & Special Exception Application Approved by Board of Supervisors</a>
                    <br> 2017-04-26&nbsp;&nbsp;
                    <a href="http://ldsnet.fairfaxcounty.gov/ldsnet/ZAPSMain.aspx?cde=SE&seq=4215221" <?php if(isset($_SESSION[ 'user'])) { ?>target="_blank"<?php } ?> class="yellow">Rezoning & Speical Exception Application Approved by Planning Commission</a>
                    
                    <br> 2016-04-19&nbsp;&nbsp;&nbsp;<a href="pdf/acceptance.pdf" target="_blank" class="yellow">Rezoning & Special Exception Application Accepted by Department of Planning and Zoning</a>
                    
                    <br> 2016-02-26&nbsp;&nbsp;&nbsp;Rezoning & Special Exception Application Submitted to Department of Planning and Zoning
                    <br> 2015-12-31&nbsp;&nbsp;&nbsp;Completed GDP & SE PLAT
                    <br> 2015-06-30&nbsp;&nbsp;&nbsp;Completed Feasibility Study
                    <br> 2015-03-01&nbsp;&nbsp;&nbsp;Project Kickoff
                    <br> 2015-06-30&nbsp;&nbsp;&nbsp;Completed Feasibility Study
                    <br> 2014-08-20&nbsp;&nbsp;&nbsp;Incorporated Scimores Academy LLC
                    <br> 2010-02-28&nbsp;&nbsp;&nbsp;Launching our corporate website - www.scimores.com
                    <br> 2009-11-16&nbsp;&nbsp;&nbsp;Received <a href="viewpdf.php?doc=CCB" <?php if(isset($_SESSION[ 'user'])) { ?>target="_blank"<?php } ?> class="yellow">Certificate for Commencement of Business</a>
                    <br> 2009-11-04&nbsp;&nbsp;&nbsp;Received <a href="viewpdf.php?doc=CI" <?php if(isset($_SESSION[ 'user'])) { ?>target="_blank"<?php } ?> class="yellow">Certificate of Incorporation</a>
                    <br> 2009-09-01&nbsp;&nbsp;&nbsp;Company Name - SCIMORES CORPORATION (INDIA) LTD approved
                    <br> 2009-07-01&nbsp;&nbsp;&nbsp;Starting Phase 1 - Scimores Incorporation Initiative
                    <script type="text/javascript">
                    // MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
                    // Call Instance.init() at the very end. REQUIRED

                    var bobexample = new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
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