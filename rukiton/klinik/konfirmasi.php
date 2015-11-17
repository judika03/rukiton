<?php
session_start();
include "connect.php";
   echo '<script src="../source/js/rukiton.js" ></script>';
$id=$_GET["id"];

$query="select * from user where id=$id";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$nama=$row["nama"];
$ttl=$row["tgl_lahir"];
$nohp=$row["nohp"];
$nobpjs=$row["nobpjs"];
echo '
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulir Booking</h4>
      </div>
      <div class="modal-body">
	  
      <div class="form-group">
    <label for="comment">Nama :</label>
  <input name="name" id="name" type="text" class="form-control" placeholder="Name" aria-describedby="sizing-addon1" value="'.$nama.'">
</div>
  <div class="form-group">
  <label for="comment">Tanggal Lahir :</label>
  <input name="ttl" id="ttl" type="date" class="form-control" aria-describedby="sizing-addon1" value="'.$ttl.'">
</div>

      <div class="form-group">
    <label for="comment">Nomor Hp :</label>
  <input name="nohp" id ="nohp" type="text" class="form-control" placeholder="Nomor HP" aria-describedby="sizing-addon1" value="'.$nohp.'">
</div>
      <div class="form-group">
    <label for="comment">Nomor BPJS :</label>
  <input name="nobpjs" id ="nobpjs" type="text" class="form-control" placeholder="Nomor BPJS" aria-describedby="sizing-addon1" value="'.$nobpjs.'">
</div>
     <div class="form-group">
    <label for="comment">Keluhan :</label>
<textarea name="keluhan" id="keluhan" class="form-control" rows="5" id="comment"></textarea>
</div>
<label style="color:red;">*Masukan Nomor BPJS jika ada</label><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-default btn-success "  onclick="sendData(name.value, ttl.value,nohp.value,keluhan.value);" >Registrasi</button>
      </div>
    </div>
';
	?>