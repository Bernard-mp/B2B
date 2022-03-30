<?php
$server ="localhost";
$username="root";
$password="";
$database = "b2b";

$conn= mysqli_connect($server ,$username, $password, $database);

if(!$conn){
    dei("<script> alert('connectionfailed.')</script>");
}
?>