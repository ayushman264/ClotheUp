<?php
	session_start();

	require('config.php')
	
	?>

<!DOCTYPE html>
<!--
Template Name: 
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Form</title>
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
      <h2>What best describes your clothing budget?</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
	  <input class="one_quarter first" type="radio" name="budget" value="$" required>
	  <input class="one_quarter" type="radio" name="budget" value="$$" required>
	  <input class="one_quarter" type="radio" name="budget" value="$$$" required>
	  <input class="one_quarter" type="radio" name="budget" value="?" required>
	  <br>
	  <div class="one_quarter first" >$</div>
		<div class="one_quarter" >$$</div>
				<div class="one_quarter" >$$$</div>
				<div class="one_quarter" >?</div>
	  
	  
      </div>
	  <hr>
	  <br>
	  
	   <h2>Choose a season for which you want clothing recommendation.</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
        <input class="one_half first" type="radio" value="Summer" name="season" required>
        <input class="one_half" type="radio" value="Winter" name="season" required>
		<br>
		<div class="one_half first" >Summer</div>
				<div class="one_half" >Winter</div>
      </div>
	  <hr>
	  <br>
	  
	  <h2>Select place/ocassion</h2>
      <!-- ################################################################################################ -->
      <div class="group btmspace-50 demo">
	  <input class="one_quarter first" type="radio" value="Wedding" name="place" required>
	  <input class="one_quarter" type="radio" value="Office" name="place" required>
	  <input class="one_quarter" type="radio" value="Casual" name="place" required>
	  <input class="one_quarter" type="radio" value="Party" name="place" required>
      <br>
	  <div class="one_quarter first" >Wedding</div>
		<div class="one_quarter" >Office</div>
				<div class="one_quarter" >Casual</div>
				<div class="one_quarter" >Party</div>
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