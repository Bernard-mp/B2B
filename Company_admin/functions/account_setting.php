

<?php 
session_start();
// Database Connectuion
require_once "../functions/db.php";
// UPDATE PASSWORD

	
	if (isset($_POST['update'])) {

		$password = password_hash($_POST['password'],PASSWORD_BCRYPT,array('cost'=>12));
        $name= $_POST['authName'];
        $desc= $_POST['authDesc'];
        $email= $_POST['authEmail'];
        $twit= $_POST['authTwitter'];
        $git= $_POST['authGithub'];
        $link= $_POST['authLinkedin'];
        
		$username = $_SESSION['uname'];

			$sql = "UPDATE admin SET password = '$password',name = '$name',email = '$email',author_desc = '$desc',	author_twitter = '$twit',author_github = '$git',author_link = '$link' WHERE username = '$username' ";

	


    try {
     

        $query=mysqli_query($connection, $sql);
      header('Location:../index.php?update');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }

}


// UPDATE PASSWORD


?>