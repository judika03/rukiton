<?php
session_start();
   include "source/php/connect.php";
if (empty($_SESSION["email"])) {$login=false;}
else {$login=true;}
?>
<!DOCTYPE html>
<html>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <head>
      <link rel="icon" 
         type="image/png" 
         href="source/images/favicon.ico"/>
      <title> 
        Rukiton : Rumah Sakit Online
      </title>
      <script src="source/js/jquery-1.11.3.min.js"></script>
      <link href="source/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <script src="source/bootstrap/js/bootstrap.min.js" ></script>
      <script src="source/js/rukiton.js" ></script>
	  	 <script src="http://maps.googleapis.com/maps/api/js"></script>


	    <style>

	  div.center {
     float: none;
     margin-left: auto;
     margin-right: auto;
}
#googleMap {
   display: block;
   height: 400px;
}
	  </style>

	  <nav class="navbar navbar-default" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img width=100 src="source/images/rukiton.png" ></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav" style="padding:0px 20px;">
        <li ><a href="index.php" style="font-size:20px;">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#" style="font-size:20px;" onclick="loadPage('about');" >About</a></li>
      </ul>
      
        
      <ul class="nav navbar-nav navbar-right">
	  <?php if($login==true) {
		  $query="select nama, id from user where email='".$_SESSION["email"]."'";
		  $result=mysqli_query($conn, $query);
		  $row=mysqli_fetch_array($result);
		  $nama=$row["nama"];
		  $id=$row["id"];
		  echo '

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> '.$nama.'<span class="caret"></span></a>
          <ul class="dropdown-menu">
		    	<li><a href="#" onclick="loadProfile(\''.$id.'\');">My Profile</a></li>
		    	<li><a href="#" onclick="loadHist(\''.$id.'\');">My History</a></li>
				<li><a href="#" onclick="loadStatus(\''.$id.'\');">Status Booking</a></li>
            <li><a href="source/php/logout.php">Keluar</a></li>
				
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	  ';} else echo '
  

          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
            <div class="dropdown-menu" style="padding: 25px; height:250px;width:200px">
              <form class="form" id="formLogin" action="source/php/login.php"> 
			  <label>Email :</label>
                <input class="form-control" name="email" id="email" type="text" placeholder="Email"> 
			  <label>Password :</label>
                <input class="form-control" name="password" id="password" type="password" placeholder="Password"><br>
                <input type="submit" id="btnLogin" class="btn-success btn-sm" value="Login">
              </form>
			  Belum terdaftar? Daftar <a href="#" onclick="loadRegistration();">disini!</a>
            </div>
          </li>
        </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  '; ?>
</nav>