<?php
session_start();
include "connect.php";
$nama= mysqli_real_escape_string($conn, $_POST['name']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$password=md5(mysqli_real_escape_string($conn, $_POST['password']));
$nohp=mysqli_real_escape_string($conn, $_POST['nohp']);

$query="INSERT INTO `user`(`nama`, `email`, `password`, `nohp`, `tgl_daftar`) VALUES ('$nama','$email','$password','$nohp',NOW())";
mysqli_query($conn, $query);
$_SESSION["email"]=$email;
header('location:../../index.php');
?>