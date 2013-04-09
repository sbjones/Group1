<?php
//connect to the database - either include a connection variable file or
//type the following lines:
require('config.php');


$query = "SELECT * FROM resrv";
$results = mysql_query($query)
     or die(mysql_error());

?>
<HTML>
<HEAD>
<TITLE>Country List</TITLE>
</HEAD>
<BODY>
<table>
     <tr>
     <td width='10%'>Country Number</td>
     <td width='20%'>Name</td>
     <td width='10%'>Price</td>
     <td width='10%'>Departure Date</td>
     <td width='10%'>Departure Time</td>
	 <td width='10%'>Back Date</td>
     </tr>
     <tr>
<?php
while ($row = mysql_fetch_array($results)) {
     extract ($row);
     echo "<td width='10%'>";
     echo $ctrnum;
     echo "</td><td width='20%'>";
     echo $name;
     echo "</td><td width='10%'>";
     echo $price;
     echo "</td><td width='10%'>";
     echo $dep_date;
     echo "</td><td width='10%'>";
     echo $dep_time;
     echo "</td><td width='10%'>";
     echo $back_date;
     echo "</td></tr>";
     }
?>

     </table>
</BODY>
</HTML>
