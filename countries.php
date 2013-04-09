<?php
//connect to the database - either include a connection variable file or
//type the following lines:
require('config.php');



$query = "INSERT INTO resrv VALUES (
     '00001', 'Germany',
     1411.00, '2013-04-11', '06:00:00', '2013-04-18'),
     ('00002','Italy',
     1526.60, '2013-04-11', '06:00:00', '2013-04-18'),
     ('00003', 'Switzerland',
     1441.60, '2013-04-11', '06:00:00', '2013-04-18'),
     ('00004', 'France',
     1343.00, '2013-04-11', '06:00:00', '2013-04-18'),
     ('00005', 'Austria',
     1496.00, '2013-04-11', '06:00:00', '2013-04-18')";

$result = mysql_query($query)
     or die(mysql_error());
echo "Countries added successfully!";

?>
