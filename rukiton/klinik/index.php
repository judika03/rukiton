<!DOCTYPE html>
<html>
    <head>
		<script src="../source/js/jquery-1.11.3.min.js"></script>
        <script src="../source/bootstrap/js/bootstrap.min.js"></script>
		<link href="../source/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="../source/css/adminstyle.css" rel="stylesheet">
		
		<meta charset="utf-8">
		<title>Admin Klinik- Rumah Sakit Kita</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
    </head>

	
	<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Rumah Sakit Kita<br>Administrator Klinik</h1>
            <div class="account-wall">
				<div class="row col-sm-4 col-sm-offset-4">
					<img class="profile-img" src="../source/images/doctorimg.png">
				</div>
                <form name="login" action="index.php" method = "post" class="form-signin">
					</br>
					<input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
					<input name="password" type="password" class="form-control" placeholder="Password" required autofocus>
					<button class="btn btn-lg btn-success btn-block" type="submit">
						Sign in</button>
					<span class="clearfix"></span>
                </form>				
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "rukiton");

if($_POST) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

$cek = mysqli_query($con, "select * from adminrs where username = '$username' and password = '$password'");
if(mysqli_num_rows($cek)==1){
	$_SESSION['admin'] = $username;
	$hasil = mysqli_fetch_array($cek);
	header("Location: contentAdminRs.php");
	}
	else {
	echo "<br><div class='col-md-offset-5'><a style='color:red;'>Username atau password salah</a></div>";
	}
}
 ?> 