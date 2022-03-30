
<?php
    
    ob_start();
    require_once "functions/db.php";

    // Initialize the session

    session_start();

    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['uname']) || empty($_SESSION['uname'])){

      header("location: login.php");

      exit;
    }

    $username = $_SESSION['uname'];
    
    $query= "select * from admin where username='$username'";
    $query_run=mysqli_query($connection,$query);
    $author=mysqli_fetch_assoc($query_run);
    $author_id = $author['id'];

    $query3= "select * from article where id_author='$author_id'";
    $query_run3=mysqli_query($connection,$query3);
   
    $sql_posts = "SELECT * FROM article WHERE id_author='$author_id'";
    $query_posts = mysqli_query($connection, $sql_posts);
    

    $sql = "SELECT * FROM comment";

    $query = mysqli_query($connection, $sql);

    if(mysqli_num_rows($query_posts)>0){
        while ($row = mysqli_fetch_array($query_posts))
                {
                    $blogid = $row['article_id'];
                    $sql2 = "SELECT * FROM comment WHERE auth_id='$author_id'";
                      $query2i = mysqli_query($connection, $sql2);
                      $sql3 = "SELECT * FROM comment WHERE auth_id='$author_id'limit 2";
                      $query3 = mysqli_query($connection, $sql3);
                
               
                }}else
                {
                    $sql2 = "SELECT * FROM zero";
                      $query2i = mysqli_query($connection, $sql2);
                }

?>
<?php
                                                while ($row = mysqli_fetch_array($query_run3))
                                                        {
                                                            $blogid = $row["article_id"];
                                                            $sql2 = "SELECT * FROM comment WHERE auth_id='$author_id'";
                                                              $query2 = mysqli_query($connection, $sql2);
                                                        }
                                                        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/icon.ico">
    <title>Company Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part"><a class="logo" href="index.php"><b><img src="../plugins/images/png.png" style="width: 50px; height: 40px;" alt="home" /></b><span class="hidden-xs"><b>  Company</b></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                   
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    
                    <!-- /.dropdown -->
                    
                  

                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Account<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="settings.php"><i class="ti-settings"></i> Password Setting</a></li>
                            <li><a href="account_setting.php"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="login.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a>
                    </li>
                   
                    
                   <li> <a href="#" class="waves-effect active"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog<span class="fa arrow"></span></span></a>
                       <ul class="nav nav-second-level">
                            <li><a href="posts.php">All Posts</a></li>
                            <li><a href="new-post.php">Create Post</a></li>
                            <li><a href="comments.php" class="waves-effect">Comments</a>
                            </li>
                        </ul>
                    </li>
                   
                  
                    
                     <li class="nav-small-cap">--- Other</li>
                    
                   
                    
                    <li><a href="login.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                   
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"> You are Onboard "<?php echo $username;?>"</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Comments</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- row -->
                            <div class="row">
                               
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mail_listing">
                                    <div class="inbox-center">


                                        <?php
                                    if (isset($_GET["deleted"])) {
                                        echo 
                                        '<div class="alert alert-warning" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>DELETED!! </strong><p> The comment has been successfully deleted.</p>
                                        </div>'
                                        ;
                                    }
                                    elseif (isset($_GET["del_error"])) {
                                        echo 
                                        '<div class="alert alert-danger" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                        </div>'
                                        ;
                                    }
                                ?>  



                                        
                                                        <h4>Recent Posts Comments (<b style="color: orange;"><?php echo mysqli_num_rows($query2i);?></b>)</h4>
                                                        <?php 
                                                             if (mysqli_num_rows($query)==0) {
                                                                echo "<i style='color:brown;'>No Comments Yet :( </i> ";}
                                                        ?>
                                                    
                                                         <div class="comment-center">

                                                             <?php
                                                
                                                              while ($row2 = mysqli_fetch_assoc($query2i)) {
                                                                $blogid1 = $row2["id_article"];
                                                                $title = "SELECT * FROM article WHERE article_id='$blogid1'";
                                                              $tit = mysqli_query($connection, $title);
                                                              while ($row = mysqli_fetch_array($tit))
                                                              {$cmt=$row2["comment_id"];
                                                                  
                                                echo
                                              '<div class="comment-body">
                                                            <div class="mail-contnet">
                                                                <b>'.$row2["comment_username"].'</b>
                                                                <h5>Blog Title : '.$row["article_title"].'</h5>
                                                                <span class="mail-desc">
                                                                '.$row2["comment_content"].'
                                                                </span><a href="javacript:void(0)" class="action" data-toggle="modal" data-target="#responsive-modal'.$row2["comment_id"].'"><i class="ti-close text-danger"></i></a> <span class="time pull-right">'.$row2["comment_date"].'</span></div>
                                                                </div>
                                                                
                                                        <!-- /.modal -->
                                                        <div id="responsive-modal'.$row2["comment_id"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Are you sure you want to delete this comment?</h4></div>
                                                                    <div class="modal-footer">
                                                                    <form action="functions/del_comment.php" method="post">
                                                                    <input type="hidden" name="id"  value="'.$cmt.'"/>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <!-- End Modal -->
            
                                                         

                                                        ';

                                                            } }

                                                            ?>

                                                    </div>
                                                                            
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-xs-5 m-t-20">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2021 &copy; B2B </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
