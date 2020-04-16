<?php
	session_start();
	require('config.php');

?>


<!DOCTYPE html>
<html>
<head>
<title>Recommendation</title>
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
      <li class="active"><a href="form.php">Form</a></li>
      <li><a class="active" href="prev.php">View Previous Recommendations</a>      </li>
      <li><a class="active" href="#contact">Contact Us</a></li>
      <li><a href="Logout.php">Logout</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>

<?php
$connection = mysqli_connect('localhost', 'root', '', 'ClotheUp');
	$myusername=$_SESSION['username'];
	$fname=$_SESSION['fname'];
	$lname=$_SESSION['lname'];
	
	
?>


<div class="wrapper row3">
	<br>
	<h4>
	<?php
	echo "<br><center><h2>";
	echo "<h1>Name: ".$fname." ".$lname."<br></h1>";
	$query=mysql_query("SELECT * FROM user_input WHERE user_id='$myusername'")or die(mysql_error());
	
	while($result=mysql_fetch_array($query)){
		
	echo "<br><center><h2>YOUR RECORDED INPUTS:<h2>";
		echo "Gender: ".$result['gender']."<br>";
		echo "Budget: ".$result['budget']."<br>";
		echo "Season: ".$result['season']."<br>";
		echo "Occasion: ".$result['occasion']."<br>";
		echo "Body Type: ".$result['body_type']."<br>";
		echo "Hair Colour: ".$result['hair']."<br>";
		echo "Skin Colour: ".$result['skin']."<br><br>";
		
		echo "<h2>OUR RECOMMENDATION: <h2> <br>";
		
		echo "Top: ".$result['Top_colour']." ".$result['Top']."<br>";
		echo "Bottom: ".$result['Bottom_colour']." ".$result['Bottom']."<br><br><br>";
		echo "<hr>";
	}
?>
</h4></center>
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