<div id="footer">
	<!-- quick link start -->
	<div class="footer-link2"> <a href="press.php">Press Room</a><a href="foundation.php">Foundations</a><a href="partnership.php">Partnerships</a><a href="portfolio.php">Portfolio</a><a href="privacy.php">Privacy Policy</a><a href="sitemap.php">Site Map</a></div>
  	<!-- quick link end -->
  	<!-- register link start -->
  	<div class="footer-link3">
		<?php if(isset($_SESSION['sciadmin'])){ ?>
  		<a href="adminhome.php" target="_self">Admin Home</a> | <a href="logout.php" target="_self">Logout</a>
		<?php } else { ?>
		<a href="login.php" target="_self">Admin Login</a> | <a href="register.php" target="_self">Register</a>
		<?php } ?>
	</div>
	<div class="address">20/21 Conran Smith Road, B7, Gopalapuram, Chennai-600086, India | Tel: +91-9500006705 | Fax: +91-44-42144980<br />
    Copyright &copy; 2009 Scimores Corporation</div>
  <!-- register link end -->
</div>