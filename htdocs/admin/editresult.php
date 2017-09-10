<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}

$comp_result_sql="select * from sci_comp_results where sci_results_id='$resultid'";
$comp_result_rs=mysql_query($comp_result_sql);
$comp_result_arr=mysql_fetch_array($comp_result_rs);

$resulttype=$comp_result_arr['sci_results_type'];
$quarter=$comp_result_arr['sci_quarter'];
$year=$comp_result_arr['sci_year'];

if($quarter == 'First') $quarternum = 1;
if($quarter == 'Second') $quarternum = 2;
if($quarter == 'Third') $quarternum = 3;
if($quarter == 'Fourth') $quarternum = 4;

if($resulttype == 'Quarterly')
$resultfilename='FY '.$year.' Q'.$quarternum.'.pdf';
elseif($resulttype == 'Annual')
$resultfilename='A'.'-'.$year.'.pdf';

if(isset($_REQUEST['submit_x']))
{
	if($_FILES['resultfile']['name']==""){$flag=2;$errmsg="Please browse Results File";}
	elseif($_FILES['resultfile']['type']!="application/pdf"){$flag=2;$errmsg="File type must be PDF only";}
	
	if($flag!=2)
	{
		$resultfiletmpname = $_FILES["resultfile"]["tmp_name"];
        //$resultfilename = $_FILES["resultfile"]["name"];
        move_uploaded_file($resultfiletmpname, "../../pdf82e3c4A/".$resultfilename);
		header('Location: companyresults.php');
	}
}
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
      <form name="companyresults" id="companyresults" method="post" enctype="multipart/form-data">
        <table border="0" align="left" cellpadding="5" cellspacing="0" class="regiester-tbl">
		  <tr>
            <td colspan="2"><div id="errmsg" class="err_msg"><?php echo $errmsg; ?></div></td>
          </tr>
          <tr>
            <td>Result Type :</td>
            <td>
			  <select name="resulttype" size="1" class="list_1" disabled="disabled">
			  	<option value="">Select</option>
                <option value="Quarterly" <?php if($resulttype == 'Quarterly') echo 'selected'; ?>>Quarterly</option>
				<option value="Annual" <?php if($resulttype == 'Annual') echo 'selected'; ?>>Annual</option>
              </select>
			</td>
          </tr>
		  <?php if($resulttype == 'Quarterly') { ?>
          <tr>
            <td>Quarter :</td>
            <td>
			  <select name="quarter" size="1" class="list_1" disabled="disabled">
			  	<option value="">Select</option>
                <option value="First" <?php if($quarter == 'First') echo 'selected'; ?>>First</option>
				<option value="Second" <?php if($quarter == 'Second') echo 'selected'; ?>>Second</option>
				<option value="Third" <?php if($quarter == 'Third') echo 'selected'; ?>>Third</option>
				<option value="Fourth" <?php if($quarter == 'Fourth') echo 'selected'; ?>>Fourth</option>
              </select>
			</td>
          </tr>
		  <?php } ?>
		  <tr>
            <td>Year :</td>
            <td>
			  <select name="year" size="1" class="list_1" disabled="disabled">
			  	<option value="">Select</option>
                <?php for($i=2009;$i<=2050;$i++) { $financialyear = $i.'-'.($i+1); ?>
                <option value="<?php echo $financialyear; ?>" <?php if($financialyear == $year) echo 'selected'; ?>><?php echo $financialyear; ?></option>
                <?php } ?>
              </select>
			</td>
          </tr>
		  <tr>
            <td>PDF File :</td>
            <td>
			  <input type="file" name="resultfile" /> <?php echo $resultfilename; ?>
			</td>
          </tr>
		  
          <tr>
            <td><input name="submit" type="image" src="../images/submit.png" alt="" value="Submit" /></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2" class="manag_space"></td>
          </tr>
        </table>
      </form>
	<div class="clearfix"></div>
</div>
</body>
</html>