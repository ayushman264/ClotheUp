<?php
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

	$result=mysql_query("SELECT * FROM smalldataset")or die(mysql_error());
	$tc=mysql_num_rows($result);
	
	
	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T1'")or die(mysql_error());
	$t1count=mysql_num_rows($result);
		

	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T2'")or die(mysql_error());
	$t2count=mysql_num_rows($result);
	
	
	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T3'")or die(mysql_error());
	$t3count=mysql_num_rows($result);
	
	
	
	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T4'")or die(mysql_error());
	$t4count=mysql_num_rows($result);
	
	
	
	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T5'")or die(mysql_error());
	$t5count=mysql_num_rows($result);
	
	
	
	
	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T6'")or die(mysql_error());
	$t6count=mysql_num_rows($result);
	
	
	
	
	$result=mysql_query("SELECT * FROM smalldataset WHERE Top='$T7'")or die(mysql_error());
	$t7count=mysql_num_rows($result);
	
	
	
	
	$entropy= -($t1count/$tc)*log($t1count/$tc,7)-($t2count/$tc)*log($t2count/$tc,7)-($t3count/$tc)*log($t3count/$tc,7)-($t4count/$tc)*log($t4count/$tc,7)-($t5count/$tc)*log($t5count/$tc,7)-($t6count/$tc)*log($t6count/$tc,7)-($t7count/$tc)*log($t7count/$tc,7);
	// echo "ENTROPY: ".$entropy."<br>";
	
	
	//FOR SEASON (SUMMER ENTROPY AND WINTER ENTROPY THEN GAIN FOR SEASON WITH TOP ENTROPY)
	
	
	$result=mysql_query("SELECT * FROM smalldataset where Season='Summer'")or die(mysql_error());
	$scount=mysql_num_rows($result);
	
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Season='Summer' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$summerentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$summerentropy=$summerentropy-($summer[$i]/$scount)*log($summer[$i]/$scount,7);
	}
	//echo "<br>".$summerentropy."<br>";
	
	
	
	
	
	$result=mysql_query("SELECT * FROM smalldataset where Season='Winter'")or die(mysql_error());
	$wcount=mysql_num_rows($result);
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Season='Winter' and Top='$T[$i]'")or die(mysql_error());
	$winter[$i]=mysql_num_rows($result);
	}
	
	$winterentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$winterentropy=$winterentropy-($winter[$i]/$wcount)*log($winter[$i]/$wcount,7);
	}
	
	//echo $winterentropy."<br>";
	
	
	//echo "Gain SEASON: ".$gainseason=$entropy-($scount/$tc)*$summerentropy-($wcount/$tc)*$winterentropy."<br>";
	
	
	
	//FOR OCCASION (WEDDING OFFICE CASUAL PARTY ENTROPY THEN GAIN FOR OCCASION WITH TOP ENTROPY)
	
	$O = array("Wedding", "Office", "Casual","Party"); 
	for( $i = 0; $i<4; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='$O[$i]'")or die(mysql_error());
	$ocount[$i]=mysql_num_rows($result);
	}
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Wedding' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	}
	
	$weddingentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$weddingentropy=$weddingentropy-($summer[$i]/$ocount[0])*log($summer[$i]/$ocount[0],7);
	}
	
	//echo "<br>".$weddingentropy;
	
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Office' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	if(mysql_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	}
	
	$officeentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$officeentropy=$officeentropy-($summer[$i]/$ocount[1])*log($summer[$i]/$ocount[1],7);
	}
	//echo "<br>".$officeentropy;
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Casual' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$casualentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$casualentropy=$casualentropy-($summer[$i]/$ocount[2])*log($summer[$i]/$ocount[2],7);
	}
	
	//echo "<br>".$casualentropy;
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Party' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$partyentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$partyentropy=$partyentropy-($summer[$i]/$ocount[3])*log($summer[$i]/$ocount[3],7);
	}
	
	//echo "<br>".$partyentropy."<br>";
	
	
	//echo "Gain OCCASION: ".$gainoccasion=$entropy-($ocount[0]/$tc)*$weddingentropy-($ocount[1]/$tc)*$officeentropy-($ocount[2]/$tc)*$casualentropy-($ocount[3]/$tc)*$partyentropy."<br>";
	
	
	

	
	//FOR SKIN (FAIR WHEATISH DARK ENTROPY THEN GAIN FOR SKIN WITH TOP ENTROPY)
	
	$O = array("Fair", "Wheatish", "Dark"); 
	for( $i = 0; $i<3; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where skin='$O[$i]'")or die(mysql_error());
	$ocount[$i]=mysql_num_rows($result);
	}
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where skin='Fair' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$fairentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$fairentropy=$fairentropy-($summer[$i]/$ocount[0])*log($summer[$i]/$ocount[0],7);
	}
	
	//echo "<br>".$fairentropy;
	
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where skin='Wheatish' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$wheatentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$wheatentropy=$wheatentropy-($summer[$i]/$ocount[1])*log($summer[$i]/$ocount[1],7);
	}
	//echo "<br>".$wheatentropy;
	
	//
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where skin='Dark' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	if(mysql_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	}
	
	$darkentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$darkentropy=$darkentropy-($summer[$i]/$ocount[2])*log($summer[$i]/$ocount[2],7);
	}
	//echo "<br>".$darkentropy."<br>";
	
	//
	
	
	//echo "Gain SKIN: ".$gainbudget=($entropy-($ocount[0]/$tc)*$fairentropy-($ocount[1]/$tc)*$wheatentropy-($ocount[2]/$tc)*$darkentropy)."<br>";
	
	
	//FOR GENDER (MALE ENTROPY AND FEMALE ENTROPY THEN GAIN FOR GENDER WITH TOP ENTROPY)
	
	$result=mysql_query("SELECT * FROM smalldataset where Gender='Male'")or die(mysql_error());
	$scount=mysql_num_rows($result);
	
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Gender='Male' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$maleentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$maleentropy=$maleentropy-($summer[$i]/$scount)*log($summer[$i]/$scount,7);
	}
	//echo "<br>".$maleentropy."<br>";
	
	
	
	
	
	$result=mysql_query("SELECT * FROM smalldataset where Gender='Female'")or die(mysql_error());
	$wcount=mysql_num_rows($result);
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Gender='Female' and Top='$T[$i]'")or die(mysql_error());
	$winter[$i]=mysql_num_rows($result);
	}
	
	$femaleentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$femaleentropy=$femaleentropy-($winter[$i]/$wcount)*log($winter[$i]/$wcount,7);
	}
	
	//echo $femaleentropy."<br>";
	
	
	//echo "Gain Gender ".$gainseason=$entropy-($scount/$tc)*$maleentropy-($wcount/$tc)*$femaleentropy."<br>";
	
	
	
	
	
	
	
	
	//echo "<br>GAIN OCCASION IS MAXIMUM: ".$gainoccasion;
	//echo "<br>In occasion, Party Entropy is maximum ";
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Party' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);
	}
	
	$max=0;
	for( $i = 0; $i<7; $i++ ){
		if($summer[$i]>max)
		{
			$max=$i;
		}
	}
	
	//echo "<br>If person selects ocassion party: ".$T[$max];
	
	
	
	
	
	//WEDDING ENTROPY AND GAIN WITH GENDER
	
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Wedding'")or die(mysql_error());
	$wedcount=mysql_num_rows($result);
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Wedding' and Top='$T[$i]'")or die(mysql_error());
	$wedd[$i]=mysql_num_rows($result);
	if(mysql_num_rows($result)==0)
	{
		$wedd[$i]=1;
	}
	
	}
	$wedentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$wedentropy=$wedentropy-($wedd[$i]/$wedcount)*log($wedd[$i]/$wedcount,7);
	}
	
	//echo "<br><br>wed ent : ". $wedentropy;

	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Wedding' and Top='$T[$i]'")or die(mysql_error());
	$summer[$i]=mysql_num_rows($result);

	
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	
	//echo $summer[$i]."<br>";
	}
	
	for( $i = 0; $i<7; $i++ ){
	$result=mysql_query("SELECT * FROM smalldataset where Occasion='Wedding' and Gender='Male' and Top='$T[$i]'")or die(mysql_error());
	$malcount[$i]=mysql_num_rows($result);
	if(mysql_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	
	}
	
	
	
	$maleeentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$maleeentropy=$maleeentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "MALE WEDDING ENTROPY".$maleeentropy;
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Gender='Female' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$malcount[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	}
	
	
	
	$femaleeentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$femaleeentropy=$femaleeentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "FEMALE WEDDING ENTROPY".$femaleeentropy;
	
	
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Gender='Male'";
	$result=mysqli_query($connection, $s1);
	$gcount[0]=mysqli_num_rows($result);
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Gender='Female'";
	$result=mysqli_query($connection, $s1);
	$gcount[1]=mysqli_num_rows($result);
	
	//gain for wedding and gender
	
	//echo "<br>Gain WEDIING GENDER: ".$gainWEDGEN=$wedentropy-($gcount[0]/$wedcount)*$maleeentropy-($gcount[1]/$wedcount)*$femaleeentropy."<br>";
	
	
	
	
	
	
	
	
	
	
	
	
	
	//WEDDING ENTROPY AND GAIN WITH SKIN
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding'";
	$result=mysqli_query($connection, $s1);
	$wedcount=mysqli_num_rows($result);
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$wedd[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$wedd[$i]=1;
	}
	
	}
	$wedentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$wedentropy=$wedentropy-($wedd[$i]/$wedcount)*log($wedd[$i]/$wedcount,7);
	}
	
	//echo "<br><br>wed ent : ". $wedentropy;

	
	for( $i = 0; $i<7; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Top='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);

	
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	
	//echo $summer[$i]."<br>";
	}
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and skin='Fair' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$malcount[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	
	}
	
	
	
	$fairrentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$fairrentropy=$fairrentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "FAIR SKIN WEDDING ENTROPY".$fairrentropy;
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and skin='Wheatish' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$malcount[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	}
	
	
	
	$wheatishhentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$wheatishhentropy=$wheatishhentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "WHEATISH skin WEDDING ENTROPY".$wheatishhentropy;
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and skin='Dark' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$malcount[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	}
	
	
	
	$darkkentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$darkkentropy=$darkkentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "DARK skin WEDDING ENTROPY".$darkkentropy;
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and skin='Fair'";
	$result=mysqli_query($connection, $s1);
	$gcount[0]=mysqli_num_rows($result);
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and skin='Wheatish'";
	$result=mysqli_query($connection, $s1);
	$gcount[1]=mysqli_num_rows($result);
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and skin='Dark'";
	$result=mysqli_query($connection, $s1);
	$gcount[2]=mysqli_num_rows($result);
	
	//gain for wedding and gender
	$gainWEDGEN=$wedentropy-($gcount[0]/$wedcount)*$fairrentropy-($gcount[1]/$wedcount)*$wheatishhentropy-($gcount[2]/$wedcount)*$darkkentropy;
	//echo "<br>Gain WEDDING SKIN: ".$gainWEDGEN=-$gainWEDGEN."<br>";
	
	
	
	
	
	
	
	
	
	//WEDDING ENTROPY AND GAIN WITH SEASON
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding'";
	$result=mysqli_query($connection, $s1);
	$wedcount=mysqli_num_rows($result);
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$wedd[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$wedd[$i]=1;
	}
	
	}
	$wedentropy=0;
	for( $i = 0; $i<7; $i++ ){
	$wedentropy=$wedentropy-($wedd[$i]/$wedcount)*log($wedd[$i]/$wedcount,7);
	}
	
	//echo "<br><br>wed ent : ". $wedentropy;

	
	for( $i = 0; $i<7; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Top='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);

	
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	
	//echo $summer[$i]."<br>";
	}
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Season='Summer' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$malcount[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	
	}
	
	
	
	$summentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$summentropy=$summentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "<br>SUMMER WEDDING ENTROPY".$summentropy;
	
	for( $i = 0; $i<7; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Season='Winter' and Top='$T[$i]'";
	$result=mysqli_query($connection, $s1);
	$malcount[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$malcount[$i]=1;
	}
	}
	
	
	
	$winttentropy=0;
	for( $i = 0; $i<7;$i++ ){
	$winttentropy=$winttentropy-($malcount[$i]/$summer[$i])*log($malcount[$i]/$summer[$i],7);
	}
	//echo "FEMALE WEDDING ENTROPY".$winttentropy;
	
	
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Season='Winter'";
	$result=mysqli_query($connection, $s1);
	$gcount[0]=mysqli_num_rows($result);
	
	$s1="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Season='Summer'";
	$result=mysqli_query($connection, $s1);
	$gcount[1]=mysqli_num_rows($result);
	
	//gain for wedding and gender
	
	//echo "<br>Gain WEDDING SEASON: ".$gainWEDGEN=$wedentropy-($gcount[0]/$wedcount)*$maleeentropy-($gcount[1]/$wedcount)*$femaleeentropy."<br>";
	
	
	
	
	
	
	
	//BOTTOM
	
	
	
	
	
	$T = array("Jeans", "Pant", "Shorts","Pyjama"); 
	$T1="Jeans";
	$T2="Pant";
	$T3="Shorts";
	$T4="Pyjama";
	
	
	$tc=0;
