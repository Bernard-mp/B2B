

<?php 

// Database Connectuion
require_once "db.php";

// UPDATE PASSWORD

	
	if (isset($_POST['submit'])) {

		$password = password_hash($_POST['password'],PASSWORD_BCRYPT,array('cost'=>12));

		$email = $_POST["email"];

			$sql = "UPDATE cadmin SET password = '$password' WHERE email = '$email' ";

	


    try {
        $query=mysqli_query($connection,$sql);
      header('Location:../index.php?set');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }

}


// UPDATE PASSWORD


?>