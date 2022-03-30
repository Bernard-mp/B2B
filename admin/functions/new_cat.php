
<?php 

require_once "db.php";


  // session_start();

  // // If session variable is not set it will redirect to login page

  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  //     header('Location:../login.php');
  //   exit;

  // }

  // $email = $_SESSION['email'];
  $cat = $_POST['cat'];
  

  

  if (isset($_POST["submit"])) {
    // Add task to DB
    $sql = "INSERT INTO category(category_name)
    VALUES ($cat)";

    


    try {
      $query=mysqli_query($connection,$sql);
      header('Location:../index.php?inserted');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
  }













?>