//TOTAL COUNT
	$sql="SELECT * FROM smalldataset";
	$result=mysqli_query($connection, $sql);
	$tc=mysqli_num_rows($result);
	
	
	$s1="SELECT * FROM smalldataset WHERE Bottom='$T1'";
	$result=mysqli_query($connection, $s1);
	$t1count=mysqli_num_rows($result);
	
		

	$s1="SELECT * FROM smalldataset WHERE Bottom='$T2'";
	$result=mysqli_query($connection, $s1);
	$t2count=mysqli_num_rows($result);
	
	
	
	$s1="SELECT * FROM smalldataset WHERE Bottom='$T3'";
	$result=mysqli_query($connection, $s1);
	$t3count=mysqli_num_rows($result);
	
	
	
	$s1="SELECT * FROM smalldataset WHERE Bottom='$T4'";
	$result=mysqli_query($connection, $s1);
	$t4count=mysqli_num_rows($result);
	
	
	
	
	$entropy= -($t1count/$tc)*log($t1count/$tc,4)-($t2count/$tc)*log($t2count/$tc,4)-($t3count/$tc)*log($t3count/$tc,4)-($t4count/$tc)*log($t4count/$tc,4);
	//echo "ENTROPY: ".$entropy."<br>";
	
	
	//FOR SEASON (SUMMER ENTROPY AND WINTER ENTROPY THEN GAIN FOR SEASON WITH Bottom ENTROPY)
	
	$s1="SELECT * FROM smalldataset WHERE Season='Summer'";
	$result=mysqli_query($connection, $s1);
	$scount=mysqli_num_rows($result);
	
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Season='Summer' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	}
	
	$summerentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$summerentropy=$summerentropy-($summer[$i]/$scount)*log($summer[$i]/$scount,4);
	}
	//echo "<br>".$summerentropy."<br>";
	
	
	
	
	
	$s1="SELECT * FROM smalldataset WHERE Season='Winter'";
	$result=mysqli_query($connection, $s1);
	$wcount=mysqli_num_rows($result);
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Season='Winter' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$winter[$i]=mysqli_num_rows($result);
	}
	
	$winterentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$winterentropy=$winterentropy-($winter[$i]/$wcount)*log($winter[$i]/$wcount,4);
	}
	
	//echo $winterentropy."<br>";
	
	
	//echo "Gain SEASON: ".$gainseason=$entropy-($scount/$tc)*$summerentropy-($wcount/$tc)*$winterentropy."<br>";
	
	
	
	//FOR OCCASION (WEDDING OFFICE CASUAL PARTY ENTROPY THEN GAIN FOR OCCASION WITH Bottom ENTROPY)
	
	$O = array("Wedding", "Office", "Casual","Party"); 
	for( $i = 0; $i<4; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE Occasion='$O[$i]'";
	$result=mysqli_query($connection, $s1);
	$ocount[$i]=mysqli_num_rows($result);
	}
	
	//
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Occasion='Wedding' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	}
	
	$weddingentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$weddingentropy=$weddingentropy-($summer[$i]/$ocount[0])*log($summer[$i]/$ocount[0],4);
	}
	
	//echo "<br>".$weddingentropy;
	
	
	//
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Occasion='Office' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	}
	
	$officeentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$officeentropy=$officeentropy-($summer[$i]/$ocount[1])*log($summer[$i]/$ocount[1],4);
	}
	//echo "<br>".$officeentropy;
	
	//
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Occasion='Casual' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	}
	
	$casualentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$casualentropy=$casualentropy-($summer[$i]/$ocount[2])*log($summer[$i]/$ocount[2],4);
	}
	
	//echo "<br>".$casualentropy;
	
	//
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Occasion='Party' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	}
	
	$partyentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$partyentropy=$partyentropy-($summer[$i]/$ocount[3])*log($summer[$i]/$ocount[3],4);
	}
	
	//echo "<br>".$partyentropy."<br>";
	
	
	//echo "Gain OCCASION: ".$gainoccasion=$entropy-($ocount[0]/$tc)*$weddingentropy-($ocount[1]/$tc)*$officeentropy-($ocount[2]/$tc)*$casualentropy-($ocount[3]/$tc)*$partyentropy."<br>";
	
	
	

	
	//FOR SKIN (FAIR WHEATISH DARK ENTROPY THEN GAIN FOR SKIN WITH TOP ENTROPY)
	
	$O = array("Fair", "Wheatish", "Dark"); 
	for( $i = 0; $i<3; $i++ ){
	$s1="SELECT * FROM smalldataset WHERE skin='$O[$i]'";
	$result=mysqli_query($connection, $s1);
	$ocount[$i]=mysqli_num_rows($result);
	}
	
	//
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE skin='Fair' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	}
	
	$fairentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$fairentropy=$fairentropy-($summer[$i]/$ocount[0])*log($summer[$i]/$ocount[0],4);
	}
	
	//echo "<br>".$fairentropy;
	
	
	//
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE skin='Wheatish' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	}
	
	$wheatentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$wheatentropy=$wheatentropy-($summer[$i]/$ocount[1])*log($summer[$i]/$ocount[1],4);
	}
	//echo "<br>".$wheatentropy;
	
	//
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE skin='Dark' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	if(mysqli_num_rows($result)==0)
	{
		$summer[$i]=1;
	}
	}
	
	$darkentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$darkentropy=$darkentropy-($summer[$i]/$ocount[2])*log($summer[$i]/$ocount[2],4);
	}
	 "<br>".$darkentropy."<br>";
	
	//
	
	
	 "Gain SKIN: ".$gainbudget=($entropy-($ocount[0]/$tc)*$fairentropy-($ocount[1]/$tc)*$wheatentropy-($ocount[2]/$tc)*$darkentropy)."<br>";
	
	
	//FOR GENDER (MALE ENTROPY AND FEMALE ENTROPY THEN GAIN FOR GENDER WITH TOP ENTROPY)
	
	$s1="SELECT * FROM smalldataset WHERE Gender='Male'";
	$result=mysqli_query($connection, $s1);
	$scount=mysqli_num_rows($result);
	
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Gender='Male' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$summer[$i]=mysqli_num_rows($result);
	}
	
	$maleentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$maleentropy=$maleentropy-($summer[$i]/$scount)*log($summer[$i]/$scount,4);
	}
	 "<br>".$maleentropy."<br>";
	
	
	
	
	
	$s1="SELECT * FROM smalldataset WHERE Gender='Female'";
	$result=mysqli_query($connection, $s1);
	$wcount=mysqli_num_rows($result);
	
	for( $i = 0; $i<4; $i++ ){
	$si="SELECT * FROM smalldataset WHERE Gender='Female' and Bottom='$T[$i]'";
	$result=mysqli_query($connection, $si);
	$winter[$i]=mysqli_num_rows($result);
	}
	
	$femaleentropy=0;
	for( $i = 0; $i<4; $i++ ){
	$femaleentropy=$femaleentropy-($winter[$i]/$wcount)*log($winter[$i]/$wcount,4);
	}
	
	 $femaleentropy."<br>";
	
	
	 "Gain Gender ".$gainseason=$entropy-($scount/$tc)*$maleentropy-($wcount/$tc)*$femaleentropy."<br>";
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$ss=mysql_query("SELECT * FROM testingdataset")or die(mysql_error());
	$t=mysql_num_rows($ss);
	$count=0;
	$tcount=0;
	$bcount=0;
	while($result=mysql_fetch_array($ss)){

	$myusername=$result['Username'];
	$fname=$result['Fname']."    ";
	$lname=$result['Lname'];
	$gender=$result['Gender'];
	$season=$result['Season'];
	$place=$result['Occasion'];
	$skin=$result['skin'];
	$top=$result['Top'];
	$bottom=$result['Bottom'];
	

	
	
	
	
	if($place=='Party')
	{
		$topop='Jacket';
	}
	else if($place=='Wedding')
	{
		if($gender=='Female')
		{
			$topop='Kurtaaaaa';
		}
		else
		{
			if($season=='Summer')
			{
				$topop='Full Shirt';
			}
			else
			{
				if($skin=='Fair')
				{
					$topop='Coat';
				}
				
				else if($skin=='Wheatish')
				{
					$topop='Full Shirt';
				}
				
				else
					$topop='Jacket';
			}
		}
	}
	else if($place=='Office')
	{
		if($season=='Summer')
		{
			$topop='Half Shirt';
		}
		else
		{
			if($gender=='Female')
			{
				$topop='Jacket';
			}
			else
			{
				if($skin=='Fair')
				{
					$topop='Coat';
				}
				
				else if($skin=='Wheatish')
				{
					$topop='Full Shirt';
				}
				
				else
					$topop='Coat';
			}
		}
	}
	else
	{
		if($season=='Summer')
		{
			$topop='Half Tshirt';
		}
		else
		{
			if($gender=='Female')
			{
				$topop='Jacket';
			}
			else
			{
				if($skin=='Fair')
				{
					$topop='Full Tshirt';
				}
				
				else if($skin=='Wheatish')
				{
					$topop='Full Shirt';
				}
				
				else
					$topop='Full Shirt';
			}
		}
	}
	
	
	
	
	
	
	
	
	
	if($topop==$top)
	{
		$tcount=$tcount+1;
	}
	
	
	
	
	//echo $top."  ".$topop."<br>";
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//BOTTOM
	
	if($place=='Wedding')
	{
		$botop='Jeans';
	}
	else if($place=='Office')
	{
		if($gender=='Female')
		{
			$botop='Pant';
		}
		else
		{
			if($season=='Summer')
			{
				$botop='Jeans';
			}
			else
			{
				if($skin=='Fair')
				{
					$botop='Jeans';
				}
				
				else if($skin=='Wheatish')
				{
					$botop='Pant';
				}
				
				else
					$botop='Pant';
			}
		}
	}
	else if($place=='Casual')
	{
		if($gender=='Female')
		{
			$botop='Shorts';
		}
		else
		{
			if($season=='Summer')
			{
				$botop='Shorts';
			}
			else
			{
				if($skin=='Fair')
				{
					$botop='Jeans';
				}
				
				else if($skin=='Wheatish')
				{
					$botop='Jeans';
				}
				
				else
					$botop='Jeans';
			}
		}
	}
	else
	{
		if($season=='Summer')
		{
			$botop='Jeans';
		}
		else
		{
			if($gender=='Male')
			{
				$botop='Jeans';
			}
			else
			{
				if($skin=='Fair')
				{
					$botop='Shorts';
				}
				
				else if($skin=='Wheatish')
				{
					$botop='Jeans';
				}
				
				else
					$botop='Jeans';
			}
		}
	}
	
	if($botop==$bottom)
	{
		$bcount=$bcount+1;
	}
	
	if($topop==$top and $botop==$bottom)
	{
		$count=$count+1;
		
	}
	
	
	}

	
		?>
		<div class="wrapper row3">
	<br>
	<center><h1>Testing Report (Decision Tree)</h1>
	<h4>
	<?php
		echo "<h2>Total Testing Data:  ".$t."<br><br>";
		echo "<center><h2>Total Tops Matched:  ".$tcount;
		echo "<h2>Total Bottoms Matched: ".$bcount."<br><br>";
		//echo "<h2>Total Top-Bottom Combinations Matched: ".$count;
		
		$tacc=($tcount/$t)*100;
		$bacc=($bcount/$t)*100;
		$both=($count/$t)*100;
		$bacc=number_format($bacc,4);
		echo "Top Accuracy: ".$tacc."%<br>";
		echo "Bottom Accuracy: ".$bacc."%<br><br>";
		//echo "Both Accuracy: ".$both."%<br><br><br>";
		
		
?>
		
		
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