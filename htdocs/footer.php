<div id="footer">
    <!-- quick link start -->
    <div class="footer-class">
        <div class="footer-link2" style="padding-left:5px;">
            <br /><a href="press.php">Press Room</a><a href="foundation.php">Foundations</a><a href="partnership.php">Partnerships</a><a href="portfolio.php">Portfolio</a><a href="privacy.php">Privacy Policy</a><a href="sitemap.php">Site Map</a></div>
        <!-- quick link end -->
        <!-- register link start -->
        <div class="footer-link3">
            <br />
            <?php if(isset($_SESSION['user'])){ ?>
            <a href="my-port.php" target="_self">My Portfolio</a> | <a href="logout.php" target="_self">Logout</a>
            <?php } else { ?>
            <a href="login.php" target="_self">Members Login</a> | <a href="register.php" target="_self">Register</a>
            <?php } ?>
        </div>
    </div>
    <!--<div class="address">	<br />20/21 Conran Smith Road, B7, Gopalapuram, Chennai-600086, India | Tel: +91-9500006705 | Fax: +91-44-42144980<br />
Copyright &copy; 2010 SCIMORES Corporation</div>-->
    <div class="address">
        <br/> 8250 Westpark Drive, #461, McLean, VA-22102, USA | Tel: +1-(732) 397-0766 | Email: info@scimores.com
        <br/> Copyright &copy; 2010 SCIMORES Corporation</div>
    <div class="clear-fix"></div>
</div>
<!-- register link end -->
</div>