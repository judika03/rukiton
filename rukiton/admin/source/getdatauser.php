<?php
include "connect.php";
$message="Terhapus";

echo "
								<h2>LOCATION</h2>
								<div class='panel panel-success'></div>								
								<div class='panel panel-success'>			
									<ul class='nav nav-tabs'>
										<li class='active'><a data-toggle='tab' href='#user' style='color:green;'>User</a></li>
										<li><a data-toggle='tab' href='#pesanan' style='color:green;'>Pesanan</a></li>
									</ul>
									<div class='tab-content table-responsive' style='height:75%'>									
";

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo"
									<div id='user' class='tab-pane fade in active'>
										<!-- Table -->
										<table class='table table-striped'>
											<tr>
			";
		for($i = 0; $i < mysqli_num_fields($result); $i++) {
		$field_info = mysqli_fetch_field($result);
		echo "
											<th style='color:green;'>{$field_info->name}</th>";
		}
		echo "								<th style='color:green;'>Delete</th>";
		
		while($row = mysqli_fetch_row($result)){
			$id=$row[0];
			echo "							<tr>
			";
			foreach($row as $_column) {
				echo "							<td>{$_column}</td>
				";
			}
			echo "								<td><a onclick='alert('Terhapus')' href='?id=$id&type=user' style='color:red;'>X</a></td>
											</tr>
			";
		}		

		echo "
										</table>
										<div style='padding:10px;'><a onclick=\"insertData('user')\"><button type='button' class='btn btn-success'>Tambah</button></a></div>
									</div>
		";
}
 else {
    echo "0";
}


$sql = "SELECT * FROM pesanan";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo"
									<div id='pesanan' class='tab-pane fade'>
										<!-- Table -->
										<table class='table table-striped'>
											<tr>
			";
		for($i = 0; $i < mysqli_num_fields($result); $i++) {
		$field_info = mysqli_fetch_field($result);
		echo "
											<th style='color:green;'>{$field_info->name}</th>";
		}
		echo "								<th style='color:green;'>Delete</th>";
		
		while($row = mysqli_fetch_row($result)) {
			$id=$row[0];
			echo "							<tr>
			";
			foreach($row as $_column) {
				echo "							<td>{$_column}</td>
				";
			}
			echo "								<td><a onclick='alert('Terhapus')' href='?id=$id&type=pesanan' style='color:red;'>X</a></td>
											</tr>
			";
		}		

		echo "
										</table>
										<div style='padding:10px;'><a onclick=\"insertData('pesanan')\"><button type='button' class='btn btn-success'>Tambah</button></a></div>
									</div>
		";
}
 else {
    echo "0";
}

mysqli_close($conn);
?>