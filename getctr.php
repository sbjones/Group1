<?php
session_start();
//connect to the database - either include a connection variable file or
//type the following lines:
require('config.php');


$ctrid=$_REQUEST['ctrid'];
$query = "SELECT * FROM resrv WHERE ctrnum='$ctrid'";
$results = mysql_query($query)
     or die(mysql_error());
$row = mysql_fetch_array($results);
extract ($row);
?>
<HTML>
<HEAD>
<TITLE><?php echo $name ?></TITLE>
</HEAD>
<BODY>
<div align='center'>
<table width='500' cellpadding = '5'>
     <tr>
<?php
     echo "<td>IMAGE</td>";
     echo "<td>";
     echo "<strong>";
     echo $name;
     echo "</strong><br>";
     echo "Country Number: ";
     echo $ctrnum;
     echo "<br>Price: ";
     echo $price;
     echo "<br>Departure Date: ";
     echo $dep_date;
     echo "<br>Departure Time: ";
     echo $dep_time;
     echo "<br>Date Back: ";
     echo $back_date;
     echo "</td>";
?>
     </tr>

     <tr>
     <td>
       </td>
       <td><form method="POST" action="add.php">
     No. of People:
         <input type="text" name="nopass" size="2">
         <input type="hidden" name="ctrnum" value="<?php echo $ctrnum ?>">
       <input type="submit" name="Submit" value="Add to cart">
       </form>

       <form method = "POST" action="cart.php">
     <input type="submit" name="Submit" value="View cart">
       </form>
       </td>
       </tr>

</table>
<a href="flightshop.php">Go back to the main page</a>
</div>
</BODY>
</HTML>
