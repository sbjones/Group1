<?php
session_start();
include "conn.inc.php";
if (isset($_POST['submit'])) {
     $query = "SELECT username, password FROM user_info " .
      		  "WHERE username = '" . $_POST['username'] . "' " .
      		  "AND password = (PASSWORD('" . $_POST['password'] . "'))";
     $result = mysql_query($query)
       or die(mysql_error());

     if (mysql_num_rows($result) == 1)
     {
     	  $_SESSION['user_logged'] = $_POST['username'];
          $_SESSION['user_password'] = $_POST['password'];
          header ("Refresh: 5; URL=" . $_POST['redirect'] . "");
          echo "You are being redirected to your original page request!<br>";
          echo "(If your browser doesn't support this, " .
          		"<a href=\"" . $_POST['redirect']. "\">click here</a>)";
           }
     else
     {
?>
          <html>
          <head></head>
          <body>
          Invalid Username and/or Password<br>
          Not registered? <a href="register.php">Click here</a> to register.<br>
          <form action="user_login.php" method="post">
          <input type="hidden" name="redirect" value="<?php echo $_POST['redirect'];
               ?>">
          Username: <input type="text" name="username"><br>
          Password: <input type="password" name="password"><br><br>
          <input type="submit" name="submit" value="Login">
          </form>
          </body></html>
<?
     }
}
else
{
if ($_SERVER['HTTP_REFERER'] == "" || $_SERVER['HTTP_REFERER'] == "http://localhost/account.php")
{
$redirect = "http://localhost/account.php";
}
else
{
$redirect = $_GET['redirect'];
}
?>
     <html>
     <head>
     </head>
     <body>
     Login below by supplying your username/password...<br>
     Or <a href="register.php">click here</a> to register.<br><br>
     <form action="user_login.php" method="post">
     <input type="hidden" name="redirect" value="<? echo $redirect; ?>">
     Username: <input type="text" name="username"><br>
     Password: <input type="password" name="password"><br><br>
     <input type="submit" name="submit" value="Login">
     </form>
     </body>
     </html>
<?php
}
?>
