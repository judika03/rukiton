<?php
include "connect.php";

$sql = "SELECT nama, latitude, longitude FROM provinsi";
$result = mysqli_query($conn, $sql);
echo '
 <div class="panel panel-default">
<div class="panel-body">';
echo '<div class="list-group">';
echo '<label>Cari Nama Rumahsakit :</label>
          <input type="text" name="searchID" id="searchID" class="form-control" placeholder="Cari Nama Rumah sakit">
			<br>
	         <button  onclick="SearchHospital(searchID.value);" class="btn btn-default">Cari</button>';
echo '<div style="height:300px;border:0px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';
echo '<hr>';
echo '<label>Pilih Provinsi :</label>';
if (!$result) {
    die(mysqli_error($conn));
echo "Maaf Belum tersedia.";
} else {
    // output data of each row
	 while($row = mysqli_fetch_assoc($result)) {

        echo ('<a class="list-group-item" href="#" onclick="loadCity(\''.$row['nama'].'\'); changemap(\''.$row['latitude'].'\',\''.$row['longitude'].'\', 10);" ><span class="glyphicon glyphicon-map-marker"></span> '.$row['nama'].'</a>');
    }
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
} 

mysqli_close($conn);
?>