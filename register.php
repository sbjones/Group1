<?php
session_start();
include "config.php";
define("USERNAME","root");
define("PASSWORD","");
?>
<html>
<head>
     <title>Beginning Web Development</title>
</head>
<body>
<?php
	if ($_POST['submit'] == "Register")
	{
     	if ($_POST['username'] != "" && $_POST['password'] != "" && $_POST['first_name'] != "" && $_POST['last_name'] != "" && $_POST['email'] != "")
     	{
          $check_user = $_POST['username'];

          $query = "SELECT username FROM user_info WHERE username ='$check_user';";
          $result = mysql_query($query) or die(mysql_error());

          if (mysql_num_rows($result) != 0)
          {
?>
               <font color="#ff0000"><b>The Username, <?php echo $_POST['username']; ?>, is already in use, please choose another!</b></font>
               <form action="register.php" method="post">
               Username: <input type="text" name="username"><br>
               Password: <input type="password" name="password" value="<?php echo $_POST['password']; ?>"><br>
               Email: <input type="text" name="email" value="<?php echo $_POST['email']; ?>"><br>
               First Name: <input type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>"><br>
               Last Name: <input type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>"><br>
               City: <input type="text" name="city" value="<?php echo $_POST['city']; ?>"><br>
               State: <input type="text" name="state" value="<?php echo $_POST['state']; ?>"><br>
               Hobbies/Interests: (choose at least one)<br>
             <select name="hobbies[]" size="10" multiple>
               <option value="Golfing"<?php if (in_array("Golfing",$_POST['hobbies'])) echo " selected"; ?>>Golfing</option>
               <option value="Hunting"<?php if (in_array("Hunting",$_POST['hobbies'])) echo " selected"; ?>>Hunting</option>
               <option value="Reading"<?php if (in_array("Reading",$_POST['hobbies'])) echo " selected"; ?>>Reading</option>
               <option value="Dancing"<?php if (in_array("Dancing",$_POST['hobbies'])) echo " selected"; ?>>Dancing</option>
               <option value="Internet"<?php if (in_array("Internet",$_POST['hobbies'])) echo " selected"; ?>>Internet</option>
               <option value="Flying"<?php if (in_array("Flying",$_POST['hobbies'])) echo " selected"; ?>>Flying</option>
               <option value="Traveling"<?php if (in_array("Traveling",$_POST['hobbies'])) echo " selected"; ?>>Traveling</option>
               <option value="Exercising"<?php if (in_array("Exercising",$_POST['hobbies'])) echo " selected"; ?>>Exercising</option>
               <option value="Computers"<?php if (in_array("Computers",$_POST['hobbies'])) echo " selected"; ?>>Computers</option>
          	<option value="Other Than Listed"<?php if (in_array("Other Than Listed",$_POST['hobbies'])) echo " selected"; ?>>Other Than Listed</option>
          </select><br><br>
          	<input type="submit" name="submit" value="Register"> &nbsp; 
              <input type="reset" value="Clear">
          </form>
<?php
         }
      else
         {

          $query = "INSERT INTO user_info(username, password, email, first_name,last_name, city, state, hobbies) VALUES ('" . $_POST['username'] ."', (password('". $_POST['password'] . "')), '" . $_POST['email'] . "', '" .$_POST['first_name'] ."', '" . $_POST['last_name'] . "', '" . $_POST['city'] . "', '" .$_POST['state'] ."', '" . implode(", ", $_POST['hobbies']) . "');";
          $result = mysql_query($query) or die(mysql_error());
          $_SESSION['user_logged'] = $_POST['username'];
          $_SESSION['user_password'] = $_POST['password'];
?>
          Thank you, <?php echo $_POST['first_name'] . ", " . $_POST['last_name']; ?> for registering!<br>
          <a href="account.php">Click here</a> to continue.
<?php
          }
     }
     else
     {
?>          <font color="#ff0000"><b>The Username, Password, Email, First Name, and Last Name fields are required!</b></font>
          <form action="register.php" method="post">
          Username: <input type="text" name="username" value="<?php echo $_POST['username']; ?>"><br>
	   Password: <input type="password" name="password" value="<?php echo $_POST['password']; ?>"><br>
          Email: <input type="text" name="email" value="<?php echo $_POST['email']; ?>"><br>
          First Name: <input type="text" name="first_name" value="<?php echo $_POST['first_name']; ?>"><br>
          Last Name: <input type="text" name="last_name" value="<?php echo $_POST['last_name']; ?>"><br>
          City: <input type="text" name="city" value="<?php echo $_POST['city']; ?>"><br>
          State: <input type="text" name="state" value="<?php echo $_POST['state']; ?>"><br>
          Hobbies/Interests: (choose at least one)<br>
          <select name="hobbies[]" size="10" multiple>
          	<option value="Golfing"<?php if (in_array("Golfing", $_POST['hobbies'])) echo " selected"; ?>>Golfing</option>
              <option value="Hunting"<?php if (in_array("Hunting", $_POST['hobbies'])) echo " selected"; ?>>Hunting</option>
              <option value="Reading"<?php if (in_array("Reading", $_POST['hobbies'])) echo " selected"; ?>>Reading</option>
          	<option value="Dancing"<?php if (in_array("Dancing", $_POST['hobbies'])) echo " selected"; ?>>Dancing</option>
          	<option value="Internet"<?php if (in_array("Internet", $_POST['hobbies'])) echo " selected"; ?>>Internet</option>
              <option value="Flying"<?php if (in_array("Flying", $_POST['hobbies'])) echo " selected"; ?>>Flying</option>
              <option value="Traveling"<?php if (in_array("Traveling",$_POST['hobbies'])) echo " selected"; ?>>Traveling</option>
              <option value="Exercising"<?php if (in_array("Exercising", $_POST['hobbies'])) echo " selected"; ?>>Exercising</option>
              <option value="Computers"<?php if (in_array("Computers",$_POST['hobbies'])) echo " selected"; ?>>Computers</option>
              <option value="Other Than Listed"<?php if (in_array("Other Than Listed", $_POST['hobbies'])) echo " selected"; ?>>Other Than Listed</option>
          </select><br><br>
            <input type="submit" name="submit" value="Register"> &nbsp; 
            <input type="reset" value="Clear">
          </form>
<?php
     }
}
else
{
?>
		Welcome to the registration page!<br>
		The Username, Password, Email, First Name, and Last Name fields are required!
	<form action="register.php" method="post">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		Email: <input type="text" name="email"><br>
		First Name: <input type="text" name="first_name"><br>
		Last Name: <input type="text" name="last_name"><br>
		City: <input type="text" name="city"><br>
		State: <input type="text" name="state"><br>
		Hobbies/Interests: (choose at least one)<br>
		<select name="hobbies[]" size="10" multiple>
			<option value="Golfing">Golfing</option>
			<option value="Hunting">Hunting</option>
			<option value="Reading">Reading</option>
			<option value="Dancing">Dancing</option>
			<option value="Internet">Internet</option>
			<option value="Flying">Flying</option>
			<option value="Traveling">Traveling</option>
			<option value="Exercising">Exercising</option>
			<option value="Computers">Computers</option>
			<option value="Other Than Listed">Other Than Listed</option>
		</select><br><br>
		<input type="submit" name="submit" value="Register"> 
               &nbsp; 
             <input type="reset" value="Clear">
     </form>
<?php
}
?>
</body>
</html>
