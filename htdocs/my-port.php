<?php
require_once("config.php");
if(!isset($_SESSION['user'])){
header('Location: login.php');
}

$userid=mysql_result(mysql_query("select sci_cust_id from $tb_user where sci_username='".$_SESSION['user']."'"),0);

$user_info_sql="select sci_fname,sci_lname from $tb_user where sci_cust_id='$userid'";
$user_info_rs=mysql_query($user_info_sql) or die(mysql_error());
$user_info_arr=mysql_fetch_assoc($user_info_rs);

$username=$user_info_arr['sci_fname']." ".$user_info_arr['sci_lname'];
$scrollheight=391;

/*if($_REQUEST['action'] == 'cancel' && $_REQUEST['reqID'] != '')
{
	$delete_requests_sql="delete from $tb_transactions where sci_approval_status='' AND sci_request_id='$reqID' AND sci_cust_id='$userid'";
	mysql_query($delete_requests_sql);
	
	header('Location: my-port.php?status=deleted');
}*/

$user_transactions_sql="select * from $tb_transactions where sci_cust_id='$userid' and sci_approval_status='ISSUED' order by sci_certficateno";
$user_transactions_rs=mysql_query($user_transactions_sql);
$user_transactions_count=mysql_num_rows($user_transactions_rs);

if($user_transactions_count > 20 && $statusmsg == 1)
{
	$enablescroll=true;
	$scrollheight=340;
}
elseif($user_transactions_count > 23)
{
	$enablescroll=true;
}

$total_shares_sql="select sum(sci_investment), sum(sci_num_share) from $tb_transactions where sci_approval_status='ISSUED'";
$total_shares_rs=@mysql_query($total_shares_sql);
$total_shares_arr=@mysql_fetch_array($total_shares_rs);

$total_num_shares=$total_shares_arr['sum(sci_num_share)'];

$user_shares_sql="select sum(sci_investment), sum(sci_num_share) from $tb_transactions where sci_cust_id='$userid' and sci_approval_status='ISSUED'";
$user_shares_rs=@mysql_query($user_shares_sql);
$user_shares_arr=@mysql_fetch_array($user_shares_rs);

$user_investments=$user_shares_arr['sum(sci_investment)'];
$user_num_shares=$user_shares_arr['sum(sci_num_share)'];
//$user_purchase_values=($user_investments / $user_num_shares) * $user_transactions_count;

if($total_num_shares > 0) $user_shares_percent=($user_num_shares / $total_num_shares) * 100;

$sql="select sci_currentvalue from $tb_ref";
$currentvalue=mysql_result(mysql_query($sql),0);
$totalcurrentvalue=$currentvalue * $user_num_shares;
$i=1;
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
function cancelrequest(requestID)
{
	var reqID = requestID;
	if(confirm('Are you sure want to cancel the request?'))
	window.location='my-port.php?action=cancel&reqID='+requestID;
}
</script>
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
             <!--  <li><a href="managemanent-pro.php"><span class="let_big">P</span>romoters</a></li> -->
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
                <li><a href="alba.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<big>A</big>lba<big>.T.K.</big> </a></li>
              </ul>
          </li>
          <li ><a href="education.php" target="_self"><span class="let_big">e</span>ducational <span class="let_big">s</span>ector</a>
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
      <h2>My Portfolio</h2>
	  <table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  <div id="port_manage_butt" style="margin-right:22px"><a href="manage-shares.php" target="_self">MANAGE SHARES</a></div>
		  <div id="port_manage_butt" style="margin-right:5px"><a href="editaccount.php" target="_self">ACCOUNT INFO</a></div>
		  </td>
        </tr>
        <tr>
          <td class="port_weltxt">Welcome <?php echo $username; ?>!</td>
        </tr>
		<tr>
            <td class="manag_less_space"></td>
        </tr>
		<tr><td>
			<table cellpadding="2" cellspacing="0" class="port_tbl_head" border="0">
			<tr>
			  <!-- dont (tr fixed width) -->
			  <td class="port_head no">No</td>
			  <td class="port_head cn">Certificate Number</td>
			  <td class="port_head pd">Purchase Date</td>
			  <td class="port_head pv">Purchase Value</td>
			  <td class="port_head ns">Number of Shares</td>
			  <td class="port_head cv">Current Value</td>
			  <td class="port_head sp">Share %</td>
			  <td style="padding:0px" width="5"></td>
			  <td width="17" rowspan="2" style="padding:0px"><?php if($enablescroll) { ?><img src="images/scroll.png" height="39" width="17" /><?php } ?></td>
			</tr>
			<tr>
			  <td colspan="3" class="port_head-2">TOTAL</td>
			  <td class="port_head-2" align="right"><?php echo number_format($user_investments, 2); ?></td>
			  <td class="port_head-2" align="right"><?php echo number_format($user_num_shares); ?></td>
			  <td class="port_head-2" align="right"><?php echo number_format($totalcurrentvalue, 2); ?></td>
			  <td class="port_head-2" align="right"><?php echo number_format($user_shares_percent, 2); ?>%</td>
			  <td style="padding:0px" width="5"></td>
			</tr>
			</table>
		</td></tr>
		
		<tr><td>
      		<div id="portfoliodiv" style="width:625px; height:<?php echo $scrollheight; ?>px<?php if($enablescroll) echo '; overflow-y:scroll'; ?>">
			<table cellpadding="2" cellspacing="0" class="port_tbl" border="0">
			<!-- portfolio content srart -->
			<?php
			while($user_transactions_arr=mysql_fetch_array($user_transactions_rs))
			{
				$user_share_percent=($user_transactions_arr['sci_num_share'] / $total_num_shares) * 100;
			?>
			<tr>
			  <td class="port_content no" align="right"><?php echo $i; ?></td>
			  <td class="port_content cn" align="left"><?php if($user_transactions_arr['sci_certficateno'] > 0) echo 'C'.$user_transactions_arr['sci_certficateno']; else echo '&nbsp;'; ?></td>
			  <td class="port_content pd"><?php if($user_transactions_arr['sci_purchase_date'] != '0000-00-00') echo strtoupper(date('d-M-Y', strtotime($user_transactions_arr['sci_purchase_date']))); else echo '&nbsp;'; ?></td>
			  <td class="port_content pv" align="right"><?php if($user_transactions_arr['sci_purchase_date'] != '0000-00-00') echo number_format($user_transactions_arr['sci_investment'], 2); else echo '&nbsp;'; ?></td>
			  <td class="port_content ns" align="right"><?php echo number_format($user_transactions_arr['sci_num_share']); ?></td>
			  <td class="port_content cv" align="right"><?php echo number_format($currentvalue * $user_transactions_arr['sci_num_share'], 2); ?></td>
			  <td class="port_content sp" align="right"><?php echo number_format($user_share_percent, 2); ?>%</td>
			</tr>
			<?php 
				$i++;
			}
			?>
		  	</table>
			</div>
		</td></tr>
	  </table>
    </div>
  </div>
  <!-- important line-->
  <div class="clear-fix"></div>
</div>
<!-- template main end -->
<!--footer-->
<?php include("footer.php"); ?>
</div>
</body>
</html>