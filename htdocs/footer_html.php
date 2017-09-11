<?php 
require_once("config.php");
?>
<link href="css/template_sci.css" rel="stylesheet" type="text/css"  />
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/dropdown.vertical.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/default.css" media="all" rel="stylesheet" type="text/css" />
<div id="footer">
	<!-- quick link start -->
	<div class="footer-link2"> <a href="press.php">Press Room</a><a href="foundation.php">Foundations</a><a href="partnership.php">Partnerships</a><a href="portfolio.php">Portfolio</a><a href="privacy.php">Privacy Policy</a><a href="sitemap.php">Site Map</a></div>
  	<!-- quick link end -->
  	<!-- register link start -->
  	<div class="footer-link3">
		<?php if(isset($_SESSION['user'])){ ?>
  		<a href="logout.php" target="_parent">Logout</a> | <a href="my-port.php" target="_parent">My Portfolio</a>
		<?php } else { ?>
		<a href="login.php" target="_parent">Members Login</a> | <a href="register.php" target="_parent">Register</a>
		<?php } ?>
	</div>
	<!--<div class="address">20/21 Conran Smith Road, B7, Gopalapuram, Chennai-600086, India | Tel: +91-9500006705 | Fax: +91-44-42144980<br />
    Copyright &copy; 2009 Scimores Corporation</div>-->
    <div class="address"> <br/> 8250 Westpark Drive, #461, McLean, VA-22102, USA | Tel: +1-(732) 397-0766 | Email: hb01@scimores.com <br/>
     Copyright &copy; 2010 SCIMORES Corporation</div>
  <!-- register link end -->
</div>