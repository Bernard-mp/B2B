


    
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

$query= "select id from admin where username='$username'";
    $query_run=mysqli_query($connection,$query);
    $author=mysqli_fetch_assoc($query_run);

$author_id = $author['id'];






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
<title>Company Admin | Settings</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
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
                    <a href="#" class="waves-effect active"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Account<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="settings.php"><i class="ti-settings"></i> Password change</a></li>
                        <li><a href="account_setting.php"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="login.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap m-t-10">--- Main Menu</li>
                <li> <a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a>
                </li>
               
                
               <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog<span class="fa arrow"></span></span></a>
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
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Account</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php 

if (isset($_GET['file'])) {
   echo'<div class="alert alert-success" >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>DONE!! </strong><p>not posted</p>
    </div>';
       }
                  

?>

            <!--.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                    <h2>Create BLOG!!!</h2>

<?php
require_once "functions/db.php";
$query="SELECT category_id, category_name FROM category";
$query_run=mysqli_query($connection, $query);
$categories=mysqli_fetch_assoc($query_run);

$query1="SELECT id, name FROM admin where id=$author_id";
$query_run1=mysqli_query($connection, $query1);



?>


<form action="assest/insert.php?type=article" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="arTitle">Title</label>
                            <input type="text" class="form-control" name="arTitle" id="arTitle" required>
                        </div>

                        <div class="form-group">
                            <label for="arContent">Content</label>

                            <textarea class="form-control" name="arContent" id="arContent" rows="3" required></textarea>
                        </div>
<script src="ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('arContent');
</script>
                        <div class="form-group">
                            <label for="arImage">Image</label>
                            <div class="file">
                                <input type="file" for="arImage" class="file" name="arImage" id="arImage" required>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="arCategory">Category</label>
                            <select class="custom-select" name="arCategory" id="arCategory" required>
                                <option disabled>-- Select Category --</option>

                                <?php while($category=mysqli_fetch_array($query_run)){ ?>
                                    <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="arAuthor">Author</label>
                            <select class="custom-select" name="arAuthor" id="arAuthor" required>
                                <option disabled>-- Select Author --</option>

                                <?php while($author=mysqli_fetch_array($query_run1)){ ?>
                                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                                <?php } ?>

                            </select>
                        </div>

                     

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-success btn-lg w-25">Submit</button>
                        </div>
                    </form>
</div>
                </div>
       

            </div>
            <!--./row-->
           
       
           
             
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
<script src="js/jasny-bootstrap.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<!-- CHECK IF PASSWORDS MATCH -->
    
<!--END CHECK IF PASSWORDS MATCH -->

</body>

</html>
