<?php
include "connect.php";
$name=$_GET["name"];
$email=$_GET["email"];
$nohp=$_GET["nohp"];
$nobpjs=$_GET["nobpjs"];
$id=$_GET["id"];
$sql="UPDATE `user` SET `nama`='$name',`email`=$email',`nohp`='$nohp',`nobpjs`='$nobpjs' WHERE id='".$id;."'";
mysqli_query($conn, $sql);
header('location:index.php');
?>