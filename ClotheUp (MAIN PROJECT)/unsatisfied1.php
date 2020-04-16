<form method="post" name="unsatisfied"  id="unsatisfied" action="unsatisfied.php">
           <input name="username" id="username" value='<?php echo $myusername; ?> ' type="hidden">
		   <input name="fname" id="fname" value='<?php echo $fname; ?> ' type="hidden">
			   <input name="lname" id="lname" value='<?php echo $lname; ?> ' type="hidden">
			   <input name="gender" id="gender" value='<?php echo $gender; ?> ' type="hidden">
			   <input name="budget" id="budget" value='<?php echo $budget; ?> ' type="hidden">
			   <input name="season" id="season" value='<?php echo $season; ?> ' type="hidden">
			   <input name="occasion" id="occasion" value='<?php echo $place; ?> ' type="hidden">
			   <input name="body_type" id="body_type" value='<?php echo $body; ?> ' type="hidden">
			   <input name="hair" id="hair" value='<?php echo $hair; ?> ' type="hidden">
			   <input name="skin" id="skin" value='<?php echo $skin; ?> ' type="hidden">
			   <input class="btn inverse" type="submit" value="Unsatisfied" >
               
			 </form>


















<?php
session_start();
	require('config.php');
    $host="localhost"; 		// Host name 
	$username="root"; 		// Mysql username 
	$password=""; 			// Mysql password 
	$db_name="clotheup"; 		// Database name 
	$tbl_name="user_input"; 	// Table name 

	// Connect to server and select databse.
	$connection = mysqli_connect('localhost', 'root', '', 'clotheup');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	// username and password sent from form
	echo $myusername=$_SESSION['username'];
	echo $fname=$_SESSION['fname'];
	echo $lname=$_SESSION['lname'];
	echo $gender=$_SESSION['gender'];
	echo $budget=$_POST['budget'];
	echo $season=$_POST['season'];
	echo $place=$_POST['occasion'];
	echo $body=$_POST['body_type'];
	echo $hair=$_POST['hair'];
	echo $skin=$_POST['skin'];
	
	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypassword = mysqli_real_escape_string($connection, $mypassword);
	?>
	
<!DOCTYPE html>
<!--
Template Name: Pedggie
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Pedggie | Pages | Basic Grid</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
     <style>
     </style>




<style type="text/css">
/* DEMO ONLY */
.container .demo{text-align:center;}
.container .demo div{padding:8px 0;}
.container .demo div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .demo div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (max-width:900px){.container .demo div{margin-bottom:0;}}
/* DEMO ONLY */
</style>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1>ClotheUp</h1>
    </div>
    <div id="quickinfo" class="fl_right">
      <ul class="nospace inline">
        <li><strong></strong><br>
          </li>
        <li><strong></strong><br>
          </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
   
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="form.html">Form</a></li>
<li><a class="active" href="prev.php">View Previous Recommendations</a>      </li>
      <li><a class="active" href="#contact">Contact Us</a></li>
      <li><a href="Logout.php">Logout</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
