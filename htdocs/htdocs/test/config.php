<?php
	ob_start();
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	set_time_limit(600);
	//echo "config file";
	######### database setting ###############

	$db_host ="205.178.146.82";////"205.178.146.80";
	$db_name = "scimores_testdb";////"scimores_db";
	$db_user = "hbalasundaram";////"hbalasun";
	$db_pass = "Password123";//"Password123";
	$tb_prefix = "sci_";
	
	############## Databese connection #########
	
	$g_link = @mysql_connect($db_host,$db_user,$db_pass);
	@mysql_select_db($db_name, $g_link) or die('Could not select database.');
	
	############ end database setting ###########



	if(!empty($_GET)) extract($_GET);
	if(!empty($_POST)) extract($_POST);
	
	global $base_path,$base_url,$admin_path,$admin_tpl_path,$admin_url;
	
	$base_url = "http://test.scimores.com";
	$tb_admin     = $tb_prefix."admin";
	$tb_user     = $tb_prefix."cust_info";
	$tb_transactions = $tb_prefix."transactions";
	$tb_ref		 = $tb_prefix."reference";
	$tb_countries	= $tb_prefix."countries";
	$tb_states		= $tb_prefix."states";
	$tb_cities		= $tb_prefix."cities";
	$approvalurl = $base_url."/register_approval.php";

	############## START MAIL FUNCTION ###############

function sendHTMLemail($HTML,$from,$to,$subject){
	$headers = "MIME-Version: 1.0\r\n"; 
 	$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: $from\r\n"; 
    @mail($to, $subject, $HTML, $headers); 
}


############## END MAIL FUNCTION ###############


############## START PAGE NAVIGATION FUNCTION ###############
 function page_navigation($totalrecord,$pagesize,$file_name,$startdata){
	/*echo "total rec".$totalrecord;
	echo "<br>page siz".$pagesize;
	echo "<br>file".$file_name;
	echo "<br>start".$startdata;
	*/
	$noofpages=$totalrecord/$pagesize;
	if (!isset($startdata))
	$startdata=0;
	else
	$startdata=$startdata;
	$count=$startdata;
	
	
	/* Page Navigation Next Previous Starts here */
		if($startdata<>0){
			$prev=$startdata-$pagesize;
			$page_prev = "<a href=\"$file_name?startdata=".$prev."\" style=\"text-decoration:none\">
			<span style=\"color:#006699;\"><b>&laquo;&nbsp;Prev</b></span></a>&nbsp;&nbsp;";
			$startdat=$prev;
			
		}
		for ($i=0;$i<$noofpages;$i++){
			$pageno=$i+1; $j=($pagesize*$pageno)-$pagesize;
		
			if ($startdata==0 && $i==0) { 
			$page_no .= "<span style=\"color:#ffffff;padding:3px;border:1px 
			solid #006699;background-color:#006699;margin-right:2px;\"> ".$pageno."</span> </b> "; 
			}
			else{
				if($startdata == ($pagesize*($pageno))-$pagesize){
							   $page_no .= "
							   <span style=\"color:#ffffff;padding:3px;border:1px 
							   solid #006699;background-color:#006699;margin-right:2px;\"> ". $pageno."</span> ";
				}
        		else{
                $page_no .=  "<span style=\"color:#ff0000;padding:3px;border:1px solid #006699;margin-right:2px;\"> 
				<a href='$file_name?startdata=".$j."&current_page=".$i."' style=\"text-decoration:none\">
				<span style=\"color:#333;\">".$pageno."</span></a> </span>";
				$startdat=$j;
            	}
            }
		}
			if($startdata+$pagesize<$totalrecord){
				$next=$startdata+$pagesize;
				$page_next = "&nbsp;&nbsp;<a href='$file_name?startdata=".$next."' 
				style=\"text-decoration:none\"><span style=\"color:#006699;\"><b>Next&nbsp;&raquo;</b></span> </a>";
				$startdat=$next;
			}
			$page_navigation = $page_prev.$page_no.$page_next;
			 
			 return  $page_navigation;
  }

############## END PAGE NAVIGATION FUNCTION ###############
############## FORM VALIDATION ###############
function notvaliduname($username)
{
	//$username = "user_name12";
	if (!preg_match('/^[a-z\d_]{1,25}$/i', $username)) {
		return true;
	} else {
		return false;
	}
}
function isnotValidEmail($email){
      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
     
      if (!eregi($pattern, $email)){
         return true;
      }else {
         return false;
      }   
   }
   
  function nothomephone($phone){
  //$phone = "(021)423-2323";
	if (!preg_match('/\(?\d{3}\)?[-\s.]?\d{3}[-\s.]\d{4}/x', $phone)) {
		return true;
	} else {
		return false;
	}
  }
  function notmobilephone($phone){
  //$phone = "(021)423-2323";
	if (!preg_match('/\9?\d{10,12}/x', $phone)) {
		return true;
	} else {
		return false;
	}
  }
  
  function notnumeric($num){  
  if (!ereg("^[[:digit:]]+$", $num)) {
return true;
} 
  }
  
  
  function nonrepeat($min,$max,$count){
  $nonrepeatarray = array();
   for($i = 0; $i < $count; $i++) {
      $rand = rand($min,$max);
        while(in_array($rand,$nonrepeatarray)) {
        $rand = rand($min,$max);
      }
      
      //add it to the array
      $nonrepeatarray[$i] = $rand;
   }
   return $nonrepeatarray;
  }
  
function getCountryInfo($tb_countries, $country_id)
{
	$country_sql = "select * from $tb_countries where CountryId = ".$country_id;
	$country_rs = mysql_query($country_sql);
	$country_arr = @mysql_fetch_array($country_rs);
	return $country_arr;
}

function getStateInfo($tb_states, $state_id)
{
	if($state_id == 9999)
	{
		$state_arr['Region'] = 'Not Applicable';
	}
	else
	{
		$state_sql = "select * from $tb_states where RegionID = ".$state_id;
		$state_rs = mysql_query($state_sql);
		$state_arr = @mysql_fetch_array($state_rs);
	}
	return $state_arr;
}

function getCityInfo($tb_cities, $city_id)
{
	if($city_id == 99999)
	{
		$city_arr['City'] = 'Not Applicable';
	}
	else
	{
		$city_sql = "select * from $tb_cities where CityId = ".$city_id;
		$city_rs = mysql_query($city_sql);
		$city_arr = @mysql_fetch_array($city_rs);
	}
	return $city_arr;
}

function getAdminEmailAddress($tb_admin)
{
	$admin_sql = "select sci_admin_email from $tb_admin";
	$admin_rs = mysql_query($admin_sql);
	$admin_arr = @mysql_fetch_array($admin_rs);
	return $admin_arr['sci_admin_email'];
}
?>