<?php
session_start();
include "connect.php";

$kode_klinik=$_GET["kode"];
if (empty($_SESSION["email"])) $login=false;
else $login=true;
if ($login){
	$email=$_SESSION["email"];
$query="select * from user where email='".$email."'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$nama=$row["nama"];
$id=$row["id"];
$nohp=$row["nohp"];
echo '
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulir Booking</h4>
      </div>
      <div class="modal-body">
	  
      <div class="form-group">
    <label for="comment">Nama :</label>
  <input name="name" id="name" type="text" class="form-control" placeholder="Name" aria-describedby="sizing-addon1" value="'.$nama.'" readonly>
</div>

      <div class="form-group">
    <label for="comment">Nomor Hp :</label>
  <input name="nohp" id ="nohp" type="text" class="form-control" placeholder="Nomor HP" aria-describedby="sizing-addon1" value="'.$nohp.'" readonly>
</div>
	  <div class="form-group">
    <label for="comment">Keluhan :</label>
<textarea class="form-control" rows="4" id="keluhan" aria-describedby="sizing-addon1" name="keluhan"></textarea>
</div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-default btn-success "  onclick="sendData(name.value,\''.$id.'\',nohp.value, keluhan.value);" >Registrasi</button>
      </div>
    </div>
';}
	else if(!$login){
		echo '
		<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulir Booking</h4>
      </div>
      <div class="modal-body">
	  <p> Maaf anda harus terdaftar terlebih dahulu.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Batal</button>
        <a href="#" data-dismiss="modal" onclick="loadRegistration(); "> <button type="button" class="btn btn-default btn-success "  >Registrasi</button></a>
      </div>
    </div>';
	}
	?>