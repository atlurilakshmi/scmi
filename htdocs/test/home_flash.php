<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>home_flash</title>
<link href="css/template_sci.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<!--url's used in the movie-->
<!--text used in the movie-->
<!-- saved from url=(0013)about:internet -->
<div class="template_home">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="100%" height="100%">
<param name="movie" value="home_flash.swf">
<param name="quality" value="high">
<param name="scale" value="showall">
<param name="allowScriptAccess" value="sameDomain">
<param name="movie" value="home_flash.swf">
<param name="menu" value="false">
<param name="wmode" value="transparent">
<embed src="home_flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="100%" height="100%"></embed>
</object><div class="clear-fix"></div></div>
<div class="clear-fix"></div>
<!-- dont remove this line -->
<div class="yellow" id="footer-home">
<!-- quick link start -->
<div class="footer-link2home"> <a href="press.php">Press Room</a><a href="foundation.php">Foundations</a><a href="partnership.php">Partnerships</a><a href="portfolio.php">Portfolio</a><a href="privacy.php">Privacy Policy</a><a href="sitemap.php">Site Map</a> </div>
<!-- quick link end -->
<!-- register link start -->
<div class="footer-link3home">
<?php if(isset($_SESSION['user'])){ ?>
<a href="logout.php" target="_self">Logout</a> | <a href="my-port.php" target="_self">My Portfolio</a>
<?php } else { ?>
<a href="login.php" target="_self">Members Login</a> | <a href="register.php" target="_self">Register</a></div>
<?php } ?>
<div class="address">20/21 Conran Smith Road, B7, Gopalapuram, Chennai-600086, India | Tel: +91-9500006705 | Fax: +91-44-42144980<br />
Copyright  © 2009 Scimores Corporation</div>
<!-- register link end -->
</div>
</body>
</html>
