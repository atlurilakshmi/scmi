<?php
require_once("config.php");

$code = $_REQUEST['code'];
if(strlen($code) == 10)
{
	$check_actcode_sql = "SELECT * FROM $tb_user WHERE sci_status<>'DECLINED' AND sci_actcode='$code'";
	$check_actcode_rs = mysql_query($check_actcode_sql);
	$actcode_exists = mysql_num_rows($check_actcode_rs);
	
	if($actcode_exists > 0)
	{	
		$actdate=date('Y-m-d H:i:s');
		$activateuser_sql = "UPDATE $tb_user SET sci_actdate='$actdate', sci_status='ACTIVE' WHERE sci_status='APPROVED' AND sci_actcode='$code'";
		mysql_query($activateuser_sql);
		$activateuser_status = mysql_affected_rows();
		
		if($activateuser_status > 0)
			$actstatus = 1;
		else
			$actstatus = 2;
	}
	else
	{
		$actstatus = 3;
	}
}
else
{
	$actstatus = 3;
}
echo $actstatus;
?>