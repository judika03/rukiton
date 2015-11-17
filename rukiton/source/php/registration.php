<?php
session_start();
include "connect.php";

include "Barcode39.php"; 
// escape variables for security
$name = $_GET["name"];
$id = $_GET["id"];
$nohp = $_GET["nohp"];
$keluhan = $_GET["kl"];
$kode_klinik=$_GET["kk"];
$slot=$_GET["slot"];
$uniqueid=uniqid(substr($nohp,5));
$bc = new Barcode39($uniqueid); 
$bc->barcode_text_size = 4; 
$bc->barcode_bar_thick = 3;  
$bc->barcode_bar_thin = 1; 
$sql="INSERT INTO `pesanan`( `id_user`, `nohp`, `id_slot`, `keluhan`, `tanggal_pesanan`, `kode_pesanan`, `status`) VALUES ('$id','$nohp','$slot','$keluhan',NOW(),'$uniqueid', 'pending');";
$query="UPDATE waktu SET status='terpesan' where id='".$slot."'";
	mysqli_query($conn, $query);
$query="INSERT INTO `history_medical`(`id_user`, `kode_klinik`, `keluhan`, `penyakit`, `tgl_transaksi`) VALUES ('$id','$kode_klinik','$keluhan','',NOW())";
mysqli_query($conn, $query);
if (!mysqli_query($conn,$sql)) {
  die('Error: ' . mysqli_error($conn));
}

echo '<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hasil Registrasi</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
  <label >ID User :</label>'.$id.'
</div>
      <div class="form-group">
    <label >No Hp :</label>'.$nohp.'
</div>
     <div class="form-group">
    <label for="comment">Keluhan :</label>'.$keluhan.'
</div>';
$bc->draw("../images/barcode.gif");
echo '<div class="form-group">
  <label >Barcode :</label><img alt="barcode" src="source/images/barcode.gif"/>
</div> <br><label style="color:red;">*Tolong Simpan Barcodenya</label>';
echo '</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-default btn-success " onclick="PrintElem(\'#myModal\');">Cetak</button>
      </div>
    </div>';

mysqli_close($conn);
?>