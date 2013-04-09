<?php
include "config.php";
$query = "SELECT username, first_name FROM user_info " .
		 "WHERE username = '" . $_SESSION['user_logged'] . "';";
		 
$results = mysql_query($query)
  or die(mysql_error());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

</head>
<body>
<h2><?php
while ($row = mysql_fetch_array($results)) {
  extract($row);
  echo "Welcome ". $first_name;
}
?></h2>
<a href="update_account.php">Update Account</a><br />
<a href="logout.php">Logout</a>
</body>
</html>
