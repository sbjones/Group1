<?php
	session_start();
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['userpass'] = $_POST['password'];
	$_SESSION['authuser'] = 0;
	$login = $_GET['login'];
	$username = $_SESSION['username'];
	$password = $_SESSION['userpass'];
		
	
if ($login=='yes') {
	
	$con = mysql_connect("localhost","root","");
	
	mysql_select_db("login");

	$query_l = "SELECT count(id) " .
			   "FROM login " .
			   "WHERE user='$username' and pass='$password'";
	
	$get = mysql_query($query_l)
		or die(mysql_error());

	$_SESSION['authuser'] = mysql_result($get, 0);
	
	if($_SESSION['authuser']!=1) {
		echo "Invalid login.";
	} else {
		
		echo "Login successful. Welcome back " . $_SESSION['username'] . " sir/madam.";
	}
}

?>

<html>
<head>
<script type="text/javascript">

function delayer(){

    window.location = "main.php"
}    
</script>
</head>
<body onLoad="setTimeout('delayer()', 2000)">

</body>
</html>