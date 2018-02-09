<?php
require_once("config.php");

$cities_sql = "select * from $tb_cities where RegionID = ".$_REQUEST['state_id'];
$cities_rs = mysql_query($cities_sql);
$cities_num = mysql_num_rows($cities_rs);

while($cities_arr=mysql_fetch_array($cities_rs))
{
	$cities_id_name[] = $cities_arr['CityId'].'@'.iconv("ISO-8859-1", "UTF-8", $cities_arr['City']);
}
$cities_id_name_str = @implode("#",$cities_id_name);
if($cities_num == 0) $cities_id_name_str = '99999'.'@'.'Not Applicable';
echo $cities_id_name_str;
?>