<?php
include "connect.php";
$province=$_GET["p"];

$sql = "SELECT nama, latitude, longitude FROM kota where provinsi='".$province."'";
$result = mysqli_query($conn, $sql);
echo '
 <div class="panel panel-default">
   <div class="panel-heading"><h3>Pilih Kota :</h3>
				<a href="#" onclick="loadProvince();"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>	
                </div>
<div class="panel-body">';
echo '<div class="list-group">';
echo '<div style="height:300px;border:0px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';

if (!$result) {
    die(mysqli_error($conn));
echo "Maaf Belum tersedia.";
} else {
    // output data of each row
	 while($row = mysqli_fetch_assoc($result)) {

        echo ('<a class="list-group-item" href="#" onclick="loadHospital(\''.$row['nama'].'\'); changemap(\''.$row['latitude'].'\',\''.$row['longitude'].'\', 15);" ><span class="glyphicon glyphicon-map-marker"></span> '.$row['nama'].'</a>');
    }
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

mysqli_close($conn);
?>