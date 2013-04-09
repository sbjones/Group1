<?php
session_id();
session_start();
//connect to the database - either include a connection variable file or
//type the following lines:
require('config.php');


//Let's make the variables easy to access in our queries
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$shipfirst = $_POST['shipfirst'];
$shiplast = $_POST['shiplast'];
$shipadd1 = $_POST['shipadd1'];
$shipadd2 = $_POST['shipadd2'];
$shipcity = $_POST['shipcity'];
$shipstate = $_POST['shipstate'];
$shipzip = $_POST['shipzip'];
$shipstate = $_POST['shipstate'];
$shipphone = $_POST['shipphone'];
$shipemail = $_POST['shipemail'];
$total = $_POST['total'];
$sessid = session_id();
$today = date("Y-m-d");
//1) Assign Customer Number to new Customer, or find existing customer number
     $query = "SELECT * FROM customers WHERE
          (firstname = '$firstname' AND
          lastname = '$lastname' AND
          add1 = '$add1' AND
          add2 = '$add2' AND
          city = '$city')";
     $results = mysql_query($query)
          or (mysql_error());
     $rows = mysql_num_rows($results);

     if ($rows < 1) {
          //assign new custnum
          $query2 = "INSERT INTO customers (
          firstname, lastname, add1, add2, city, state, zip, phone, fax, email)
           VALUES (
          '$firstname',
          '$lastname',
          '$add1',
          '$add2',
          '$city',
          '$state',
          '$zip',
          '$phone',
          '$fax',
          '$email')";
          $insert = mysql_query($query2)
               or (mysql_error());
          $custid = mysql_insert_id();
     }
     //If custid exists, we want to make it equal to custnum
     if($custid) $custnum = $custid;
//2) Insert Info into ordermain
     //determine shipping costs based on order total (25% of total)
     $shipping = $total * 0.25;

     $query3 = "INSERT INTO ordermain (orderdate, custnum, subtotal,
                shipping, shipfirst, shiplast, shipadd1, shipadd2,
               shipcity, shipstate, shipzip, shipphone, shipemail)
          VALUES (
          '$today',
          '$custnum',
          '$total',
          '$shipping'
          '$shipfirst',
          '$shiplast',
          '$shipadd1',
          '$shipadd2',
          '$shipcity',
          '$shipstate',
          '$shipzip',
          '$shipphone',
          '$shipemail')";
     $insert2 = mysql_query($query3)
          or (mysql_error());
     $orderid = mysql_insert_id();

//3) Insert Info into orderdet
     //find the correct cart information being temporarily stored
     $query = "SELECT * from carttemp WHERE sess='$sessid'";
     $results = mysql_query($query)
          or (mysql_error());

     //put the data into the database one row at a time
     while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $query4 = "INSERT INTO orderdet (ordernum, qty, prodnum)
                    VALUES (
                    '$orderid',
                    '$quan',
                    '$prodnum')";
               $insert4 = mysql_query($query4)
                    or (mysql_error());
     }

//4)delete from temporary table
     $query="DELETE FROM carttemp WHERE sess='$sessid'";
     $delete = mysql_query($query);


//5)email confirmations to us and to the customer
/* recipients */
$to = "<" . $email .">";

/* subject */
$subject = "Order Confirmation";

/* message */
     /* top of message */
     $message = "
       <html>
       <head>
       <title>Order Confirmation</title>
       </head>
       <body>
     Here is a recap of your order:<br><br>
     Order date:";
 $message .= $today;
 $message .= "
     <br>
      Order Number: ";
 $message .= $orderid;
 $message .= "
     <table width='50%' border='0'>
      <tr>
        <td>
         <p><font size='2'>Bill to:<br>";
 $message .= $firstname;
 $message .= " ";
 $message .= $lastname;
 $message .= "<br>";
 $message .= $add1;
 $message .= "<br>";
 if ($add2) $message .= $add2 . "<br>";
 $message .= $city . ", " . $state . "  " . $zip;
 $message .= "</p></td>
    <td>
      <p><font size='2'>Ship to:<br>";
 $message .= $shipfirst . " " . $shiplast;
 $message .= "<br>";
 $message .= $shipadd1 . "<br>";
 if ($shipadd2) $message .= $shipadd2 . "<br>";
 $message .= $shipcity . ", " . $shipstate . "  " . $shipzip;
 $message .= "</font></p>
      </td>
     </tr>
    </table>
    <hr noshade width='250px' align='left'>
  <table cellpadding='5'>
     <tr>";

