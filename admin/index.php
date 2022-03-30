
<?php

    ob_start();
    require_once "functions/db.php";

    // Initialize the session

    session_start();

    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

    $email = $_SESSION['email'];

    $sql_posts = "SELECT * FROM article";
    $query_posts = mysqli_query($connection, $sql_posts);
    
    $sql_cat = "SELECT * FROM category";
    $query_cat = mysqli_query($connection, $sql_cat);

    $sql_contacts = "SELECT * FROM contacts";
    $query_contacts = mysqli_query($connection, $sql_contacts);

    $sql_subscribers = "SELECT * FROM subscribers";
    $query_subscribers = mysqli_query($connection, $sql_subscribers);

    $sql_comments = "SELECT * FROM comment";
    $query_comments = mysqli_query($connection, $sql_comments);

    $sql_admin = "SELECT * FROM cadmin";
    $query_admin = mysqli_query($connection, $sql_admin);
    $sql_auth = "SELECT * FROM admin";
    $query_auth = mysqli_query($connection, $sql_auth);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/icon.png">
    <title>Website Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
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
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b><img src="../plugins/images/icon.png" style="width: 30px; height: 30px;" alt="home" /></b><span class="hidden-xs"><b>Company</b></span></a></div>
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
                            </span> 
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Account<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="settings.php"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="functions/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="index.php" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a>
                    </li>
                   
                    
                   <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="posts.php">Posts</a></li>
                        
                            <li><a href="comments.php" class="waves-effect">Categories</a>
                            </li>
                        </ul>
                    </li>
                   
                   <li><a href="inbox.php" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Messages</span></a>
                    </li>

                    <li><a href="subscribers.php" class="waves-effect"><i data-icon="n" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Subscribers</span></a>
                    </li>
                    
                     <li class="nav-small-cap">--- Other</li>

                    <li> <a href="#" class="waves-effect"><i data-icon="H" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Access<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="users.php">Bloggers</a></li>
                            <li><a href="new-user.php">Create Admin</a></li>
                            
                        </ul>
                    </li>
                    
                    <li><a href="functions/logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                   
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $email;?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <?php 

                 if (isset($_GET['set'])) {
                    echo'<div class="alert alert-success" >
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>DONE!! </strong><p> Your password has been successfully updated.</p>
                     </div>';
                        }
 if (isset($_GET['update'])) {
                            echo'<div class="alert alert-success" >
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                           <strong>DONE!! </strong><p> Your details has been successfully updated.</p>
                             </div>';
                                }
                                if (isset($_GET['deleted'])) {
                                    echo'<div class="alert alert-success" >
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                   <strong>DONE!! </strong><p> Your details has been successfully deleted.</p>
                                     </div>';
                                        }
                                        if (isset($_GET['inserted'])) {
                                            echo'<div class="alert alert-success" >
                                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           <strong>DONE!! </strong><p> successfully posted .</p>
                                             </div>';
                                                }
                ?>

                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Company Blog Posts</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php echo mysqli_num_rows($query_posts);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">Blog Comments</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna"><?php echo mysqli_num_rows($query_comments);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">categories</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?php echo mysqli_num_rows($query_cat);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">Administrators</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna"><?php echo mysqli_num_rows($query_admin);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">Contact Messages</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary"><?php echo mysqli_num_rows($query_contacts);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">Company Subscribers</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success"><?php echo mysqli_num_rows($query_subscribers);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">Bloggers</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary"><?php echo mysqli_num_rows($query_auth);?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
             
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                    
                            
                        </div>
                    </div>

                   
                            <!-- <h3 class="box-title">Recent Blog Posts
                              <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                  <option>March 2018</option>
                                  <option>April 2018</option>
                                  <option>May 2018</option>
                                  <option>June 2018</option>
                                  <option>July 2018</option>
                                </select>
                              </div>
                            </h3> -->
                            <div class="row sales-report">
                                <div class="col-md-12 col-lg-6 col-sm-12">
                                    <h2>B2B Company</h2>
                                    <p>Blog Posts</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-success m-t-20"><?php echo mysqli_num_rows($query_posts);?></h1> </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">

                                    <?php
                                             if (mysqli_num_rows($query_posts)==0) {
                                                 echo "<i style='color:brown;'>No Posts Yet :( Upload Company's first blog post today! </i> ";
                                                    }
                                                    else
                                                        
                                                    {
                                                        echo '
                                                             <thead>
                                                            <tr>
                                                                <th>TITLE</th>
                                                                <th>DATE</th>
                                                                <th>COMMENTS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        ';
                                                    }
                                                        $counter = 0;
                                                        $max = 3;

                                                        $sql_posts = "SELECT * FROM article";
                                                        $query_posts = mysqli_query($connection, $sql_posts);
                                                                                                            $counter = 0;
                                                                                                            $max = 3;
                                                    
                                                                                                    while (($row = mysqli_fetch_array($query_posts)) and ($counter < $max) )
                                                                                                    {
                                                                                                        $postid = $row["article_id"];
                                                                                                        $sql2 = "SELECT * FROM comment WHERE id_article=$postid";
                                                                                                        $query2 = mysqli_query($connection, $sql2);
                                                    
                                                                                                  echo '
                                                                                            <tr>
                                                                                                <td class="txt-oflo">'.$row["article_title"].'</td>
                                                                                               <td class="txt-oflo">'.$row["article_created_time"].'</td>
                                                                                                <td><span class="text-success">'.mysqli_num_rows($query2).'</span></td>
                                                                                            </tr>
                                                                                        ';
                                                                                        $counter++;
                                                                                            }
                                    ?>

                                    </tbody>

                                </table> 
                                       <a href="posts.php" class="btn btn-info btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">View All Posts</a>
                                     </div>
                        
                    </div>
                </div>
                <!-- /.row -->
            
                <!-- .right-sidebar -->
               
                <!-- /.right-sidebar -->
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
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome admin',
            text: 'You can do all the activities in this dashboard',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3700,
            stack: 6
        })
    });
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
