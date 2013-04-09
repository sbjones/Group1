<?php
session_id();
session_start();
require_once("config.php");



$nopass =$_POST['nopass'];
$hidden = $_POST['hidden'];
$sess = $_POST['sessid'];

$query = "DELETE FROM carttemp WHERE hidden = '$hidden'";
$results = mysql_query($query)
     or die(mysql_error());

echo "<div align='center'>
     Item Deleted.<br>
     <br></div>     ";
include("cart.php");
?>