

<?php 

 
require_once "db.php";

if (isset($_POST["id"])) {

	$id = $_POST["id"];

	$sql = "DELETE FROM comment WHERE comment_id=$id";




    try {
      $query=mysqli_query($connection,$sql);
      header('Location:../comments.php?deleted');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }

}
else {
	header('Location:../comments.php?del_error');
}

	

?>