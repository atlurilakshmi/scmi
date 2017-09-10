<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}

if($_REQUEST['action'] == 'delete' && $_REQUEST['resultid'] != '' && $_REQUEST['resultfile'] != '')
{
	$delete_result_sql="DELETE FROM sci_comp_results WHERE sci_results_id='$resultid'";
	mysql_query($delete_result_sql);
	
	unlink("../pdf82e3c4A/".$resultfile);
}

$comp_results_sql = "SELECT * FROM sci_comp_results";
$comp_results_rs = mysql_query($comp_results_sql);
$comp_results_num = mysql_num_rows($comp_results_rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
    <table cellpadding="3" cellspacing="0" width="500">
        <tr>
          <td colspan="5" align="right">
		  <a href="addresult.php" target="_self">ADD</a>
		  </td>
        </tr>
		<tr><td colspan="5"><div class="err_msg"><?php echo $statusmsg; ?></div></td></tr>
		<?php if($comp_results_num > 0) { ?>
        <tr>
          <td>S No</td>
          <td>Result Type</td>
          <td>Quarter</td>
          <td>Year</td>
		  <td>Action</td>
        </tr>
		<?php } else { ?>
		<tr><td colspan="5"><div id="errmsg" class="err_msg">No records found.</div></td></tr>
        <?php }
		while($comp_results_arr=mysql_fetch_array($comp_results_rs))
		{
			$i++;
		?>
        <tr>
          <td class="port_content" align="center"><?php echo $i; ?></td>
          <td class="port_content" align="left"><?php echo $comp_results_arr['sci_results_type']; ?></td>
          <td class="port_content" align="left"><?php echo $comp_results_arr['sci_quarter']; ?></td>
          <td class="port_content" align="left"><?php echo $comp_results_arr['sci_year']; ?></td>
		  <td class="port_content" align="center">
			<a href="editresult.php?resultid=<?php echo $comp_results_arr['sci_results_id']; ?>">Edit</a> <a href="companyresults.php?action=delete&resultid=<?php echo $comp_results_arr['sci_results_id']; ?>&resultfile=<?php echo $comp_results_arr['sci_result_file']; ?>" onclick="return confirm('Are you sure want to delete this result?');">Delete</a>
		  </td>
        </tr>
        <?php
		}
		?>
    </table>
	<div class="clearfix"></div>
</div>
</body>
</html>