<?php
require_once("../config.php");
$states_sql = "select * from $tb_states where CountryID IN(".$_REQUEST['country_id'].") order by CountryID";
$states_rs = mysql_query($states_sql);

while($states_arr=mysql_fetch_array($states_rs))
{
	$states_id_name[] = $states_arr['RegionID'].'@'.iconv("ISO-8859-1", "UTF-8", $states_arr['Region']);
}
$states_id_name_str = implode("#",$states_id_name);
echo $states_id_name_str;
?>