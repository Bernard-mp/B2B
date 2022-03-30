<?php include "assest/db.php"; ?>
<?php
if(isset($_GET['page']))
{
    $page=$_GET['page'];

}else{
    $page=1;
}

$num_per_page=03;
$start_from=($page-1)*$num_per_page;
// Get Latest articles
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT $start_from,$num_per_page");
$stmt->execute();
$articles = $stmt->fetchAll();


$stmt = $conn->prepare("SELECT * FROM `category` ");
$stmt->execute();
$artcat = $stmt->fetchAll();

// Get Categories
$stmt = $conn->prepare("SELECT *,COUNT(*) as article_count FROM `article` INNER JOIN category ON id_categorie=category_id GROUP BY id_categorie");
$stmt->execute();
$categories = $stmt->fetchAll();

// Get Most Read Articles
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id order by RAND() LIMIT 4");
$stmt->execute();
$most_read_articles = $stmt->fetchAll();


?>

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
    <link rel="stylesheet" href="css/i.css">

<!-- 2nd hallf -->
    <link rel="stylesheet" href="./css1/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css1/owl.carousel.min.css">
    <link rel="stylesheet" href="./css1/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css1/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css1/sa.css">
  </head>
  <body>

    <!-- header -->
    <header>
      <nav class = "navbar">
        <div class = "container">
        <div class="top-left-part"><a class="logo" href="index.php"><b style="color:#fff"><img src="plugins/images/png.png" style="width: 100px; height: 40px;" alt="home" /></b></a></div>
          <div class = "navbar-nav">
            <a href = "">Home</a>
           
            <a href = "index.php#content">blog</a>
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
            <div class="site-content">
                <div class="posts">
</br>
                <h1 style="text-align:center"> Latest Articles</h1>

                    <?php foreach ($articles as $article) : ?>

<!-- post -->

<div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div><a class="post-img" href="single_article.php?id=<?= $article['article_id'] ?>">
                                <img src="Company_admin/img/article/<?= $article['article_image']?>" class="img"  alt="no image availabel" width="1856px" height="500px">
                    </a>
                </div>
                            <div class="post-info flex-row">

                                <span><i class="fas fa-bookmark text-gray"></i>&nbsp;&nbsp;<?= $article['category_name'] ?></span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?= date_format(date_create($article['article_created_time']), "F d, Y ") ?></span>
                              
                            </div>
                        </div>
                        <div class="post-title">
                        <a href="single_article.php?id=<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a>
                            <p><?= strip_tags(substr($article['article_content'], 0, 200)) . "..." ?>
                            </p>
                    </br>
                           <a href="single_article.php?id=<?= $article['article_id'] ?>"> <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></a></button>
                        </div>
                    </div>
                    <hr>
<!-- /post -->

<?php endforeach;  ?> 
<div class="pagination flex-row">
                    <?php
$stmt = $conn->prepare("SELECT *FROM `article` ");
$stmt->execute();
$art = $stmt->Rowcount();

$total_pages=ceil($art/$num_per_page);


if(1<$page){
    echo"<a href='index.php?page=".($page-1)."'><h2>Previous</h2></a>";
}

for($i=1;$i<$total_pages;$i++){
    
    
    
    }
    if($i>$page){
        echo"<a href='index.php?page=".($page+1)."'><h2>Next</h2></a>";
    }
?></div>
                    
                       
                    
                </div>
                <aside class="sidebar">
                    <div class="category">
                    </br>
                    </br>
                        <h2>Category</h2>
                        <ul class="category-list">
                        <?php foreach ($artcat as $article) : ?>    
                        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a ><?= $article['category_name'] ?></a>
                    </li>       
<!-- /post -->

<?php endforeach;  ?>
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>Popular Post</h2>

                        <?php foreach ($most_read_articles as $article)  : ?>

<!-- post -->

<div class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                <img src="Company_admin/img/article/<?= $article['article_image']?>" class="img"  alt="no image availabel">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?= date_format(date_create($article['article_created_time']), "F d, Y ") ?></span>
                                    
                                </div>
                            </div>
                            <div class="post-title">
                            <a href="#"><?= $article['article_title'] ?></a>
                            </div>
                        </div>
<!-- /post -->

<?php endforeach;  ?> 

                       
                        
                    
                    
                </aside>
            </div>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>
<div class="process all_pad agileits">
	
	

</div>	
    <!---------------x------------- Main Site Section ---------------x-------------->

  
    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>What are we</h2>
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
                <a href="www.youtube.com/c/dailytuition" target="_black"><i class="fas fa-heartbeat"></i>
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