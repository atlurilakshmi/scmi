<?php
require_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SCIMORES Corporation</title>
    <link href="css/template_sci.css" rel="stylesheet" type="text/css" />
    <link href="css/labels-font.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
    <link href="css/style3.css" rel="stylesheet" type="text/css" />
    <link href="css/vegas.css" rel="stylesheet" type="text/css" />
    <link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
    <link href="css/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
     <link href="http://allfont.net/allfont.css?fonts=agency-fb" rel="stylesheet" type="text/css" />
    <link href="css/default.css" media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddaccordion.js"></script>
    <script type="text/javascript" src="js/vegas.js"></script>
    <style type="text/css">
    @font-face {
       font-family: 'Agency FB', arial;
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
        font-family: 'Agency FB', arial;
        padding-right: 0px;
    }

    .health-label {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 15.5px;
    }

    .health-label-1 {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 16px;
    }

    .health-label-3 {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 16.4px
    }

    .city-first-letter {
        color: #f3f0f0;
        font-size: 23px
    }

    .city {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 19px;
        margin-left: -5px
    }

    .end-help-text {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 14.5px
    }

    .end-help-text-1 {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 14px
    }

    .end-help-text-2 {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 14.4px
    }

    .end-help-text-3 {
        color: #f3f0f0;
        font-family: "Times New Roman";
        font-weight: lighter;
        font-size: 14.4px
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
            <div class="parent">
                <div class="img">
                    <img class="image-class img1" id="image-head" src="./images/shutterstock.jpg"></img>
                </div>
                <!-- First text message -->
                <div id="msg">
                    <div class="text-container">
                        <span class="gold-label">  Gold Lip</span>
                        <span class="health-label-1">Health & Fitness Center </span>
                        <br>
                        <div style="text-align:center"><span class="city-first-letter">C </span><span class="city">HENNAI</span></div>
                        <span class="end-help-text">In Planning Phase. Click the below icon</span>
                        <br>
                        <span class="end-help-text-1">to view the Plan.</span>
                    </div>
                </div>
                <!--dont remove this line-->
                <div class="menu">
                    <div class="menu-item">
                        <span class="txt1">C</span>
                        <span class="txt2">HENNAI</span>
                        <a href="goldlip.php">
                                <img class="menu-images" src="images/goldlip_thumb.jpg">
                            </a>
                    </div>
                    <div class="menu-item">
                        <span class="txt1">C</span>
                        <span class="txt2">HENNAI</span>
                        <a href="intl-school.php">
                                <img class="menu-images" src="images/intl_thumb.jpg">
                            </a>
                    </div>
                    <div class="menu-item">
                        <span class="txt1">H</span>
                        <span class="txt2">ERNDON</span>
                        <a href="intl-school.php">
                                <img class="menu-images" src="images/auditorium-thumb.jpg">
                            </a>
                    </div>
                </div>
                <div class="clear-fix"></div>
                <!-- template main end -->
            </div>
            <div class="footer">
                <TABLE cellSpacing=0 cellPadding=0 width="100%" bgcolor="#0d0d0d">
                    <TBODY>
                        <TR>
                            <TD style="PADDING-LEFT: 52px" vAlign=center align=center width="65%">
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
                        </TR>
                        <TR>
                            <TD colspan="2">
                                <div class="address">
                                    <br/> 8250 Westpark Drive, #461, McLean, VA-22102, USA | Tel: +1-(732) 397-0766 | Email: info@scimores.com
                                    <br/> Copyright &copy; 2010 SCIMORES Corporation</div>
                            </TD>
                        </TR>
                    </TBODY>
                </TABLE>
            </div>
            <!--footer-->
            <script type="text/javascript">
            var msg1 = '<div id="msg" class="text-container">';
            msg1 += ' <span class="gold-label">  Gold Lip </span>';
            msg1 += '<span class="health-label-1"> Health & Fitness Center </span>';
            msg1 += '<br>';
            msg1 += '<div style="text-align:center"><span class="city-first-letter">C </span><span class="city">HENNAI</span></div>';
            msg1 += '<span class="end-help-text">In Planning Phase. Click the below icon</span>';
            msg1 += '<br>';
            msg1 += '<span class="end-help-text-1">to view the Plan.</span>';
            msg1 += '</div>';

            var msg2 = '<div id="msg" class="text-container">';
            msg2 += '<span class="health-label-3"><span style="font-weight:400">SCIMORES</span> International School</span>';
            msg2 += '<br>';
            msg2 += '<div style="text-align:center"><span class="city-first-letter">C </span><span class="city">HENNAI</span></div>';
            msg2 += '<span class="end-help-text-3">In Planning Phase. Will be publishing</span>';
            msg2 += '<br>';
            msg2 += '<span class="end-help-text">the plan very soon.</span>';
            msg2 += '</div>';

            var msg3 = '<div id="msg" class="text-container">';
            msg3 += '<span class="health-label"><span style="font-weight:400">SCIMORES</span> Academy for Arts & Music</span>';
            msg3 += '<br>';
            msg3 += '<div style="text-align:center"><span class="city-first-letter">H </span><span class="city">erndon, VA</span></div>';
            msg3 += '<span class="end-help-text-2">In Pre-Construction Phase. Click the below</span>';
            msg3 += '<br>';
            msg3 += '<span class="end-help-text"> icon to view the Plan/Brochure.</span>';
            msg3 += '</div>';
            var text1 = '<h1 style= "position:absolute; right:20px ;color: yellow"></h1>';
            var text2 = '<h1 style= "position:absolute; right:20px ;color: yellow"></h1>';
            var text3 = '<h1 style= "position:absolute; right:20px ;color: yellow"></h1>';

            var text = [msg1, msg2, msg3];
            var images = ['./images/shutterstock_1.jpg', './images/auditorium.png', './images/shutterstock.jpg'];
            var classes = ['img1', 'img2', 'img3'];
            var imageHead = document.getElementById("image-head");
            var i = 0;

            setInterval(function() {
                $('#image-head').attr('src', images[i]);
                $('#image-head').removeClass(classes[i]);
                i = i + 1;
                if (i == images.length) {
                    i = 0;
                }
                var elem = document.getElementById("msg");

                $('#image-head').addClass(classes[i]);
                elem.innerHTML = text[i];
            }, 5000);
            </script>
</body>

</html>