<?php
	session_start();
	require('config.php')
?>


<!DOCTYPE html>
<html>
<body>

<?php
	$host="localhost"; 		// Host name 
	$username="root"; 		// Mysql username 
	$password=""; 			// Mysql password 
	$db_name="ClotheUp"; 		// Database name 
	$tbl_name="login"; 	// Table name 

	// Connect to server and select databse.
	$connection = mysqli_connect('localhost', 'root', '', 'ClotheUp');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	// username and password sent from form 
	$fname=$_POST['usernamesignup'];
	$lname=$_POST['lastnamesignup'];
	$myusername=$_POST['emailsignup']; 
	$mypassword=$_POST['passwordsignup'];
	$gender=$_POST['gender'];


	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypassword = mysqli_real_escape_string($connection, $mypassword);
	$query = "INSERT INTO login VALUES ('','$fname','$lname','$myusername','$mypassword','$gender')";
	mysql_query($query);
	echo "Details Saved!";
	echo "<br><br>Go back to login page";
	header("location:login.php");
	?>
	<a href="login.php" style="text-decoration:none">Login</a>
</body>
</html>