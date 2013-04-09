<?php
session_id();
session_start();
require('config.php');

$nopass =$_POST['nopass'];
$hidden = $_POST['hidden'];
$sess = $_POST['sessid'];

$query = "UPDATE carttemp
     SET numppl = '$nopass'
     WHERE hidden = '$hidden'";
$results = mysql_query($query)
     or die(mysql_error());

echo "Number of Passengers Updated.<br>     ";
include("cart.php");
?>