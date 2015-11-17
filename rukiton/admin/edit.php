<html>
	<head>
		<script src="../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		
		<meta charset="utf-8">
		<title>Admin - Ojeku | Grab the ojek just in one touch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<?php
	session_start();
	$con=mysqli_connect("localhost", "root", "", "ojekku");
	$success = "";
	
	function IsNullOrEmptyString($question){
        return (!isset($question) || trim($question)==='');
    }
	
	$id = substr($_GET['id'], 0, strpos($_GET['id'], ","));
	$menu = substr($_GET['id'], strpos($_GET['id'], ",")+1);
        if($id == "" || $menu =="") {
            header("Location: ../admin/content.php");
            exit();
        }
  
	if($_SESSION['admin']) {
		echo "
		<body>
		<nav class='navbar navbar-inverse' style='background-color:green; border-color:green'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='../admin/content.php' style='font-size: 26px;'>Admin</a>
                </div>
				<div>
					<ul class='nav navbar-nav navbar-right'>
						<li><a href='logout.php'><span class='glyphicon glyphicon-off'></span> Sign Out</a></li>
					</ul>
				</div>
            </div>
        </nav>
		
		<div class='container'>
          	<h1>ADMINISTRATOR</h1>
            <a href='content.php'><button type='button' class='btn btn-success'>Kembali</button></a><br><br>
		";
		if($menu == "profil"){
			$sql = "SELECT * FROM profil WHERE id='$id'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$nama = $row['nama'];
			$umur = $row['umur'];
			$nomor_hp = $row['nomor_hp'];
			$id_pangkalan = $row['id_pangkalan'];			
			$jam_kerja = $row['jam_kerja'];

			if($_POST) {
				$nama = mysqli_real_escape_string($con, $_POST['nama']);
				$umur = mysqli_real_escape_string($con, $_POST['umur']);
				$nomor_hp = mysqli_real_escape_string($con, $_POST['nomor_hp']);
				$id_pangkalan = mysqli_real_escape_string($con, $_POST['id_pangkalan']);
				$jam_kerja = mysqli_real_escape_string($con, $_POST['jam_kerja']);
				
				if(!IsNullOrEmptyString($nama) && !IsNullOrEmptyString($umur) && !IsNullOrEmptyString($nomor_hp) && !IsNullOrEmptyString($id_pangkalan)) {
					$sql = "UPDATE profil set nama='$nama', umur='$umur', nomor_hp='$nomor_hp', id_pangkalan='$id_pangkalan', jam_kerja='$jam_kerja' WHERE id='$id'";

					if (mysqli_query($con, $sql)) {
						$success = "1 driver berhasil diubah";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				} else {
					$success = "Harap masukkan Nama, Umur, ID Pangkalan, dan Nomor HP";
				}
			}
			
			echo "
                <form action='' method='post'>
                    <input type='text' name='nama' placeholder='Nama' required value='$nama'>
                    <input type='text' name='umur' placeholder='Umur' required value='$umur'>
                    <input type='text' name='nomor_hp' placeholder='Nomor Handphone' required value='$nomor_hp'>
					<input type='text' name='id_pangkalan' placeholder='ID Pangkalan' required value='$id_pangkalan'>
                    <input type='text' name='jam_kerja' placeholder='Jam Kerja' required value='$jam_kerja'>
                    <button class='btn btn-success' type='submit'>Terapkan</button>
                </form>
			";
		}
		
		if($menu == "pangkalan"){
			$sql = "SELECT * FROM pangkalan WHERE id='$id'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$nama_pangkalan = $row['nama_pangkalan'];
			$koordinat_satu = $row['koordinat_satu'];
			$koordinat_dua = $row['koordinat_dua'];

			if($_POST) {
				$nama_pangkalan = mysqli_real_escape_string($con, $_POST['nama_pangkalan']);
				$koordinat_satu = mysqli_real_escape_string($con, $_POST['koordinat_satu']);
				$koordinat_dua = mysqli_real_escape_string($con, $_POST['koordinat_dua']);
								
				if(!IsNullOrEmptyString($nama_pangkalan) && !IsNullOrEmptyString($koordinat_satu) && !IsNullOrEmptyString($koordinat_dua)) {
					$sql = "UPDATE pangkalan set nama_pangkalan='$nama_pangkalan', koordinat_satu='$koordinat_satu', koordinat_dua='$koordinat_dua' WHERE id='$id'";

					if (mysqli_query($con, $sql)) {
						$success = "1 pangkalan berhasil diubah";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				} else {
					$success = "Harap masukkan Nama Pangkalan, koordinat_satu, dan koordinat_dua";
				}
			}
			
			echo "
                <form action='' method='post'>
                    <input type='text' name='nama_pangkalan' placeholder='Nama Pangkalan' required value='$nama_pangkalan'>
                    <input type='text' name='koordinat_satu' placeholder='koordinat_satu' required value='$koordinat_satu'>
                    <input type='text' name='koordinat_dua' placeholder='koordinat_dua' required value='$koordinat_dua'>
                    <button class='btn btn-success' type='submit'>Terapkan</button>
                </form>
			";
		}
		
		if($menu == "penjemputan"){
			$sql = "SELECT * FROM titik_jemput WHERE id='$id'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$lokasi = $row['lokasi'];
			$koordinat_satu = $row['koordinat_satu'];
			$koordinat_dua = $row['koordinat_dua'];
			$id_pangkalan = $row['id_pangkalan'];
			$jarak = $row['jarak'];

			if($_POST) {
				$lokasi = mysqli_real_escape_string($con, $_POST['lokasi']);
				$koordinat_satu = mysqli_real_escape_string($con, $_POST['koordinat_satu']);
				$koordinat_dua = mysqli_real_escape_string($con, $_POST['koordinat_dua']);
				$id_pangkalan = mysqli_real_escape_string($con, $_POST['id_pangkalan']);
				$jarak = mysqli_real_escape_string($con, $_POST['jarak']);
								
				if(!IsNullOrEmptyString($lokasi) && !IsNullOrEmptyString($koordinat_satu) && !IsNullOrEmptyString($koordinat_dua) && !IsNullOrEmptyString($id_pangkalan)) {
					$sql = "UPDATE titik_jemput set lokasi='$lokasi', koordinat_satu='$koordinat_satu', koordinat_dua='$koordinat_dua', id_pangkalan='$id_pangkalan', jarak='$jarak' WHERE id='$id'";

					if (mysqli_query($con, $sql)) {
						$success = "1 titik_jemput berhasil diubah";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				} else {
					$success = "Harap masukkan Lokasi, koordinat_satu, koordinat_dua, dan Id_Pangkalan";
				}
			}
			
			echo "
                <form action='' method='post'>
                    <input type='text' name='lokasi' placeholder='Lokasi' required value='$lokasi'>
                    <input type='text' name='koordinat_satu' placeholder='koordinat_satu' required value='$koordinat_satu'>
                    <input type='text' name='koordinat_dua' placeholder='koordinat_dua' required value='$koordinat_dua'>
					<input type='text' name='id_pangkalan' placeholder='Id_Pangkalan' required value='$id_pangkalan'>
                    <input type='text' name='jarak' placeholder='Jarak' required value='$jarak'><br><br>
                    <button class='btn btn-success' type='submit'>Terapkan</button>
                </form>
			";
		}
		
		echo "
			<h5>$success</h5>
		</div>
		</body>";
		

	} else {
		header("Location: signout.php");
		exit();
	}
?>		
</html>