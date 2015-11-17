<?php
	session_start();
	$con=mysqli_connect("localhost", "root", "", "rukiton");
	$menu = $_GET['menu'];
    if($menu == "") {
echo "kosong coy";
    }
	$_SESSION["menu"]="$menu";
	echo "
		<h2>$menu</h2>
		<div class='panel panel-success'></div>								
		<div class='panel panel-success'><br>		

	";
	if($_SESSION['admin']) {
		$sql = "SELECT * FROM $menu";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo"
					<form action='insertquery.php' method='post'>
					";
				for($i = 0; $i < mysqli_num_fields($result); $i++) {
					$field_info = mysqli_fetch_field($result);
					echo "
							<input type='text' name='{$field_info->name}' placeholder='{$field_info->name}'</input>";
				}
				echo "
					<br><button class='btn btn-success' type='submit'>Tambahkan</button>
					</form>
				";
		}		
	}
?>		