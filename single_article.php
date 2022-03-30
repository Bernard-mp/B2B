<?php include "assest/db.php"; ?>


<?php
$article_id = $_GET['id'];

// Get Article Info
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN `admin` ON `article`.id_author = `admin`.id  WHERE `article_id` = ?");
$stmt->execute([$article_id]);
$article = $stmt->fetch();
$author_id=$article["id_author"];

// Get Category of article
$stmt = $conn->prepare("SELECT * FROM `category` WHERE `category_id` = ?");
$stmt->execute([$article["id_categorie"]]);
$category = $stmt->fetch();

// Get Author's articles
$stmt = $conn->prepare("SELECT article_title, article_id FROM `article` WHERE id_author = ? LIMIT 4");
$stmt->execute([$article["id_author"]]);
$articles = $stmt->fetchAll();

// Get Comments
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN `comment` WHERE `article`.`article_id`= `comment`.`id_article` AND `article`.`article_id` = ? ORDER BY comment_id DESC");
$stmt->execute([$article_id]);
$comments = $stmt->fetchAll();


                
               
                
?>

<!DOCTYPE html>

<link rel="icon" type="image/png" sizes="16x16" href="plugins/images/icon.ico">
<!-- Custom CSS -->

<link rel="stylesheet" href="css/single_article.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="./css1/all.css">
     <link rel="stylesheet" href="css/index.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css1/owl.carousel.min.css">
    <link rel="stylesheet" href="./css1/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css1/aos.css">
    <link rel="stylesheet" href="./css1/Style.css">
    
<title>Single Article</title>

</head>

<body>

    <!-- header -->
    <div class="comments">
      
           
    <a href="index.php" class="waves-effect active"><i data-icon="&#xe020;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Go Back</span></a>
                        <h2 class="text-center text-muted py-3">Full Post </h2>
</div>
    <!-- end of header -->
    <main role="main" class="bg-l py-4">

        <div class="container">

            <div class="row">
           

                <!-- Article -->
                <div class="content bg-white col-lg-9 p-0 border border-muted" style="font-family:Roboto;">

               
                    <!-- Post Image -->
                    <div class="post__img" style="background-image: url('Company_admin/img/article/<?= $article["article_image"] ?>');"></div>

                    <!-- Post Content -->
                    <div class="post__content w-75 mx-auto"  style="font-family:Roboto;">

                        <div class="post-head text-center my-5"  style="font-family:Roboto;">
                            <h1 class="post__title">
                                <?= $article["article_title"] ?>
                            </h1>

                            <div class="post-meta "  style="font-family:Roboto;">
                                <span class="post__date">
                                    <?= date_format(date_create($article["article_created_time"]), "F d, Y ") ?>
                                </span>
                                <a class="post-category" href="articleOfCategory.php?catID=<?= $category['category_id'] ?>" >
                                    <?= $category['category_name'] ?>
                                </a>
                            </div>
                        </div>

                        <div class="post-body text-break"  style="font-family:Roboto;">

                            <?= $article["article_content"] ?>

                        </div>

                        <!-- author Info -->
                        <div class="post-footer d-flex my-5"  style="font-family:Roboto;">

                            
                            <div class="d-flex flex-column justify-content-around">
                                <h3 class="font-italic mb-1"><?= $article['name'] ?></h3>
                                <p class="text-muted mb-1"><?= $article['author_desc'] ?></p>
                                <div class="social_media">
                                    <a href="" class="mr-3"><i class="fab fa-twitter"></i><span class="px-1"><?= $article['author_twitter'] ?></span></a>
                                    <a href="" class="mr-3"><i class="fab fa-github"></i><span class="px-1"><?= $article['author_github'] ?></span></a>
                                    <a href="" class="mr-3"><i class="fab fa-linkedin-square"></i><span class="px-1"><?= $article['author_link'] ?></span></a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div><!-- /Article -->

                <!-- Aside -->
                <div class="aside col-3"  style="font-family:Roboto;">
                    <!-- Author Info -->
                    <div class="p-3 bg-white border  border-muted">
                        <div class="d-flex align-items-center">
                            
                            <h5 class="font-italic m-0"><?= $article['name'] ?></h5>
                        </div>
                        <p class="author_desc p-1"><?= $article['author_desc'] ?></p>
                        <div class="d-flex flex-column justify-content-between">
                            <div class="author_links">
                                <a href="https://twitter.com/<?= $article['author_twitter'] ?>" class="mr-3"><i class="fab fa-lg fa-twitter"></i></a>
                                <a href="https://github.com/<?= $article['author_github'] ?>" class="mr-3"><i class="fab fa-lg fa-github"></i></a>
                                <a href="https://linkedin.com/<?= $article['author_link'] ?>" class="mr-3"><i class="fab fa-lg fa-linkedin-square"></i></a>
                            </div>
                        </div>
                    </div><!-- /Author Info -->

                    <!-- Other articles  -->
                    <!-- <div class="p-3 bg-white border  border-muted">

                            <div class="d-flex align-items-center">
                                <img class="profile-thumbnail rounded-circle" src="img/avatar/<?= $article['author_avatar'] ?>" alt="test avatar image" style="width: 60px;height: 60px;">
                                <h5 class="font-italic"><?= $article['author_fullname'] ?></h5>
                            </div>
                            <p class="author_desc"><?= $article['author_desc'] ?></p>

                        </div> -->
                    <div class="card bg-light my-3">
                        <div class="card-header"><strong> More from <?= $article['name'] ?></strong></div>

                        <ul class="list-group list-group-flush">
                            <?php foreach ($articles as $article) : ?>
                                <li class="list-group-item"><a href="single_article.php?id=<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></li>
                                <!-- <li class="list-group-item"><a href="">How To Create A Simple With CSS</a></li>
                                <li class="list-group-item"><a href="">How To Parallax Style Effect With CSSs</a></li> -->
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- /Other articles  -->


                </div><!-- /Aside -->

            </div>


            <!-- Comments -->
            <div id="comment" class="row"  style="font-family:Roboto;">
                <div class="col-lg-9 border p-4 mt-3 bg-white">

                    <div class="comments">
                        <h2 class="text-center text-muted py-3">Comments</h2>

                        <?php foreach ($comments as $comment) : ?>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 pr-0 text-center">
                                            <img src="img/avatar/def_face.jpg" class="img img-rounded img-fluid w-50" />
                                        </div>
                                        <div class="col-md-10">
                                            <p>
                                                <a class="float-left" href="#"><strong><?= "User-" . $comment['comment_username'] ?></strong></a>
                                                <span class="float-right px-2 text-muted"><?= date_format(date_create($comment['comment_date']), "d F Y h:i") ?></span>
                                            </p>
                                            <div class="clearfix"></div>
                                            <p class="text-secondary mt-2"><?= $comment['comment_content'] ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>

                    <div class="post-comments">

                        <form action="assest/insert.php?type=comment&id=<?= $article_id ?>#comment" method="POST">
                            <div class="form-group mt-3">
                                <input type="hidden" name="username" value="<?= rand() ?>">
                                <input type="hidden" name="auth" value="<?= $author_id ?>">
                                <input type="hidden" name="id_article" value="<?= $article_id ?>">
                                <textarea name="comment" class="form-control" rows="3" placeholder="Add your comment..." required></textarea>
                                <button name="submit" type="submit" class="btn btn-success float-right mt-1">Add Comment</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>

                    </div>


                </div>
            </div><!-- /Comments -->
        </div>

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