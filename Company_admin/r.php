<?php

include 'config.php';
if(isset($_POST['submit'])){
$username= $_POST['uname'];
$name= $_POST['name'];
$email= $_POST['email'];
$pass= md5($_POST['pass']);
$cpass= md5($_POST['cpass']);

if($pass==$cpass){
  $sql="select * from admin where username='$username'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) >0)
{
  echo "<script>alert('user name exists')</script>";
}
else{
  $pass = password_hash($_POST['pass'],PASSWORD_BCRYPT,array('cost'=>12));
$sql="insert into admin(username,name,email,password)
values('$username', '$name', '$email', '$pass')";
$result = mysqli_query($conn,$sql);
if($result){
 
  header("location:login.php");
}else{
  echo "<script>alert('not successfull')</script>";
}
  
}}

else
{
  echo "<script>alert('password not matched')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/icon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Register</title>

  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link rel="stylesheet" type="text/css" href="css/s.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">


  


</head>

<body class="white">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
        
  <img class="wave" src="img/wave1.png">
	<div class="container">
		<div class="img">
			<img src="img/undraw_Notebook_re_id0r.svg">
		</div>
		<div class="login-content">
			<form action="r.php" method="post">
				<img src="img/undraw_male_avatar_323b.svg">
				<h2 class="title">Join us now</h2>
        <div class="input-div name">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Name</h5>
           		   		<input type="text" name= "name" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name= "uname" class="input"  required>
           		   </div>
           		</div>
               <div class="input-div email">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" name= "email" class="input"  required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name= "pass" class="input"  required>
            	   </div>
            	</div>
              <div class="input-div cpass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" name= "cpass" class="input"  required>
            	   </div>
            	</div>
            	<input type="submit" class="btn" name="submit" value="Sign Up">
              <a href="login.php" class ="lr">Click me to Sign in</a>

			</form>
			
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

        <!--<div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" id="username" type="text"  data-error=".errorTxt1">
            <label for="username" class="center-align">Username</label>
			<div class="errorTxt1"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input name="name" id="name" type="text" data-error=".errorTxt2">
            <label for="name" class="center-align">Name</label>
			<div class="errorTxt2"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password" data-error=".errorTxt3">
            <label for="password">Password</label>
			<div class="errorTxt3"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
            <input name="phone" id="phone" type="number" data-error=".errorTxt4">
            <label for="phone">Phone</label>
			<div class="errorTxt4"></div>			
          </div>
        </div>		
        <div class="row">
          <div class="input-field col s12">
			<a href="javascript:void(0);" onclick="document.getElementById('formValidate').submit();" class="btn waves-effect waves-light col s12">Login</a>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="login.php">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
-->


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->

  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
     <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
     
      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
  
</body>
</html>
