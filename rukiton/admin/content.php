
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Rumah Sakit Kita</title>
    <link href="../source/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../source/css/simple-sidebar.css" rel="stylesheet">
    <link href="../font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
</head>

<script>

function  loadDataHospital(str){
	$.get("source/getdatahospital.php?l="+str,function(data){
	$("#contents").html(data);
});
}

function  loadDataLocation(str){
	$.get("source/getdatalocation.php?l="+str,function(data){
	$("#contents").html(data);
});
}

function  loadDataUser(str){
	$.get("source/getdatauser.php?l="+str,function(data){
	$("#contents").html(data);
});
}

function  loadDataAdmin(str){
	$.get("source/getdataadmin.php?l="+str,function(data){
	$("#contents").html(data);
});
}

function  loadHospital(str){
	$.get("../source/php/gethospital.php?l="+str,function(data){
	$("#contents").html(data);
});
}

function  insertData(str){
	$.get("insert.php?menu="+str,function(data){
	$("#contents").html(data);
});
}
</script>
	
	<?php
	session_start();
	$admin=$_SESSION['admin'];
	$con=mysqli_connect("localhost", "root", "", "rukiton");
	if($admin) {
			
		if(isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$type = $_GET['type'];
			$sql = "DELETE FROM $type WHERE id=$id";
			if (mysqli_query($con, $sql)) {
				$success = "1 pesan terhapus";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		
		echo "
		<body>
			<nav class='navbar navbar-default no-margin' style='background:#397E39; border-color:#247E2F'>
				<div class='container-fluid'>
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class='navbar-header'>
						<button class='navbar-toggle collapsed' data-toggle='collapse'  id='menu-toggle'><span class='glyphicon glyphicon-th-large' aria-hidden='true'></span></button>
						<button class='navbar-toggle collapse in' data-toggle='collapse' id='menu-toggle-2'> <span class='glyphicon glyphicon-th-large' aria-hidden='true'></span></button>
						<a class='navbar-brand' style='color:#fff' href='#'><i class='fa fa-user fa-4'></i> ADMINISTRATOR</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>

						<ul class='nav navbar-nav navbar-right'>
							<li class='dropdown'>
								<a href='#' class='dropdown-toggle' style='color:white' data-toggle='dropdown'><i class='fa fa-bell'></i> <b class='caret'></b></a>
								<ul class='dropdown-menu alert-dropdown'>
									<li><a href='#'>Alert Name <span class='label label-default'>Alert Badge</span></a></li>
									<li><a href='#'>Alert Name <span class='label label-primary'>Alert Badge</span></a></li>
									<li><a href='#'>Alert Name <span class='label label-success'>Alert Badge</span></a></li>
									<li><a href='#'>Alert Name <span class='label label-info'>Alert Badge</span></a></li>
									<li><a href='#'>Alert Name <span class='label label-warning'>Alert Badge</span></a></li>
									<li><a href='#'>Alert Name <span class='label label-danger'>Alert Badge</span></a></li>
									<li class='divider'></li>
									<li><a href='#'>View All</a></li>
								</ul>
							</li>
							<li class='dropdown'>
								<a href='#' class='dropdown-toggle' style='color:white' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$admin<span class='caret'></span></a>
								<ul class='dropdown-menu'>
									<li><a href='#'><i class='fa fa-fw fa-user'></i> Profile</a></li>
									<li><a href='#'><i class='fa fa-fw fa-envelope'></i> Inbox</a></li>
									<li><a href='#'><i class='fa fa-fw fa-gear'></i> Settings</a></li>
									<li class='divider'></li>
									<li><a href='logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div id='wrapper'>
				<!-- Sidebar -->
				<div id='sidebar-wrapper'>
					<ul class='sidebar-nav nav-pills nav-stacked' id='menu'>
						<li>
							<a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-home fa-stack-1x '></i></span>Home</a>
						</li>
						<li>
							<a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-users fa-stack-1x '></i></span> Users</a>
							<ul class='nav-pills nav-stacked' style='list-style-type:none;'>  
								<li><a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-user fa-stack-1x'></i></span>Admin</a></li>
								<li><a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-user fa-stack-1x'></i></span>Hospital Admin</a></li>
								<li><a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-user fa-stack-1x'></i></span>User</a></li>
							</ul>
						</li>
						<li>
							<a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-hospital-o fa-stack-1x '></i></span> Hospitals</a>
							<ul class='nav-pills nav-stacked' style='list-style-type:none;'>
		";
		$query="Select nama from kota";
		$hasil=mysqli_query($con, $query);
		
		while($row=mysqli_fetch_array($hasil)){
			echo ('<li><a href="#" onclick="loadHospital(\''.$row['nama'].'\');"><span class="fa-stack fa-lg pull-left"><i class="fa fa-map-pin  fa-stack-1x"></i></span>'.$row['nama'].'</a></li>');
					
		}
		echo "
							</ul>
						</li>
						<li>
							<a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-bar-chart fa-stack-1x '></i></span> Statistic</a>
							<ul class='nav-pills nav-stacked' style='list-style-type:none;'>
								<li><a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-line-chart fa-stack-1x'></i></span>User</a></li>
								<li><a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-line-chart fa-stack-1x'></i></span>Hospital</a></li>
							</ul>
						</li>

						<li>
							<a href='#'><span class='fa-stack fa-lg pull-left'><i class='fa fa-pencil-square-o fa-stack-1x'></i></span> CRUD Data</a>
							<ul class='nav-pills nav-stacked' style='list-style-type:none;'>
								<li><a href='#' onclick=\"loadDataHospital(".$row['nama'].");\"><span class='fa-stack fa-lg pull-left'><i class='fa fa-pencil fa-stack-1x'></i></span>Hospitals</a></li>
								<li><a href='#' onclick=\"loadDataLocation(".$row['nama'].");\"><span class='fa-stack fa-lg pull-left'><i class='fa fa-pencil fa-stack-1x'></i></span>Location</a></li>
								<li><a href='#' onclick=\"loadDataUser(".$row['nama'].");\"><span class='fa-stack fa-lg pull-left'><i class='fa fa-pencil fa-stack-1x'></i></span>User</a></li>
								<li><a href='#' onclick=\"loadDataAdmin(".$row['nama'].");\"><span class='fa-stack fa-lg pull-left'><i class='fa fa-pencil fa-stack-1x'></i></span>Admin</a></li>
							</ul>
						</li>						
						
					</ul>
				</div><!-- /#sidebar-wrapper -->
				<!-- Page Content -->
				<div id='page-content-wrapper'>
					<div class='container-fluid xyz'>
						<div class='row'>
							<div class='col-lg-12'>
								<div id='contents'>
									ini mau diganti tapi nggak bisa bisa
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /#page-content-wrapper -->
			</div>
			

			
			<!-- /#wrapper -->
		    <!-- jQuery -->
		<script src='../source/js/jquery-1.11.3.min.js'></script>
		<script src='../source/bootstrap/js/bootstrap.min.js'></script>
		<script src='../source/js/sidebar-menu.js'></script>
			
		</body>
			";	
				
	} else {
		header("Location: index.php");
	}	
	?>		
    
</html>