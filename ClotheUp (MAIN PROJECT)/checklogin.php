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
	$myusername=$_POST['Username']; 
	$mypassword=$_POST['Password'];
	
	$query1=mysql_query("SELECT * FROM $tbl_name WHERE Email='$myusername' and pass='$mypassword'")or die(mysql_error());
	
	while($result=mysql_fetch_array($query1)){
		$_SESSION['fname']=$result['Fname'];
		$_SESSION['lname']=$result['Lname'];
		$_SESSION['gender']= $result['gender'];
	}
	
	

	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypassword = mysqli_real_escape_string($connection, $mypassword);
	$sql="SELECT * FROM $tbl_name WHERE Email='$myusername' and pass='$mypassword'";

	$result=mysqli_query($connection, $sql);

	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		$_SESSION['username']= $myusername; 
		$_SESSION['password']= $mypassword;
		
		
		if($myusername=="admin")
		{
			header("location:admin.php");
		}
		else
		{
			header("location:form.php");
		}
		
	}
	else {
		echo "<br><br>";
		echo "<body link=\"green\" vlink=\"green\" bgcolor=\"silver\"><center><font face=\"impact\" size=\"5\">Wrong Username or Password!</font>";
		echo"<br><br><font face=\"impact\" size=\"4\">Go back to <a href=\"main_login.php\" style=\"text-decoration:none\">login page</a>";		
	}
	?>
</body>
</html>

