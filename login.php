
<?php ob_start();
    session_start();



        // LOGIN SCRIPT


      /* DATABASE CONNECTION*/


        $db['db_host'] = 'localhost';
        $db['db_user'] = 'root';
        $db['db_pass'] = '';
        $db['db_name'] = 'b2b';

      foreach($db as $key=>$value){
          define(strtoupper($key),$value);
      }
      global $conn;
      $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
      if(!$conn){
          die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
      }

      try{
          $db = new PDO('mysql:dbhost=localhost;dbname=Company;charset=utf8','root','');


      }
      catch(Exception $e){

          die('Cannot Establish A Secure Connection To The Host Server At The Moment!');
      }

      /*DATABASE CONNECTION */


      // Define variables and initialize with empty values

      $username = $password = "";

      $username_err = $password_err = "";



      // Processing form data when form is submitted

      if($_SERVER["REQUEST_METHOD"] == "POST"){



          // Check if email is empty

          if(empty(trim($_POST["uname"]))){

              $username_err = 'Please enter an username.';

          } else{

              $username = trim($_POST["uname"]);

          }



          // Check if password is empty

          if(empty(trim($_POST['pass']))){

              $password_err = 'Please enter your password.';

          } else{

              $password = trim($_POST['pass']);

          }



          // Validate credentials

          if(empty($username_err) && empty($password_err)){

              // Prepare a select statement

              $sql = "SELECT username, password FROM admin WHERE username = ?";



              if($stmt = mysqli_prepare($conn, $sql)){

                  // Bind variables to the prepared statement as parameters

                  mysqli_stmt_bind_param($stmt, "s", $param_username);

                  // Set parameters

                  $param_username = $username;

                  // Attempt to execute the prepared statement

                  if(mysqli_stmt_execute($stmt)){

                      // Store result

                      mysqli_stmt_store_result($stmt);

                      // Check if email exists, if yes then verify password

                      if(mysqli_stmt_num_rows($stmt) == 1){

                          // Bind result variables

                          mysqli_stmt_bind_result($stmt, $username, $hashed_password);

                          if(mysqli_stmt_fetch($stmt)){

                              if(password_verify($password, $hashed_password)){

                                  /* Password is correct, so start a new session and

                                  save the email to the session */

                                  

                                  $_SESSION['uname'] = $username;

                                  // $sql = "SELECT department FROM employees WHERE email='$email'" ;
                                  $statement = mysqli_query($conn, $sql);

                                    header("Location: Company_admin/index.php");

                                // Close statement

                                //mysqli_stmt_close($statement);

                                //header("location: sales");

                              } else{

                                  // Display an error message if password is not valid

                                  $password_err = 'The password you entered was not valid. Please try again.';

                              }

                          }

                      } else{

                          // Display an error message if email doesn't exist

                          $username_err = 'No account found with that username';

                      }

                  } else{

                      echo "Oops! Something went wrong.";

                  }

              }



              // Close statement

              mysqli_stmt_close($stmt);

          }



          // Close connection

          mysqli_close($conn);

      }



      ?>

    <!--- LOGIN SCRIPT----->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Login</title>

  <!-- Favicons
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
   For Windows Phone -->


  <!-- CORE CSS-->
  
 
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
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
		  <form class="form-horizontal form-material" id="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<img src="img/undraw_male_avatar_323b.svg">
				<h2 class="title">Welcome</h2>
				<p style="color:red;">  <?php echo $username_err; ?> </p>
                <p style="color:red;">  <?php echo $password_err; ?> </p>
    </br>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="uname" class="input" required value="<?php echo $username ?>">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="pass" class="input" required value="<?php echo $password ?>">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
              <input type="submit" name="submit" class="btn" value="Login">
              
              <a href="r.php" class ="lr">Click me and Register!</a>

			</form>
			
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
 
 
  <!--scrollbar-->


      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
      <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->


</body>
</html>
