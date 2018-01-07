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
    <style type="text/css">
    .button {
        background-color: #C0C0C0;
        color: black;
        border: none;
        padding: 3px 6px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 6px 3px;
        font-weight: bold;
        width: 104px;
        margin-bottom: 0;
        cursor: pointer;
    }

    .new-btn-format a {
        float: left;
    }

    .btn-4 {
        margin-left: 110px;
    }
    .school_backdrop{
            background: #0d0d0d url(images/current-profiles/14.png) top center no-repeat;
    }
    body{
        position: relative;
    }
    body::after {
        display: block;
        position: absolute;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.03) 0, #000 100%);
        height: 150px;
        width: 100%;
        content: '';
        bottom: 55px;
    } 
    </style>
</head>

<body>
    <div class="school_backdrop">
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
                    <h2>EDUCATIONAL SECTOR: CURRENT PROJECTS</h2>
                    <h3>SCIMORES ACADEMY FOR ARTS AND MUSIC</h3>
                    <div>
                        <div class="intl-school_img_wrapper">
                            <div class="intl-school_img">
                                <a href="scimoresacademy.php" target="_blank" title="ScimoresAcademy">
                            <img src="images/current-profiles/14.png" alt="ACADEMY" id="academy"></a>
                            </div>
                           <!-- <div class="new-btn-format">
                                <a href="scimoresacademy.php" target="_blank" title="ScimoresAcademy">
                                    <input type="button" class="button" value="VISIT WEBSITE" />
                                </a>
                                   <a href="pdf/viewplan.pdf" target="_blank">
                                    <input type="button" class="button" value="VIEW PLAN" />
                                </a>
                                <a href="education.php">
                                    <input type="button" class="button" value="VIEW ALL" />
                                </a>
                            </div>
                            <a class="btn-4" href="pdf/viewEB5.pdf" target="_blank">
                                <input type="button" class="button" value="VIEW EB-5" />
                            </a>--> 
                            <div class="intl_button"><a href="scimoresacademy.php" target="_blank" title="ScimoresAcademy"><img src="images/visit-website.gif" alt="visit website" border="0" height="20"/></a>&nbsp;<a href="pdf/ScimoresAcademyBROCHURE.pdf" target="_blank" title="ScimoresAcademy"><img src="images/viewplan.gif" alt="view plan" border="0" height="20" /></a>&nbsp;<a href="education.php"><img src="images/view_all.gif" alt="view all" border="0" width="100" height="20"/></a></div>
                        
                    </div>
                    <div class="intl-school_txt"> Schools provide regular academics, Recreation Centers provide sports related activities, what’s missing is a nice academy like facility for Fine Arts & Music that has the space, ambience and environment that’s inspiring for the teachers to teach and for students to learn.
                        <br/>
                        <br/> Scimores Academy will close that gap with this state-of-the-art, and a next generation academy for Arts and Music offering 25 programs all under one roof for children from ages 4 through 18, taking into consideration – (a) what a child will need during these development years, and (b) demography of the location & neighboring areas/cities.
                    </div>
                </div>
            </div>
        </div>
        <div class="clear-fix"></div>
    </div>
    <!--dont remove this line-->
    <?php include("footer.php"); ?>
    </div>
</body>

</html>