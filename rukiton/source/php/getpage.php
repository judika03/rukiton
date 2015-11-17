<?php
session_start();
   include "source/php/connect.php";
   $id=NULL;
if (empty($_SESSION["email"])) {$login=false;}
else {$login=true;}
	if($login=true){
		$sql="select id from user";
		$result=mysqli_query($conn, $sql);
		if(!$result){
			    die(mysqli_error($conn));
		} else{
		$row=mysqli_fetch_array($result);
		$id=$row["id"];
		}
	} 
$kode=$_GET["k"];
   include "connect.php";
   echo '<script src="source/js/rukiton.js" ></script>';
if(!empty($kode)){


$sql = "SELECT nama, alamat, foto, profil,kontak, kode_rumahsakit FROM rumahsakit where kode_rumahsakit='".$kode."'";
$result = mysqli_query($conn, $sql);
$kode_rs=$kode;
echo "<div class='container' >";
if (!mysqli_query($conn,$sql)) {
  die('Error: ' . mysqli_error($conn));
} else{
    // output data of each row
  $row = mysqli_fetch_assoc($result);
  $_SESSION["rs"] = $row["kode_rumahsakit"];
  $kode=$row["kode_rumahsakit"];
	echo '<div class="col-md-6">';
	echo '<div class="panel panel-default" style="padding-left:0px;">
   <div class="panel-heading">';
    echo '<h4>'.$row["nama"].'</h4>';
	echo '</div>
<div class="panel-body">';
	echo '<img class="img-responsive img-rounded" src="'.$row["foto"].'" height=300 width=600><br>';
	echo '<div class="panel-footer">';
	echo '<label>Profil :</label>';
	echo $row["profil"];
	echo '</div>';
	echo '<br>';
	echo '<div class="panel-footer">';
	echo '<label>Alamat :</label>';
	echo $row["alamat"];
	echo '</div>';
	echo '<br>';
	echo '<div class="panel-footer">';
	echo '<label>Kontak :</label>';
	echo '(+62)'.$row["kontak"];
	echo '</div>';
	echo '</div>';
    echo '</div>';
    echo '</div>';
	echo '<div class="col-md-5" id="content">';
	echo '<div class="panel panel-default">
   <div class="panel-heading">';
    echo '<h4>Pilihan Klinik</h4>';
	echo '</div>';
	echo '<div style="height:400px;border:0px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';
	echo '<div class="list-group">';
	$sql="select nama, kode_klinik from klinik where kode_rumahsakit='".$kode."'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
	echo '<a href="#" onclick="loadSlot(\''.$id.'\',\''.$row["kode_klinik"].'\',\''.$kode_rs.'\' );" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> '.$row["nama"].'</a>';
	}
	
	
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo "</div>";
} 

mysqli_close($conn);
} else {
	$_GET["n"]="";
}
?>
   