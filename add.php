<?php
session_id();
session_start();
require('config.php');

$nopass =$_POST['nopass'];
$ctrnum = $_POST['ctrnum'];
$sess =session_id();

$query = "INSERT INTO carttemp (sess, numppl, ctrnum)
          VALUES ('$sess','$nopass','$ctrnum')";
$results = mysql_query($query)
     or die(mysql_error());

include("cart.php");
?>
