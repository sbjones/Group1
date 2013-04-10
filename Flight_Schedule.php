<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Flight Schedule</title>
</head>
<?php
$flights = mysql_connect("141.210.25.53", "root", "george10") or die(mysql_error());
mysql_select_db("flights", $flights);
?>

 <?php
   $flight_query = "SELECT * FROM `flight_schedule`";
   $result = mysql_query($flight_query)
      or die("Invalid query: " . mysql_error());
   while( $row = mysql_fetch_array($result, MYSQL_ASSOC) ){
	?>
<body>
<h2>Flight Schedule</h2>

<div id="head">
<p>Select the origin and destination locations to check the flight schedule.
</p>
</div>
<div id="origin">
Origin: <select name="selOrigin">
	<option="selected" value="">Select Departure location</option>
    <option value="Austria">Austria</option>
    <option value="France">France</option>
    <option value="Germany">Germany</option>
    <option value="Italy">Italy</option>
	<option value="Switzerland">Switzerland</option>
    </select>  
    </div>  
 <br/>
 <br/>
<div id="destination">
Destination: <select name="selDestination">
	<option="selected" value="">Select Departure location</option>
    <option value="Austria">Austria</option>
    <option value="France">France</option>
    <option value="Germany">Germany</option>
    <option value="Italy">Italy</option>
	<option value="Switzerland">Switzerland</option>
    </select>
    </div>
    
    <script type="text/javascript">
	function check_locations()
	{
		if(document.getElementByName(selDestination).value == document.getElementsByName(selOrigin).value)
		{
			alert("The origin and destination can not be the same.");
		}
	}
    </script>
    <br/>
    <div id="Submit">
    <input type="submit" name="Submit" value="Check Schedule" onclick="check_locations()" />
    </div>
    <br/>
    
    <table border=1 width="300" cellspacing=1 cellpadding=3 bgcolor="#353535" align="center">
    <td bgcolor="#999999" colspan=2 align="center">
    Origin
    </td>
    <td bgcolor="#999999" colspan=2 align="center">
    Destination
    </td>
    <td bgcolor="#999999" colspan=2 align="center">
    Depart time
    </td>
    <td bgcolor="#999999" colspan=2 align="center">
    Arrival Time
    </td>
    <td bgcolor="#999999" colspan=2 align="center">
    Status
    </td>
    <tr bgcolor="#000000">
    	<td bgcolor="#FFFFFF">
        	
        </td>
    </tr>
    </table>
            
   
</body>
</html>
