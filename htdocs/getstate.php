<?php
require_once("config.php");
$country_arr = getCountryInfo($tb_countries, $_REQUEST['country_id']);
$country_name = $country_arr['Country'];

$states_sql = "select * from $tb_states where CountryID = ".$_REQUEST['country_id']." and Region <>'".$country_name."'";
$states_rs = mysql_query($states_sql);
$states_num = mysql_num_rows($states_rs);

while($states_arr=mysql_fetch_array($states_rs))
{
	$states_id_name[] = $states_arr['RegionID'].'@'.iconv("ISO-8859-1", "UTF-8", $states_arr['Region']);
}
$states_id_name_str = @implode("#",$states_id_name);
if($states_num == 0) $states_id_name_str = '9999'.'@'.'Not Applicable';
echo $states_id_name_str;
?>