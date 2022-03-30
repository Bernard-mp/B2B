
<?php 

require_once "db.php";


  // session_start();

  // // If session variable is not set it will redirect to login page

  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  //     header('Location:../login.php');
  //   exit;

  // }

  // $email = $_SESSION['email'];

  

  if (isset($_POST["submit"])) {
    // Add task to DB

    $author = $_GET["id"];
    $title = $_POST['arTitle'];
    $content = $_POST['arContent'];
    $category=$_POST['arCategory'];
    $file=$_FILES["file"]['name'];

    if(file_exists("img/article/".$_FILES["file"]['name'])){
      header('Location:../index.php?imgexist');
    }
    else{

    
             $query="INSERT INTO article(`article_id`,'article_title', 'article_content', 'article_image', 'id_categorie', 'id_author,`article_created_time`) VALUES ('','$title',' $content',' $file','$category','$author','')";

       
     

           $query_run=mysqli_query($connection, $query);

           if($query_run){

          move_uploaded_file($_FILES["file"]["tmp_name"],"../img/article/".$_FILES["file"]["name"]);
         header('Location:../index.php?update');
           }
           else{
            move_uploaded_file($_FILES["file"]["tmp_name"],"../img/article/".$_FILES["file"]["name"]);
            header('Location:../index.php?nopost');
           }
           }

       

  
  }
  




    

   

     
  




?>