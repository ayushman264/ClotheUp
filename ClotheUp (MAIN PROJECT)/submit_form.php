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
	$myusername=$_SESSION['username'];
	$fname=$_SESSION['fname'];
	$lname=$_SESSION['lname'];
	$gender=$_SESSION['gender'];
	$budget=$_POST['budget'];
	$season=$_POST['season'];
	$place=$_POST['place'];
	$body=$_POST['body'];
	$hair=$_POST['hair'];
	$skin=$_POST['skin'];
	
	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypassword = mysqli_real_escape_string($connection, $mypassword);
	
	?>
	
	<?php
	
	
	
	//ALGO TOP
	
	$T = array("Half Shirt", "Full Shirt", "Half Tshirt","Full Tshirt","Kurta","Coat","Jacket"); 
	$T1="Half Shirt";
	$T2="Full Shirt";
	$T3="Half Tshirt";
	$T4="Full Tshirt";
	$T5="Kurta";
	$T6="Coat";
	$T7="Jacket";
	
	$tc=0;
//TOTAL COUNT
	$sql="SELECT * FROM dataset";
	$result=mysqli_query($connection, $sql);
	$tc=mysqli_num_rows($result);
	
	
	$s1="SELECT * FROM dataset WHERE Top='$T1'";
	$result=mysqli_query($connection, $s1);
	$t1count=mysqli_num_rows($result);
	
	$p1=$t1count/$tc;
	

	$s1="SELECT * FROM dataset WHERE Top='$T2'";
	$result=mysqli_query($connection, $s1);
	$t2count=mysqli_num_rows($result);
	
	$p2=$t2count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top='$T3'";
	$result=mysqli_query($connection, $s1);
	$t3count=mysqli_num_rows($result);
	
	$p3=$t3count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top='$T4'";
	$result=mysqli_query($connection, $s1);
	$t4count=mysqli_num_rows($result);
	
	$p4=$t4count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top='$T5'";
	$result=mysqli_query($connection, $s1);
	$t5count=mysqli_num_rows($result);
	
	$p5=$t5count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top='$T6'";
	$result=mysqli_query($connection, $s1);
	$t6count=mysqli_num_rows($result);
	
	$p6=$t6count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top='$T7'";
	$result=mysqli_query($connection, $s1);
	$t7count=mysqli_num_rows($result);
	
	$p7=$t7count/$tc;
	
	
	
	$tcount=array($t1count,$t2count,$t3count,$t4count,$t5count,$t6count,$t7count);
	$pp=array($p1,$p2,$p3,$p4,$p5,$p6,$p7);
	
	//CONDITIONAL PROBS
	
	//GENDER
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and Gender='$gender'";
	$result=mysqli_query($connection, $s1);
	$TG[$i]=mysqli_num_rows($result);
	
	if($TG[$i]==0)
	{
		$TG[$i]=1;
	}
	
	$PTG[$i]=$TG[$i]/$tcount[$i];
	
	

	//BUDGET
	
	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and Budget='$budget'";
	$result=mysqli_query($connection, $s1);
	$TB[$i]=mysqli_num_rows($result);
	
	if($TB[$i]==0)
	{
		$TB[$i]=1;
	}
	
	$PTB[$i]=$TB[$i]/$tcount[$i];
	

	//SEASON

	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and Season='$season'";
	$result=mysqli_query($connection, $s1);
	$TS[$i]=mysqli_num_rows($result);
	
	if($TS[$i]==0)
	{
		$TS[$i]=1;
	}
	
	$PTS[$i]=$TS[$i]/$tcount[$i];
	


	//OCCASION

	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and Occasion='$place'";
	$result=mysqli_query($connection, $s1);
	$TO[$i]=mysqli_num_rows($result);
	
	if($TO[$i]==0)
	{
		$TO[$i]=1;
	}
	
	$PTO[$i]=$TO[$i]/$tcount[$i];


	
	//BODY TYPE

	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and Body_type='$body'";
	$result=mysqli_query($connection, $s1);
	$TBO[$i]=mysqli_num_rows($result);
	
	if($TBO[$i]==0)
	{
		$TBO[$i]=1;
	}
	
	$PTBO[$i]=$TBO[$i]/$tcount[$i];
	
	
	//HAIR

	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and Hair='$hair'";
	$result=mysqli_query($connection, $s1);
	$TH[$i]=mysqli_num_rows($result);
	
	if($TH[$i]==0)
	{
		$TH[$i]=1;
	}
	
	$PTH[$i]=$TH[$i]/$tcount[$i];

	

	//SKIN

	$s1="SELECT * FROM dataset WHERE Top='$T[$i]' and skin='$skin'";
	$result=mysqli_query($connection, $s1);
	$TSK[$i]=mysqli_num_rows($result);
	
	if($TSK[$i]==0)
	{
		$TSK[$i]=1;
	}
	
	$PTSK[$i]=$TSK[$i]/$tcount[$i];
	
	//FINAL RESULT BEFORE SORTING (TOP) AND NEXT PART WILL BE FOR BOTTOM JMD LETS ROCK HIMESH BHAI HAI
	 $pt[$i]=$PTG[$i]*$PTB[$i]*$PTS[$i]*$PTO[$i]*$PTBO[$i]*$PTH[$i]*$PTSK[$i]*$pp[$i];
	
	}
	$max=0;
	for( $i = 0; $i<7; $i++ ){
		if($pt[$i]>$max){
			$max=$pt[$i];
			$m=$i;
		}
	}
	
	for( $i = 0; $i<7; $i++ ){
		$temp1[0][$i]=$pt[$i];
		$temp1[1][$i]=$i;
	}
	for( $i = 0; $i<7; $i++ ){
		for( $j = $i+1; $j<7; $j++ ){
			if($temp1[0][$i]<$temp1[0][$j]){
				$val=$temp1[0][$i];
				$ind=$temp1[1][$i];
				$temp1[0][$i]=$temp1[0][$j];
				$temp1[1][$i]=$temp1[1][$j];
				$temp1[0][$j]=$val;
				$temp1[1][$j]=$ind;
			}
		}
	}
	
	
	
	
	
	
	
	
	//ALGO TOP COLOUR
	
	$TCC = array("Red", "Blue", "Black","Brown","White","Pink"); 
	$T1="Red";
	$T2="Blue";
	$T3="Black";
	$T4="Brown";
	$T5="White";
	$T6="Pink";
	
	$tc=0;
