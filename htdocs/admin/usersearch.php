<?php
require_once("../config.php");
if(!isset($_SESSION['sciadmin'])){
header('Location: login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the SCIMORES Admin Panel!</title>
<link href="css/admin.css" rel="stylesheet" type="text/css"  />
<script language="javascript" type="text/javascript" src="../js/prototype/prototype.js"></script>
<script language="javascript" type="text/javascript">
function showstate(countryID)
{
	var countrieslength=document.usersearch.elements['country[]'].length;
	var selectedcountriesstr=new Array();
	var selectedcountriesIndex = 0;
	for(var k=0; k<countrieslength; k++)
    {
		if(document.usersearch.elements['country[]'][k].selected==true)
		{
			selectedcountriesstr[selectedcountriesIndex] = document.usersearch.elements['country[]'][k].value;
			selectedcountriesIndex++;
		}
    }

	var stateslength = document.getElementById('state').options.length;
	for(var i=stateslength-1;i>=0;i--)
	{
		document.getElementById('state').remove(i);
	}
	
	var citieslength = document.getElementById('city').options.length;
	for(var j=citieslength-1;j>=0;j--)
	{
		document.getElementById('city').remove(j);
	}
	
	if(selectedcountriesstr != '')
	{
		new Ajax.Request("getstatemultiple.php?country_id="+escape(selectedcountriesstr)+"&sid="+Math.random(), { method: 'get', onSuccess: function(response)
		{
			var states_id_name_str = response.responseText;
			states_id_name_str = states_id_name_str.replace(/"/g, '');
			states_id_name_str = states_id_name_str.replace(/^\s*|\s*$/g,'');
			states_arr = states_id_name_str.split('#');
			for(var x=0; x<states_arr.length; x++)
			{
				state_arr = states_arr[x].split("@");
				var optn = document.createElement("OPTION");
				optn.text = state_arr[1];
				optn.value = state_arr[0];
				document.getElementById('state').options.add(optn);
			}
		}});
	}
}

function showcity(stateID)
{
	var stateslength=document.usersearch.elements['state[]'].length;
	var selectedstatesstr=new Array();
	var selectedstatesIndex = 0;
	for(var k=0; k<stateslength; k++)
    {
		if(document.usersearch.elements['state[]'][k].selected==true)
		{
			selectedstatesstr[selectedstatesIndex] = document.usersearch.elements['state[]'][k].value;
			selectedstatesIndex++;
		}
    }
	
	var citieslength = document.getElementById('city').options.length;
	for(var j=citieslength-1;j>=0;j--)
	{
		document.getElementById('city').remove(j);
	}
	
	if(selectedstatesstr != '')
	{
		new Ajax.Request("getcitymultiple.php?state_id="+selectedstatesstr+"&sid="+Math.random(), { method: 'get', onSuccess: function(response)
		{
			var cities_id_name_str = response.responseText;
			cities_id_name_str = cities_id_name_str.replace(/"/g, '');
			cities_id_name_str = cities_id_name_str.replace(/^\s*|\s*$/g,'');
			cities_arr = cities_id_name_str.split('#');
			for(var x=0; x<cities_arr.length; x++)
			{
				city_arr = cities_arr[x].split("@");
				var optn = document.createElement("OPTION");
				optn.text = city_arr[1];
				optn.value = city_arr[0];
				document.getElementById('city').options.add(optn);
			}
		}});
	}
}
</script>
</head>

<body>
<?php include("header.php"); ?>
<div id="content_wrapper">
      <form name="usersearch" id="usersearch" action="usersearch_result.php" method="get">
        <table border="0" align="left" cellpadding="5" cellspacing="0" class="regiester-tbl">
          <tr>
            <td width="167">Username :</td>
            <td width="213"><input name="susername" id="uname" type="text" class="input_4" maxlength="12" value="<?php echo $susername; ?>"/>
			</td>
          </tr>
          <tr>
            <td>First Name :</td>
            <td><input name="firstname" id="fname" type="text" class="input_4" maxlength="30" value="<?php echo $firstname; ?>"/>
			</td>
          </tr>
          <tr>
            <td>Last Name :</td>
            <td><input name="lastname" id="lname" type="text" class="input_4" maxlength="30" value="<?php echo $lastname; ?>"/>
			</td>
          </tr>
          <tr>
            <td>Email Address :</td>
            <td><input name="email" id="email" type="text" class="input_4" maxlength="50" value="<?php echo $email; ?>"/>
			</td>
          </tr>
		  
		  <tr>
            <td>Country :</td>
            <td>
			  <select name="country[]" id="country" size="5" class="list_4" onchange="showstate(this.value);" multiple>
				<?php
                $countries_sql = "select * from $tb_countries where Country <>'World'";
				$countries_rs = mysql_query($countries_sql);
				while($countries_arr=@mysql_fetch_array($countries_rs))
				{
				?>
				<option value="<?php echo $countries_arr['CountryId']; ?>"><?php echo iconv("ISO-8859-1", "UTF-8", $countries_arr['Country']); ?></option>
				<?php
				}
				?>
              </select>
			</td>
          </tr>
		  
		  <tr>
            <td>State/Province :</td>
            <td>
				<select name="state[]" id="state" size="5" class="list_4" onchange="showcity(this.value);" multiple>
				</select>
			</td>
          </tr>
		  
          <tr>
            <td>City :</td>
            <td>
				<select name="city[]" id="city" size="5" class="list_4" multiple>
				</select>
			</td>
          </tr>
         
          <tr>
            <td>Zip or Postal Code :</td>
            <td><input name="zipcode" id="zipcode" type="text" class="input_4" maxlength="8" value="<?php echo $zipcode; ?>"/>
			</td>
          </tr>
		  
		  <tr>
            <td>Status :</td>
            <td>
				<select name="status" id="status" size="1" class="list_4">
				<option value="">Select Status</option>
				<option value="ACTIVE">ACTIVE</option>
				<option value="APPROVED">APPROVED</option>
				<option value="DECLINED">DECLINED</option>
				<option value="PENDING">PENDING</option>
				</select>
			</td>
          </tr>
		  
		  <tr>
            <td colspan="2" class="manag_space"></td>
          </tr>
          <tr>
            <td><input name="submit" type="image" src="../images/submit.png" alt="" value="Search" /></td>
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