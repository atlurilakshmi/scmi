<?php
require_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SCIMORES Corporation</title>
    <link href="css/template_sci.css" rel="stylesheet" type="text/css" />
    <link href="css/vegas.css" rel="stylesheet" type="text/css" />
    <link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
    <link href="css/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
    <link href="css/default.css" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddaccordion.js"></script>
    <script type="text/javascript" src="js/vegas.js"></script>
    <style type="text/css">
    @font-face {
        font-family: 'Agency Fb';
    }

    #template_main {
        height: auto;
        margin: auto 45px;
        padding: 0;
        width: 922px;
    }


    .company_backdrop {
        background: none;
    }

    .menu-img-container {
        position: relative;
        top: 485px;
        margin-left: auto;
        margin-right: auto;
        display: table
    }

    .img-div {
        padding: 0 5px;
    }

    .img-div:hover {
        width: 80px;
        padding: 0 15px;
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -ms-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }
    /*    .item {
        padding: 0 5px;
    }


    .item:hover {
        padding: 0 15px;
    }

    .item img:hover {
        width: 80px;
        height: 100px;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -ms-transition: all .5s ease;
        transition: all .5s ease;
    }*/

    #navi_wrapper {
        float: left;
        height: auto;
        margin: 15px 0 0px 9px;
        padding: 10px;
        width: auto;
    }

    .text-container {
        position: fixed;
        right: 20px;
        top: 20px;
    }

    .gold-label {
        color: #F3C80F;
        font-weight: bold;
        font-size: 28px;
        font-family: 'Agency Fb';
        padding-right: 0px;
    }

    .health-label {
        color: #f3f0f0;
        font-family: 'Segoe UI', 'Calibri';
        font-size: 17px
    }

    .city-first-letter {
        color: #f3f0f0;
        font-size: 27px
    }

    .city {
        color: #f3f0f0;
        font-family: 'Segoe UI', 'Calibri';
        font-size: 19px;
        margin-left: -5px
    }

    .end-help-text {
        color: #f3f0f0;
        font-family: 'Segoe UI', 'Calibri';
        font-size: 14px
    }

    .menu-img-container .img-div {
        float: left;
        text-align: center;
    }

    .menu-img-container .img-div span {
        color: #f3f0f0;
    }

    .menu-img-container .img-div span.txt1 {
        font-size: 19px;
    }


    .menu-img-container .img-div span.txt2 {
        color: #f3f0f0;
        font-size: 11px;
        margin-left: -3px;
    }
    </style>
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
            <!-- First text message -->
            <div id="msg" class="text-container">
                <span class="gold-label">  Gold Lip</span>
                <span class="health-label">Health & Fitness Center </span>
                <br>
                <div style="text-align:center"><span class="city-first-letter">C </span><span class="city">HENNAI</span></div>
                <span class="end-help-text">In Planning Phase. Will be publishing</span>
                <br>
                <span class="end-help-text">the plan very soon.</span>
            </div>
            <!--dont remove this line-->
            <div class="menu-img-container">
                <div class="img-div">
                    <span class="txt1">C</span>
                    <span class="txt2">HENNAI</span>
                    <br>
                    <a href="goldlip.php" class="item">
                <img width="75" height="75" src="images/shutterstock.jpg" alt="no image">
              </a>
                </div>
                <div class="img-div">
                    <span class="txt1">C</span>
                    <span class="txt2">HENNAI</span>
                    <br>
                    <a href="intl-school.php" class="item">
                  
                <img  width="75" height="75" src="images/shutterstock_1.jpg" alt="no image">
              </a>
                </div>
                <div class="img-div">
                    <span class="txt1">H</span>
                    <span class="txt2">ERNDON</span>
                    <br>
                    <a href="intl-school.php" class="item">
                  
                <img  width="75" height="75" src="images/auditorium.png" alt="no image"></a>
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
        <!-- template main end -->
        <TABLE cellSpacing=0 cellPadding=0 width="100%" bgcolor="#0d0d0d">
            <TBODY>
                <TR>
                    <TD style="PADDING-LEFT: 52px" vAlign=center align=center width="65%">
                        <p>&nbsp;</p>
                        <p>
                            <div class="footer-link2home">
                                <a href="press.php">Press Room</a><a href="foundation.php">Foundations</a><a href="partnership.php">Partnerships</a><a href="portfolio.php">Portfolio</a><a href="privacy.php">Privacy Policy</a><a href="sitemap.php">Site Map</a> </div>
                    </TD>
                    <TD vAlign=center align=right width="13%">
                        <p>&nbsp;</p>
                        <p>
                            <div class="footer-link3">
                                <?php if(isset($_SESSION['user'])){ ?>
                                <a href="my-port.php" target="_self">My Portfolio</a> | <a href="logout.php" target="_self">Logout</a>
                                <?php } else { ?>
                                <a href="login.php" target="_self">Members Login</a> | <a href="register.php" target="_self">Register</a>
                                <?php } ?>
                            </div>
                        </p>
                    </TD>
                    </TD>
                </TR>
                <TR>
                    <TD vAlign=center align=middle colSpan=3>
                        <TABLE cellSpacing=10 cellPadding=0 width="100%" border=0>
                            <TBODY>
                                <TR>
                                    <TD align=middle>
                                          <div class="address"> <br/> 8250 Westpark Drive, #461, McLean, VA-22102, USA | Tel: +1-(732) 397-0766 | Email: info@scimores.com <br/>
                                            Copyright &copy; 2010 SCIMORES Corporation</div>
                                    </TD>
                                </TR>
</BODY>

</HTML>
<!--footer-->
</div>
<script type="text/javascript">
var text1 = '<h1 style= "position:absolute; right:20px ;color: yellow"></h1>';
var text2 = '<h1 style= "position:absolute; right:20px ;color: yellow"></h1>';
var text3 = '<h1 style= "position:absolute; right:20px ;color: yellow"></h1>';

$(function() {
    $('body').vegas({
        slides: [
            { src: 'images/shutterstock.jpg', overlaytext: text1 },
            { src: 'images/shutterstock_1.jpg', overlaytext: text2 },
            { src: 'images/auditorium.png', overlaytext: text3 }


        ],
        timer: false,
        transition: 'fade2',
        transitionDuration: 10000,
        animation: 'kenburns',
        animationDuration: 20000,
        overlay: false,
        walk: function(index, slideSettings) {
            jQuery('#background .caption').css('display', 'none');
            jQuery('#background .caption#' + (index + 1).toString()).css('display', 'block');
        }

    });
});
</script>
</body>

</html>