

<?php 
session_start();
// Database Connectuion
require_once "../functions/db.php";
// UPDATE PASSWORD

	
	if (isset($_POST['submit'])) {

		$password = password_hash($_POST['password'],PASSWORD_BCRYPT,array('cost'=>12));

		$username = $_SESSION['uname'];

			$sql = "UPDATE admin SET password = '$password' WHERE username = '$username' ";

	


    try {
     

        $query=mysqli_query($connection, $sql);
      header('Location:../index.php?set');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }

}


// UPDATE PASSWORD


?>