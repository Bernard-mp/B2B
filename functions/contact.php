
<?php

require_once "../Company_admin/functions/db.php";

$names = $_POST['names'];
$email = $_POST['email'];
$message = $_POST['message'];

if (isset($_POST['submit'])) {
	
	$sql = "INSERT INTO contacts(names, email, message)
    VALUES ('$names','$email','$message')";

   


    try {
        $query=mysqli_query($connection,$sql);
      header('Location:../contact.php?sent');
      // echo "DONE!!";

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }	

}






?>