<form  action="submit_form.php" method="POST" autocomplete="on">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
	  
      <!-- ################################################################################################ -->
      <h2>Which type of cloth would you like for this occasion(Top)? </h2>
      <!-- ################################################################################################ -->
     <div class="group btmspace-50 demo">
	  <input class="one_third first" type="radio" value="Half Shirt" name="top" required>
	  <input class="one_third" type="radio" value="Full Shirt" name="top" required>
	  <input class="one_third" type="radio" value="Half Tshirt" name="top" required>
	  <br>
	  <div class="one_third first" >Half Shirt</div>
	  <div class="one_third" >Full Shirt</div>
	  <div class="one_third" >Half Tshirt</div>
	  
      </div>
	  <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Full Tshirt" name="top" required>
        <input class="one_half" type="radio" value="Kurta" name="top" required>
		<br>
		<div class="one_half first" >Full Tshirt</div>
				<div class="one_half" >Kurta</div>
      </div>
	  <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Coat" name="top" required>
        <input class="one_half" type="radio" value="Jacket" name="top" required>
		<br>
		<div class="one_half first" >Coat</div>
				<div class="one_half" >Jacket</div>
      </div>
	  <hr>
	  <br>
	  
	  
	   <h2>Your favourite colour for selected top?</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
	  <input class="one_third first" type="radio" value="Red" name="top_color" required>
	  <input class="one_third" type="radio" value="Blue" name="top_color" required>
	  <input class="one_third" type="radio" value="Black" name="top_color" required>
	  <br>
	  <div class="one_third first" >Red</div>
	  <div class="one_third" >Blue</div>
	  <div class="one_third" >Black</div>
	  
      </div>
	  <div class="group btmspace-50 demo">
	  <input class="one_third first" type="radio" value="Brown" name="top_color" required>
	  <input class="one_third" type="radio" value="White" name="top_color" required>
	  <input class="one_third" type="radio" value="Pink" name="top_color" required>
	  <br>
	  <div class="one_third first" >Brown</div>
	  <div class="one_third" >White</div>
	  <div class="one_third" >Pink</div>
	  
      </div>
	  <hr>
	  <br>
	  
	  <h2>Which type of cloth would you like for this occasion (Bottom)?</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Black" name="bottom" required>
        <input class="one_half" type="radio" value="Brown" name="bottom" required>
		<br>
		<div class="one_half first" >Black</div>
				<div class="one_half" >Brown</div>
      </div>
	  <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Blonde" name="bottom" required>
        <input class="one_half" type="radio" value="Grey" name="bottom" required>
		<br>
		<div class="one_half first" >Blonde</div>
				<div class="one_half" >Grey</div>
      </div>
	  <hr>
	  <br>
	  
	  <h2>Which body type is most like you?</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
	  <input class="one_third first" type="radio" value="Trapezoid" name="body" required>
	  <input class="one_third" type="radio" value="Inverted Triangle" name="body" required>
	  <input class="one_third" type="radio" value="Rectangle" name="body" required>
	  <br>
	  <div class="one_third first" >Trapezoid</div>
	  <div class="one_third" >Inverted Triangle</div>
	  <div class="one_third" >Rectangle</div>
	  
      </div>
	  <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Oval" name="body" required>
        <input class="one_half" type="radio" value="Triangle" name="body" required>
		<br>
		<div class="one_half first" >Oval</div>
				<div class="one_half" >Triangle</div>
      </div>
	  <hr>
	  <br>
	  
	  <h2>What Colour are your hair?</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Black" name="hair" required>
        <input class="one_half" type="radio" value="Brown" name="hair" required>
		<br>
		<div class="one_half first" >Black</div>
				<div class="one_half" >Brown</div>
      </div>
	  <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Blonde" name="hair" required>
        <input class="one_half" type="radio" value="Grey" name="hair" required>
		<br>
		<div class="one_half first" >Blonde</div>
				<div class="one_half" >Grey</div>
      </div>
	  <hr>
	  <br>
	  <h2>Your Skin Tone?</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
	  <input class="one_third first" type="radio" value="Fair" name="skin" required>
	  <input class="one_third" type="radio" value="Wheatish" name="skin" required>
	  <input class="one_third" type="radio" value="Dark" name="skin" required>
	  <br>
	  <div class="one_third first" >Fair</div>
	  <div class="one_third" >Wheatish</div>
	  <div class="one_third" >Dark</div>
      </div>
	  </div>
	  
                                    <input class="btn" type="submit" value="Submit" > 
							
	  
	  </form>
	  </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
      
<div class="wrapper row5" style="margin-top: 10%;">
              <div id="copyright" class="hoc clear"> <a name="contact">
                <!-- ################################################################################################ -->
                <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">www.clotheup.com</a></p>
	</div></a>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="../layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>