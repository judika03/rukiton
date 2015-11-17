<?php
session_start();
$col="";
$val="";
$menu=$_SESSION["menu"];
$con=mysqli_connect("localhost", "root", "", "rukiton");
$sql = "SELECT * FROM $menu";
$result = mysqli_query($con, $sql);

if(!$result){
	die(mysqli_error($con));
}
 else{
	if($_POST) {
		$temp="";
		for($i = 0; $i < mysqli_num_fields($result); $i++) {
			$field_info = mysqli_fetch_field($result);
			$col = $col.$field_info->name;
			$temp = $field_info->name;
			$val = $_POST['$temp'];
			echo "$val";
			// $sql = "INSERT INTO $menu ($col) VALUES ($val)";
			// if (mysqli_query($con, $sql)) {
				// echo "1 kolom berhasil ditambah";
			// } else {
				// echo "Error: " . $sql . "<br>" . mysqli_error($con);
			// }
			// echo "1 data berhasil ditambahkan";
			 }
		}
}
?>