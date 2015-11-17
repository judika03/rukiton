<?php
session_start();
include "connect.php";
$email= mysqli_real_escape_string($conn, $_GET['email']);
$password= md5(mysqli_real_escape_string($conn, $_GET['password']));
$query="select * from user where email='$email' and password='$password'";
$result=mysqli_query($conn, $query);
$num_rows=mysqli_num_rows($result);
if($num_rows!=1){ 
    header('location:../../index.php?error=4');
    break;
} else {
	$_SESSION["email"]=$email;
	header('location:../../index.php');
}


?>