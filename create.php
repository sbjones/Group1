<?php
//connect to the database - either include a connection variable file or
//type the following lines:
require_once("config.php");


//Define the resrv table
$query = "CREATE TABLE resrv (
	 ctrnum CHAR(5) NOT NULL,
	name VARCHAR(10) NOT NULL,
     price DEC(5,2) NOT NULL,
     dep_date DATE NOT NULL,
     dep_time TIME NOT NULL,
     back_date DATE NOT NULL,
     PRIMARY KEY(ctrnum))";

$resrv = mysql_query($query)
     or die(mysql_error());

//Define the customer table
$query2 = "CREATE TABLE customers (
     custnum INT(6) NOT NULL AUTO_INCREMENT,
     firstname VARCHAR (15) NOT NULL,
     lastname VARCHAR (50) NOT NULL,
     add1 VARCHAR (50) NOT NULL,
     add2 VARCHAR (50),
     city VARCHAR (50) NOT NULL,
     state CHAR (2) NOT NULL,
     zip CHAR (5) NOT NULL,
     phone CHAR (12) NOT NULL,
     fax CHAR (12),
     email VARCHAR (50) NOT NULL,
     PRIMARY KEY (custnum))";

$customers = mysql_query($query2)
     or die(mysql_error());

//Define the general order table
$query3 = "CREATE TABLE ordermain (
     ordernum INT(6) NOT NULL AUTO_INCREMENT,
     orderdate DATE NOT NULL,
     custnum INT(6) NOT NULL,
     subtotal DEC (7,2) NOT NULL,
     total DEC(7,2) NOT NULL,
     PRIMARY KEY(ordernum)) ";

$ordermain = mysql_query($query3)
     or die(mysql_error());

//Define the order details table
$query4 = "CREATE TABLE orderdet (
     ordernum INT (6) NOT NULL,
     nopass INT(2) NOT NULL,
     ctrnum CHAR(5) NOT NULL,
     KEY(ordernum))";

$orderdet = mysql_query($query4)
     or die(mysql_error());

echo "Done.";
?>
