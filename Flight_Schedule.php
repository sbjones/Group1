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
</body>
</html>
