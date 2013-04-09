<?php
session_id();
session_start();
//connect to the database
require('config.php');

?>
<HTML>
<HEAD>
<TITLE>Here is Your Shopping Cart!</TITLE>
</HEAD>
<BODY>
<div align="center">
You currently have

<?php
$sessid = session_id();

//display number of products in cart
     $query = "SELECT * from carttemp WHERE sess = '$sessid'";
     $results = mysql_query($query)
          or die (mysql_query());
     $rows = mysql_num_rows($results);
     echo $rows;
?>

countries in your cart.<br>

 <table border="1" align="center" cellpadding="5">
      <tr>
           <td>No. of People</td>
           <td>Country Image</td>
           <td>Country Name</td>
           <td>Price Each</td>
           <td>Extended Price</td>
           <td></td>
           <td></td>
      <tr>
      <?php
           while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $ctr = "SELECT * FROM resrv WHERE ctrnum =
               '$ctrnum'";
               $ctr2 = mysql_query($ctr);
               $ctr3 = mysql_fetch_array($ctr2);
               extract ($ctr3);
               echo "<td><form method = 'POST' action='change.php'>
                    <input type='hidden' name='ctrnum'
                        value='$ctrnum'>
                    <input type='hidden' name='sessid'
                        value='$sessid'>
                    <input type='hidden' name='hidden'
                        value='$hidden'>
                    <input type='text' name='nopass' size='2'
                        value='$numppl'>";
               echo "</td>";
               echo "<td>";
               echo "<a href = 'getctr.php?ctrid=" .
                     $ctrnum ."'>";
               echo "THUMBNAIL<br>IMAGE</td></a>";
               echo "<td>";
               echo "<a href = 'getctr.php?ctrid=" .
                     $ctrnum ."'>";
               echo $name;
               echo "</td></a>";
               echo "<td align='right'>";
               echo $price;
               echo "</td>";
               echo "<td align='right'>";
          //get extended price
               $extprice = number_format($price * $numppl, 2);
               echo $extprice;
               echo "</td>";
               echo "<td>";
               echo "<input type='submit' name='Submit'
                         value='Change Num. of Passengers'>
                      </form></td>";
               echo "<td>";
               echo "<form method = 'POST' action='delete.php'>
                    <input type='hidden' name='ctrnum'
                           value='$ctrnum'>
                    <input type='hidden' name='nopass' value='$numppl'>
                    <input type='hidden' name='hidden'
                           value='$hidden'>
                    <input type='hidden' name='sessid'
                           value='$sessid'>";
               echo "<input type='submit' name='Submit'
                           value='Delete Item'>
                      </form></td>";
               echo "</tr>";
          //add extended price to total
               $total = $extprice + $total;

               }
?>
<tr>
<td colspan='4' align='right'>Your total before shipping is:</td>
<td align='right'> <?php echo number_format($total, 2) ?></td>
<td></td>
<td></td>
</tr>
</table>
<form method="POST" action="checkout.php">
<input type='submit' name='Submit' value='Proceed to Checkout'>
</form>
<a href="flightshop.php">Go back to the main page</a>
</div>
</BODY>
</HTML>
