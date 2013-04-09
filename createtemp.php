<?php
//connect to the database - either include a connection variable file or
//type the following lines:
require('config.php');




//Define the temp table
$query = "CREATE TABLE carttemp(
     hidden INT(10) NOT NULL AUTO_INCREMENT,
     sess CHAR(50) NOT NULL,
     ctrnum CHAR(5) NOT NULL,
     numppl INT(3) NOT NULL,
     PRIMARY KEY (hidden),
     KEY(sess))";

$temp = mysql_query($query)
     or die(mysql_error());
?>
