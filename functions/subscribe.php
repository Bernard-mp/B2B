

<?php

require_once "../Company_admin/functions/db.php";

$email = $_POST['email'];

if (isset($_POST['submit'])) {

	 // Check if email aready exists

      $sql1 = "SELECT id FROM subscribers WHERE email = ?";
      $stmt1 = $db->prepare($sql1);
      $stmt1->execute([$email]);


      if ($stmt1->rowCount()>0) {
          // email already EXISTS
            header ("Location:../subcribe.php?fail");
            // die();
      }

    else
    {
    
	
	$sql = "INSERT INTO subscribers(email)
    VALUES ('$email')";

    


    try {
      $query=mysqli_query($connection,$sql);
      header('Location:../subcribe.php?subscribed');
      // echo "DONE!!";

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }	

}

}






?>