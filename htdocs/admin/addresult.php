<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}

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
	$comp_result_sql="select * from sci_comp_results where sci_results_type='$resulttype' and sci_quarter='$quarter' and sci_year='$year'";
	$comp_result_rs=mysql_query($comp_result_sql);
	$comp_result_num=mysql_num_rows($comp_result_rs);
	
	if($resulttype==""){$flag=2;$errmsg="Please select Result Type";}
	elseif($resulttype=="Quarterly" && $quarter==""){$flag=2;$errmsg="Please select Quarter";}
	elseif($year==""){$flag=2;$errmsg="Please select Year";}
	elseif($comp_result_num > 0){$flag=2;$errmsg="Results File exists for the selected criteria";}
	elseif($_FILES['resultfile']['name']==""){$flag=2;$errmsg="Please browse Results File";}
	elseif($_FILES['resultfile']['type']!="application/pdf"){$flag=2;$errmsg="File type must be PDF only";}
	
	if($flag!=2)
	{
		$comp_result_ins="insert into sci_comp_results(sci_results_type, sci_quarter, sci_year, sci_result_file) values('$resulttype', '$quarter', '$year', '$resultfilename')";
		mysql_query($comp_result_ins);
		
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
<script language="javascript" type="text/javascript">
function togglequarter(value)
{
	if(value=='Quarterly')
	{
		document.companyresults.quarter.disabled=false;
	}
	if(value=='Annual')
	{
		document.companyresults.quarter.options[0].selected=true;
		document.companyresults.quarter.disabled="disabled";
	}
}
</script>
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
			  <select name="resulttype" size="1" class="list_1" onchange="togglequarter(this.value);">
			  	<option value="">Select</option>
                <option value="Quarterly" <?php if($resulttype == 'Quarterly') echo 'selected'; ?>>Quarterly</option>
				<option value="Annual" <?php if($resulttype == 'Annual') echo 'selected'; ?>>Annual</option>
              </select>
			</td>
          </tr>
          <tr>
            <td>Quarter :</td>
            <td>
			  <select name="quarter" size="1" class="list_1">
			  	<option value="">Select</option>
                <option value="First" <?php if($quarter == 'First') echo 'selected'; ?>>First</option>
				<option value="Second" <?php if($quarter == 'Second') echo 'selected'; ?>>Second</option>
				<option value="Third" <?php if($quarter == 'Third') echo 'selected'; ?>>Third</option>
				<option value="Fourth" <?php if($quarter == 'Fourth') echo 'selected'; ?>>Fourth</option>
              </select>
			</td>
          </tr>
		  <tr>
            <td>Year :</td>
            <td>
			  <select name="year" size="1" class="list_1">
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
			  <input type="file" name="resultfile" />
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