//grab the contents of the order and insert them
//into the message field

      $query = "SELECT * from orderdet WHERE ordernum = '$orderid'";
     $results = mysql_query($query)
          or die (mysql_query());
          while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $prod = "SELECT * FROM products
                        WHERE prodnum = '$prodnum'";
               $prod2 = mysql_query($prod);
               $prod3 = mysql_fetch_array($prod2);
               extract ($prod3);
               $message .= "<td><font size='2'>";
               $message .= $quan;
               $message .= "</font></td>";
               $message .="<td><font size='2'>";
               $message .= $name;
               $message .= "</font></td>";
               $message .= "<td align='right'><font size='2'>";
               $message .= $price;
               $message .= "</font></td>";
               $message .= "<td align='right'><font size='2'>";
          //get extended price
               $extprice = number_format($price * $quan, 2);
               $message .= $extprice;
               $message .= "</font></td>";
               $message .= "</tr>";
               }

 $message .= "<tr>
     <td colspan='3' align='right'><font size='2'>
        Your total before shipping is:</font>
     </td>
     <td align='right'><font size='2'>";
 $message .= number_format($total, 2);
 $message .= "</font>
     </td>
    </tr>
    <tr>
     <td colspan='3' align='right'><font size='2'>
       Shipping Costs:</font>
     </td>
     <td align='right'><font size='2'>";
  $message .= number_format($shipping, 2);
  $message .= "</font>
     </td>
    </tr>
   <tr>
     <td colspan='3' align='right'><font size='2'>
      Your final total is:</font>
     </td>
     <td align='right'><font size='2'> ";
  $message .= number_format(($total + $shipping), 2);
  $message .= "</font>
     </td>
    </tr>
   </table>
</body>
</html>";

/* headers */
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: <storeemail@email.com>\r\n";
$headers .= "Cc: <storeemail@email.com>\r\n";
$headers .= "X-Mailer: PHP / ".phpversion()."\r\n";

/* mail it */
mail ($to, $subject, $message, $headers);


//6)show them their order & give them an order number
?>
<HTML>
<HEAD>
<TITLE>Thank you for your order!</TITLE>
</HEAD>
<BODY>
Step 1 - Please Enter Billing and Shipping Information<br>
Step 2 - Please Verify Accuracy and Make Any Necessary Changes<br>
<strong>Step 3 - Order Confirmation and Receipt</strong><br><br>

Thank you for your order!<br><br>
Your order number is <?php echo $orderid ?>. Please print this page or retain
this number for your records.<br>
<br>
Here is a recap of your order:<br><br>
Order date: <?php echo $today ?><br>


<table width="50%" border="0">
  <tr>
    <td>
      <p><font size="2">Bill to:<br>
        <?php echo $firstname . " " . $lastname ?><br>
        <?php echo $add1 ?><br>
        <?php if ($add2) echo $add2 . "<br>"?>
        <?php echo $city . ", " . $state . "  " . $zip ?> </font></p>
    </td>
    <td>
      <p><font size="2">Ship to:<br>
        <?php echo $shipfirst . " " . $shiplast ?><br>
        <?php echo $shipadd1 ?><br>
        <?php if ($shipadd2) echo $shipadd2 . "<br>"?>
        <?php echo $shipcity . ", " . $shipstate . "  " . $shipzip ?> </font></p>
    </td>
  </tr>
</table>
<hr noshade width='250px' align='left'>
<table cellpadding="5">
     <tr>
      <?php
      $query = "SELECT * from orderdet WHERE ordernum = '$orderid'";
     $results = mysql_query($query)
          or die (mysql_query());
          while ($row = mysql_fetch_array($results)) {
               extract ($row);
               $prod = "SELECT * FROM products WHERE prodnum = '$prodnum'";
               $prod2 = mysql_query($prod);
               $prod3 = mysql_fetch_array($prod2);
               extract ($prod3);
               echo "<td><font size='2'>";
               echo $quan;
               echo "</font></td>";
               echo "<td><font size='2'>";
               echo $name;
               echo "</font></td>";
               echo "<td align='right'><font size='2'>";
               echo $price;
               echo "</font></td>";
               echo "<td align='right'><font size='2'>";
          //get extended price
               $extprice = number_format($price * $quan, 2);
               echo $extprice;
               echo "</font></td>";
               echo "</tr>";
               }
?>
<tr>
<td colspan='3' align='right'><font size='2'>
Your total before shipping is:</font>
</td>
<td align='right'><font size='2'>
     <?php echo number_format($total, 2) ?></font>
</td>
</tr>
<tr>
<td colspan='3' align='right'><font size='2'>
Shipping Costs:</font>
</td>
<td align='right'><font size='2'>
     <?php echo number_format($shipping, 2) ?></font>
</td>
</tr>
<tr>
<td colspan='3' align='right'><font size='2'>
Your final total is:</font>
</td>
<td align='right'><font size='2'>
     <?php echo number_format(($total + $shipping), 2) ?></font>
</td>
</tr>
</table>
</BODY>
</HTML>