//TOTAL COUNT
	$sql="SELECT * FROM dataset";
	$result=mysqli_query($connection, $sql);
	$tc=mysqli_num_rows($result);
	
	
	$s1="SELECT * FROM dataset WHERE Top_colour='$T1'";
	$result=mysqli_query($connection, $s1);
	$t1count=mysqli_num_rows($result);
	
	$p1=$t1count/$tc;
	

	$s1="SELECT * FROM dataset WHERE Top_colour='$T2'";
	$result=mysqli_query($connection, $s1);
	$t2count=mysqli_num_rows($result);
	
	$p2=$t2count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top_colour='$T3'";
	$result=mysqli_query($connection, $s1);
	$t3count=mysqli_num_rows($result);
	
	$p3=$t3count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top_colour='$T4'";
	$result=mysqli_query($connection, $s1);
	$t4count=mysqli_num_rows($result);
	
	$p4=$t4count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top_colour='$T5'";
	$result=mysqli_query($connection, $s1);
	$t5count=mysqli_num_rows($result);
	
	$p5=$t5count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Top_colour='$T6'";
	$result=mysqli_query($connection, $s1);
	$t6count=mysqli_num_rows($result);
	
	$p6=$t6count/$tc;
	
	
	
	
	$tcount=array($t1count,$t2count,$t3count,$t4count,$t5count,$t6count);
	$pp=array($p1,$p2,$p3,$p4,$p5,$p6);
	
	//CONDITIONAL PROBS
	
	//GENDER
	for( $i = 0; $i<6; $i++ ){
	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and Gender='$gender'";
	$result=mysqli_query($connection, $s1);
	$TG[$i]=mysqli_num_rows($result);
	
	if($TG[$i]==0)
	{
		$TG[$i]=1;
	}
	
	$PTG[$i]=$TG[$i]/$tcount[$i];
	
	

	//BUDGET
	
	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and Budget='$budget'";
	$result=mysqli_query($connection, $s1);
	$TB[$i]=mysqli_num_rows($result);
	
	if($TB[$i]==0)
	{
		$TB[$i]=1;
	}
	
	$PTB[$i]=$TB[$i]/$tcount[$i];
	

	//SEASON

	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and Season='$season'";
	$result=mysqli_query($connection, $s1);
	$TS[$i]=mysqli_num_rows($result);
	
	if($TS[$i]==0)
	{
		$TS[$i]=1;
	}
	
	$PTS[$i]=$TS[$i]/$tcount[$i];
	


	//OCCASION

	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and Occasion='$place'";
	$result=mysqli_query($connection, $s1);
	$TO[$i]=mysqli_num_rows($result);
	
	if($TO[$i]==0)
	{
		$TO[$i]=1;
	}
	
	$PTO[$i]=$TO[$i]/$tcount[$i];


	
	//BODY TYPE

	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and Body_type='$body'";
	$result=mysqli_query($connection, $s1);
	$TBO[$i]=mysqli_num_rows($result);
	
	if($TBO[$i]==0)
	{
		$TBO[$i]=1;
	}
	
	$PTBO[$i]=$TBO[$i]/$tcount[$i];
	
	
	//HAIR

	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and Hair='$hair'";
	$result=mysqli_query($connection, $s1);
	$TH[$i]=mysqli_num_rows($result);
	
	if($TH[$i]==0)
	{
		$TH[$i]=1;
	}
	
	$PTH[$i]=$TH[$i]/$tcount[$i];

	

	//SKIN

	$s1="SELECT * FROM dataset WHERE Top_colour='$TCC[$i]' and skin='$skin'";
	$result=mysqli_query($connection, $s1);
	$TSK[$i]=mysqli_num_rows($result);
	
	if($TSK[$i]==0)
	{
		$TSK[$i]=1;
	}
	
	$PTSK[$i]=$TSK[$i]/$tcount[$i];
	
	//FINAL RESULT BEFORE SORTING (TOP) AND NEXT PART WILL BE FOR BOTTOM JMD LETS ROCK HIMESH BHAI HAI
	$pt[$i]=$PTG[$i]*$PTB[$i]*$PTS[$i]*$PTO[$i]*$PTBO[$i]*$PTH[$i]*$PTSK[$i]*$pp[$i];
	}
	$max=0;
	for( $i = 0; $i<6; $i++ ){
		if($pt[$i]>$max){
			$max=$pt[$i];
			$n=$i;
		}
	}
	for( $i = 0; $i<6; $i++ ){
		$temp[0][$i]=$pt[$i];
		$temp[1][$i]=$i;
	}
	for( $i = 0; $i<6; $i++ ){
		for( $j = $i+1; $j<6; $j++ ){
			if($temp[0][$i]<$temp[0][$j]){
				$val=$temp[0][$i];
				$ind=$temp[1][$i];
				$temp[0][$i]=$temp[0][$j];
				$temp[1][$i]=$temp[1][$j];
				$temp[0][$j]=$val;
				$temp[1][$j]=$ind;
			}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//ALGO BOTTOM
	
	$B = array("Pant", "Jeans", "Shorts","Pyjama"); 
	$T1="Pant";
	$T2="Jeans";
	$T3="Shorts";
	$T4="Pyjama";
	
	
	$tc=0;
//TOTAL COUNT
	$sql="SELECT * FROM dataset";
	$result=mysqli_query($connection, $sql);
	$tc=mysqli_num_rows($result);
	
	
	$s1="SELECT * FROM dataset WHERE Bottom='$T1'";
	$result=mysqli_query($connection, $s1);
	$t1count=mysqli_num_rows($result);
	
	$p1=$t1count/$tc;
	

	$s1="SELECT * FROM dataset WHERE Bottom='$T2'";
	$result=mysqli_query($connection, $s1);
	$t2count=mysqli_num_rows($result);
	
	$p2=$t2count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Bottom='$T3'";
	$result=mysqli_query($connection, $s1);
	$t3count=mysqli_num_rows($result);
	
	$p3=$t3count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Bottom='$T4'";
	$result=mysqli_query($connection, $s1);
	$t4count=mysqli_num_rows($result);
	
	$p4=$t4count/$tc;
	
	
	
	
	
	$tcount=array($t1count,$t2count,$t3count,$t4count);
	$pp=array($p1,$p2,$p3,$p4);
	
	//CONDITIONAL PROBS
	
	//GENDER
	for( $i = 0; $i<4; $i++ ){
	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and Gender='$gender'";
	$result=mysqli_query($connection, $s1);
	$TG[$i]=mysqli_num_rows($result);
	
	if($TG[$i]==0)
	{
		$TG[$i]=1;
	}
	
	$PTG[$i]=$TG[$i]/$tcount[$i];
	
	

	//BUDGET
	
	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and Budget='$budget'";
	$result=mysqli_query($connection, $s1);
	$TB[$i]=mysqli_num_rows($result);
	
	if($TB[$i]==0)
	{
		$TB[$i]=1;
	}
	
	$PTB[$i]=$TB[$i]/$tcount[$i];
	

	//SEASON

	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and Season='$season'";
	$result=mysqli_query($connection, $s1);
	$TS[$i]=mysqli_num_rows($result);
	
	if($TS[$i]==0)
	{
		$TS[$i]=1;
	}
	
	$PTS[$i]=$TS[$i]/$tcount[$i];
	


	//OCCASION

	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and Occasion='$place'";
	$result=mysqli_query($connection, $s1);
	$TO[$i]=mysqli_num_rows($result);
	
	if($TO[$i]==0)
	{
		$TO[$i]=1;
	}
	
	$PTO[$i]=$TO[$i]/$tcount[$i];


	
	//BODY TYPE

	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and Body_type='$body'";
	$result=mysqli_query($connection, $s1);
	$TBO[$i]=mysqli_num_rows($result);
	
	if($TBO[$i]==0)
	{
		$TBO[$i]=1;
	}
	
	$PTBO[$i]=$TBO[$i]/$tcount[$i];
	
	
	//HAIR

	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and Hair='$hair'";
	$result=mysqli_query($connection, $s1);
	$TH[$i]=mysqli_num_rows($result);
	
	if($TH[$i]==0)
	{
		$TH[$i]=1;
	}
	
	$PTH[$i]=$TH[$i]/$tcount[$i];

	

	//SKIN

	$s1="SELECT * FROM dataset WHERE Bottom='$B[$i]' and skin='$skin'";
	$result=mysqli_query($connection, $s1);
	$TSK[$i]=mysqli_num_rows($result);
	
	if($TSK[$i]==0)
	{
		$TSK[$i]=1;
	}
	
	$PTSK[$i]=$TSK[$i]/$tcount[$i];
	
	//FINAL RESULT BEFORE SORTING (TOP) AND NEXT PART WILL BE FOR BOTTOM JMD LETS ROCK HIMESH BHAI HAI
	$pt[$i]=$PTG[$i]*$PTB[$i]*$PTS[$i]*$PTO[$i]*$PTBO[$i]*$PTH[$i]*$PTSK[$i]*$pp[$i];
	
	
	}
	$max=0;
	for( $i = 0; $i<4; $i++ ){
		if($pt[$i]>$max){
			$max=$pt[$i];
			$l=$i;
		}
	}
	
	for( $i = 0; $i<4; $i++ ){
		$temp2[0][$i]=$pt[$i];
		$temp2[1][$i]=$i;
	}
	for( $i = 0; $i<4; $i++ ){
		for( $j = $i+1; $j<4; $j++ ){
			if($temp2[0][$i]<$temp2[0][$j]){
				$val=$temp2[0][$i];
				$ind=$temp2[1][$i];
				$temp2[0][$i]=$temp2[0][$j];
				$temp2[1][$i]=$temp2[1][$j];
				$temp2[0][$j]=$val;
				$temp2[1][$j]=$ind;
			}
		}
	}
	
	
	
	
	
	
	
	//ALGO BOTTOM COLOUR
	
	$BCC = array("Blue", "Black","Brown","Grey"); 
	$T1="Blue";
	$T2="Black";
	$T3="Brown";
	$T4="Grey";
	
	$tc=0;
//TOTAL COUNT
	$sql="SELECT * FROM dataset";
	$result=mysqli_query($connection, $sql);
	$tc=mysqli_num_rows($result);
	
	
	$s1="SELECT * FROM dataset WHERE Bottom_colour='$T1'";
	$result=mysqli_query($connection, $s1);
	$t1count=mysqli_num_rows($result);
	
	$p1=$t1count/$tc;
	

	$s1="SELECT * FROM dataset WHERE Bottom_colour='$T2'";
	$result=mysqli_query($connection, $s1);
	$t2count=mysqli_num_rows($result);
	
	$p2=$t2count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Bottom_colour='$T3'";
	$result=mysqli_query($connection, $s1);
	$t3count=mysqli_num_rows($result);
	
	$p3=$t3count/$tc;
	
	$s1="SELECT * FROM dataset WHERE Bottom_colour='$T4'";
	$result=mysqli_query($connection, $s1);
	$t4count=mysqli_num_rows($result);
	
	$p4=$t4count/$tc;
	
	
	
	$tcount=array($t1count,$t2count,$t3count,$t4count);
	$pp=array($p1,$p2,$p3,$p4);
	
	//CONDITIONAL PROBS
	
	//GENDER
	for( $i = 0; $i<4; $i++ ){
	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and Gender='$gender'";
	$result=mysqli_query($connection, $s1);
	$TG[$i]=mysqli_num_rows($result);
	
	if($TG[$i]==0)
	{
		$TG[$i]=1;
	}
	
	$PTG[$i]=$TG[$i]/$tcount[$i];
	
	

	//BUDGET
	
	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and Budget='$budget'";
	$result=mysqli_query($connection, $s1);
	$TB[$i]=mysqli_num_rows($result);
	
	if($TB[$i]==0)
	{
		$TB[$i]=1;
	}
	
	$PTB[$i]=$TB[$i]/$tcount[$i];
	

	//SEASON

	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and Season='$season'";
	$result=mysqli_query($connection, $s1);
	$TS[$i]=mysqli_num_rows($result);
	
	if($TS[$i]==0)
	{
		$TS[$i]=1;
	}
	
	$PTS[$i]=$TS[$i]/$tcount[$i];
	


	//OCCASION

	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and Occasion='$place'";
	$result=mysqli_query($connection, $s1);
	$TO[$i]=mysqli_num_rows($result);
	
	if($TO[$i]==0)
	{
		$TO[$i]=1;
	}
	
	$PTO[$i]=$TO[$i]/$tcount[$i];


	
	//BODY TYPE

	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and Body_type='$body'";
	$result=mysqli_query($connection, $s1);
	$TBO[$i]=mysqli_num_rows($result);
	
	if($TBO[$i]==0)
	{
		$TBO[$i]=1;
	}
	
	$PTBO[$i]=$TBO[$i]/$tcount[$i];
	
	
	//HAIR

	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and Hair='$hair'";
	$result=mysqli_query($connection, $s1);
	$TH[$i]=mysqli_num_rows($result);
	
	if($TH[$i]==0)
	{
		$TH[$i]=1;
	}
	
	$PTH[$i]=$TH[$i]/$tcount[$i];

	

	//SKIN

	$s1="SELECT * FROM dataset WHERE Bottom_colour='$BCC[$i]' and skin='$skin'";
	$result=mysqli_query($connection, $s1);
	$TSK[$i]=mysqli_num_rows($result);
	
	
	if($TSK[$i]==0)
	{
		$TSK[$i]=1;
	}
	
	$PTSK[$i]=$TSK[$i]/$tcount[$i];
	
	//FINAL RESULT BEFORE SORTING (TOP) AND NEXT PART WILL BE FOR BOTTOM JMD LETS ROCK HIMESH BHAI HAI
	$pt[$i]=$PTG[$i]*$PTB[$i]*$PTS[$i]*$PTO[$i]*$PTBO[$i]*$PTH[$i]*$PTSK[$i]*$pp[$i];
	}
	$max=0;
	for( $i = 0; $i<4; $i++ ){
		if($pt[$i]>$max){
			$max=$pt[$i];
			$o=$i;
		}
	}
for( $i = 0; $i<4; $i++ ){
		$temp3[0][$i]=$pt[$i];
		$temp3[1][$i]=$i;
	}
	for( $i = 0; $i<4; $i++ ){
		for( $j = $i+1; $j<4; $j++ ){
			if($temp3[0][$i]<$temp3[0][$j]){
				$val=$temp3[0][$i];
				$ind=$temp3[1][$i];
				$temp3[0][$i]=$temp3[0][$j];
				$temp3[1][$i]=$temp3[1][$j];
				$temp3[0][$j]=$val;
				$temp3[1][$j]=$ind;
			}
		}
	}
	
	
	?>
	<div class="wrapper row3">
	<br>
	<center><h2>YOUR RECORDED INPUTS:<h2>
	<h4>
	<?php
		echo "Gender: ".$gender."<br>";
		echo "Budget: ".$budget."<br>";
		echo "Season: ".$season."<br>";
		echo "Occasion: ".$place."<br>";
		echo "Body Type: ".$body."<br>";
		echo "Hair Colour: ".$hair."<br>";
		echo "Skin Colour: ".$skin."<br><br>";
		
		echo "<h2>OUR RECOMMENDATION: <h2> <br>";
		
		echo "Top: ".$TCC[$n]." ".$T[$m]."<br>";
		echo "Bottom: ".$BCC[$o]." ".$B[$l]."<br><br><br>";
		
		$query = "INSERT INTO user_input (user_id,gender,budget,season,occasion,body_type,hair,skin,Top,Top_colour,Bottom,Bottom_colour) VALUES ('$myusername','$gender','$budget','$season','$place','$body','$hair','$skin','$T[$m]','$TCC[$n]','$B[$l]','$BCC[$o]')";
		mysqli_query($connection,$query);
		
		$querys = "INSERT INTO dataset VALUES ('$myusername','$fname','$lname','$gender','$budget','$season','$place','$T[$m]','$TCC[$n]','$B[$l]','$BCC[$o]','$body','$hair','$skin')";
		mysqli_query($connection,$querys);
?>
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
               <input name="topc" id="topc" value='<?php echo $TCC[$temp[1][1]]; ?> ' type="hidden">
			   <input name="top" id="top" value='<?php echo $T[$temp1[1][1]]; ?> ' type="hidden">
			   <input name="bottomc" id="bottomc" value='<?php echo $BCC[$temp3[1][1]]; ?> ' type="hidden">
			   <input name="bottom" id="bottom" value='<?php echo $B[$temp2[1][1]]; ?> ' type="hidden">
		<input class="btn" type="submit" name="signup" value="Unsatisfied?"/> 
		<br><br>
		</form>
	
		
		
		</div>
		<br>
	<br>
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