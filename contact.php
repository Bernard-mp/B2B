

<!DOCTYPE html>
<html>
  <head>
  
  <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/icon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>blogger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 1st hallf -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/sty.css">
<!-- 2nd hallf -->
    <link rel="stylesheet" href="./css1/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css1/owl.carousel.min.css">
    <link rel="stylesheet" href="./css1/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css1/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css1/Style.css">
  </head>
  <body>

    <!-- header -->
    <header>
      <nav class = "navbar">
        <div class = "container">
        <div class="top-left-part"><a class="logo" href="index.php"><b style="color:#fff"><img src="plugins/images/png.png" style="width: 100px; height: 40px;" alt="home" /></b></a></div>
          <div class = "navbar-nav">
            <a href = "index.php">Home</a>
           
            <a href = "index.php">blog</a>
            <a href = "Company_admin/login.php">Account</a>
            <a href = "subcribe.php">Subscribe</a>
            <a href = "contact.php">Contact Us</a>
          </div>
        </div>
      </nav>
      <div class = "banner">
        <div class = "container">
          <h1 class = "banner-title">
            <span style="color:#0C1D20">Welcome.</span> Folks
          </h1>
          <p style="color:#fff">Read & get Updated from us</p>
          <span style="color:#0C1D20;font-family:Roboto; font-size: 2rem;" >Write & Update us</span> 
</br>
         
    
        </div>
      </div>
    </header>
    <!-- end of header -->
    <main>
    <section class="container" id="content">
    <div class="mail">
		<div class="container">
			<h2 class="w3l_head w3l_head1">Contact Us</h2>

			<?php
				if (isset($_GET["sent"])) {
					echo 
					'<div class="alert alert-success" >
                         
                         <strong>SENT!! </strong><p> Thank you for your message. We will get back to you as soon as possible.</p>
                    </div>'
					;
				}
			?>
				<div class="agileits_mail_grids">
				<div class="agileits_mail_grid_left">
					<form action="functions/contact.php" method="post">
						<h4>Your Names*</h4>
						<input type="text" name="names" placeholder="Names..." required="">
						<h4>Your Email*</h4>
						<input type="email" name="email" placeholder="Email..." required="">
						<h4>Your Message*</h4>
						<textarea placeholder="Message..." name="message"></textarea>
						<input type="submit" name="submit" value="Send Message">
					</form>
				</div>
			</div>
		</div>
	</div>
        </section>

        <!-- --- map -->
	
<!-- map -->

    </main>
<div class="process all_pad agileits">
	
<div class="w3l-map">
		<iframe width="100%" height="300" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7774.016513889454!2d77.49898763990483!3d13.035145995823608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1621673040398!5m2!1sen!2sin" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
	</div>
    
</div>	
    <!---------------x------------- Main Site Section ---------------x-------------->

  
    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>Description</h2>
                <p>B2B is a website with provide route for blogger to post the blog and make avaliable for the viewers t get updated after reading it and viewers often 
                    visit this site to get updated.
                </p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
            <h2>About Us</h2>
                        <ul>
                            <li><a href="#">About us</a> </li>
                            <li><a href="#">History</a> </li>
                            <li><a href="#">Our Team</a> </li>
                            <li><a href="#">We are hiring</a> </li>
                        </ul>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                
                <h2>How it Works</h2>
                        <ul>
                            <li><a href="#">login to website</a> </li>
                            <li><a href="#">open dashboard and create blog</a> </li>
                            <li><a href="#">viewers see and like it</a> </li>
                            <li><a href="#">viewers and bloggers satisfaction</a> </li>
                            <li><a href="#">Company is happy</a> </li>
                        </ul>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright ©2021 B2B | Made with
                <a href="" target="_black"><i class="fas fa-heartbeat"></i>
                </a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="./js1/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js1/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js1/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js1/main.js"></script>
    
  </body>
</html>