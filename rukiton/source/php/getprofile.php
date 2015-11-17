<?php
include "connect.php";
echo '<script src="source/js/rukiton.js"></script>';
echo '<script src="../rukiton.js"></script>';
$id=$_GET["id"];
$query="select * from user where id='".$id."'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$nama=$row["nama"];
$email=$row["email"];
$nohp=$row["nohp"];
$nobpjs=$row["nobpjs"];
echo '<div class="container center">
     <div class="col-md-5 center" >
   <div class="panel panel-default">
<div class="panel-body">
	 <h3>My Profile</h3>
     <div class="form-group">
    <label for="comment">Nama :</label>
  <input name="name" id="name" type="text" class="form-control" placeholder="Name" aria-describedby="sizing-addon1" value="'.$nama.'">
</div>
     <div class="form-group">
    <label for="comment">Email :</label>
  <input name="email" id="email" type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1" value="'.$email.'">
</div>
     <div class="form-group">
    <label for="comment">Nomor Hp :</label>
  <input name="nohp" id="nohp" type="text" class="form-control" placeholder="Nomor Hp" aria-describedby="sizing-addon1" value="'.$nohp.'">
</div>
  <div class="form-group">
    <label for="comment">Nomor BPJS :</label>
  <input name="nobpjs" id="nobjps" type="number" class="form-control" placeholder="Nomor BPJS" aria-describedby="sizing-addon1" value="'.$nobpjs.'">
</div>
<input class="btn btn-success" type="button" value="Simpan" onclick="updateData(name.value, email.value, nohp.value, nobpjs.value);">
	</div>
</div>
</div>';
mysqli_close($conn);
?>