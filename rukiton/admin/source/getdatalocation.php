<?php
include "connect.php";
$message="Terhapus";

echo "
								<h2>LOCATION</h2>
								<div class='panel panel-success'></div>								
								<div class='panel panel-success'>			
									<ul class='nav nav-tabs'>
										<li class='active'><a data-toggle='tab' href='#provinsi' style='color:green;'>Provinsi</a></li>
										<li><a data-toggle='tab' href='#kota' style='color:green;'>Kota</a></li>
									</ul>
									<div class='tab-content table-responsive' style='height:75%'>									
";

$sql = "SELECT * FROM provinsi";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo"
									<div id='provinsi' class='tab-pane fade in active'>
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
			echo "								<td><a onclick='alert('Terhapus')' href='?id=$id&type=provinsi' style='color:red;'>X</a></td>
											</tr>
			";
		}		

		echo "
										</table>
										<div style='padding:10px;'><a onclick=\"insertData('provinsi')\"><button type='button' class='btn btn-success'>Tambah</button></a></div>
									</div>
		";
}
 else {
    echo "0";
}


$sql = "SELECT * FROM kota";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo"
									<div id='kota' class='tab-pane fade'>
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
			echo "								<td><a onclick='alert('Terhapus')' href='?id=$id&type=kota' style='color:red;'>X</a></td>
											</tr>
			";
		}		

		echo "
										</table>
										<div style='padding:10px;'><a onclick=\"insertData('kota')\"><button type='button' class='btn btn-success'>Tambah</button></a></div>
									</div>
		";
}
 else {
    echo "0";
}

mysqli_close($conn);
?>