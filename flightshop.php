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
<TITLE>Euro-Travel Flight Purchase List</TITLE>
</HEAD>
<BODY>
<div align='center'>
Thanks for visiting our site! Please see our list of awesome
flights below, and click on the link for more information:
<br><br>
<table width='575'>
     <tr>
<?php

// Show only Name, Price and Image
while ($row = mysql_fetch_array($results)) {
     extract ($row);
     echo "<td>";
     echo "<img src='" . $ctrnum .".png' alt='THUMBNAIL IMAGE' width='72' height='43'></td>";
     echo "<td>";
     echo "<a href = 'getctr.php?ctrid=" . $ctrnum ."'>";
     echo $name;
     echo "</td></a>";
     echo "<td>";
     echo "<a href = 'getctr.php?ctrid=" . $ctrnum ."'>";
     echo $price;
     echo "</td></a>";
     echo "<td>";
     echo "<a href = 'getctr.php?ctrid=" . $ctrnum ."'>";
     echo $dep_date;
     echo "</td></a>";
     echo "<td>";
     echo "<a href = 'getctr.php?ctrid=" . $ctrnum ."'>";
     echo $dep_time;
     echo "</td></a>";
     echo "<td>";
     echo "<a href = 'getctr.php?ctrid=" . $ctrnum ."'>";
     echo $back_date;
     echo "</td></a></tr>";
     }

?>

     </table>
     </div>
</BODY>
</HTML>
