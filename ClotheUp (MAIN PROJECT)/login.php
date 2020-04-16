<?php
include('dbcon.php');
?>
<!DOCTYPE html>

    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration</title>
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

    </head>
    <body style="background-color :white;">
        <div class="container" style="padding-top:0;">
            <!-- Codrops top bar -->
                <div class="wrapper row1">
                  <header id="header" class="hoc clear"> 
                    <!-- ################################################################################################ -->
                    <div id="logo" class="fl_left">
                      <h1><a href="index.html">ClotheUp</a></h1>
                    </div>
                    <div id="quickinfo" class="fl_right">
                     
                    </div>
                    <!-- ################################################################################################ -->
                  </header>
                </div>
      <div class="wrapper row2">
  <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="index.html">Home</a></li>
      <li><a class="active" href="gallery.html">Gallery</a>      </li>
      <li><a class="active" href="#contact">Contact Us</a></li>
      <li><a href="login.php">Login/Signup</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>

            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper" style="margin-top:5%">
                        <div id="login" class="animate form">
                            <form  action="checklogin.php" method="POST" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Username </label>
                                    <input id="username" name="Username" required="required" type="text" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="Password" required="required" type="password" placeholder="Enter your password" /> 
                                </p>
                               
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

						
						
						
                        <div id="register" class="animate form">
                            <form  action="register_check.php" autocomplete="on" method="POST"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">First Name</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="Enter Your First Name" />
                                </p>
                                 <p> 
                                    <label for="lastnamesignup" class="uname" data-icon="u">Last Name</label>
                                    <input id="lastnamesignup" name="lastnamesignup" required="required" type="text" placeholder="Enter Your Last Name" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Email id </label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="Enter Your Email"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="Enter Your Password"/>
                                </p>
                                
                                <p>
								  <label for="passwordsignup" class="youpasswd">Gender </label>
                                  MALE<input type="radio" name="gender" required="required" value="male">
                                  FEMALE<input type="radio" name="gender" required="required" value="female">
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                            
                        </div>
						
                    </div>
                </div>  
            </section>
            <div class="wrapper row5" style="margin-top: 10%;"><a name="contact">
              <div id="copyright" class="hoc clear"> 
                <!-- ################################################################################################ -->
                <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">www.clotheup.com</a></p>
             
              </div></a>
            </div>
        </div>
    </body>
</html>