<?php
include "connect.php";
$id=$_GET["id"];
$query="SELECT r.nama rumahsakit, k.nama klinik, p.tanggal_pesanan tgl_pemesanan, p.status
status 
FROM rumahsakit AS r
JOIN klinik AS k ON k.kode_rumahsakit = r.kode_rumahsakit
JOIN waktu AS w ON w.kode_klinik = k.kode_klinik
JOIN pesanan AS p ON p.id_slot = w.id
where p.id_user = '".$id."' and p.status='pending';";
$result=mysqli_query($conn, $query);
echo '<div class="container center">
     <div class="col-md-5 center" >
	 <table class="table table-striped table-bordered"><tr><td>Rumah Sakit</td><td>Klinik</td><td>Tanggal Transaksi</td><td>Status</td></tr>
	 ';
	 while($row=mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row["rumahsakit"].'</td>';
		echo '<td>'.$row["klinik"].'</td>';
		echo '<td>'.$row["tgl_pemesanan"].'</td>';
		echo '<td>'.$row["status"].'</td>';
		echo '<tr>';
	 }
	 echo'
	 </table>
</div>
</div>';
mysqli_close($conn);
?>