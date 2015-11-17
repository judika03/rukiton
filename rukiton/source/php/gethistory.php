<?php
include "connect.php";
$id=$_GET["id"];
$query="select * from history_medical where id_user='".$id."'";
$result=mysqli_query($conn, $query);
echo '<div class="container center">
     <div class="col-md-5 center" >
	 <table class="table table-striped table-bordered"><tr><td>Kode Klinik</td><td>Keluhan</td><td>Tanggal Transaksi</td></tr>
	 ';
	 while($row=mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>'.$row["kode_klinik"].'</td>';
		echo '<td>'.$row["keluhan"].'</td>';
		echo '<td>'.$row["tgl_transaksi"].'</td>';
		echo '<tr>';
	 }
	 echo'
	 </table>
</div>
</div>';
mysqli_close($conn);
?>