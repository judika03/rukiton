<?php
session_start();
//date_default_timezone_set('Asia/Jakarta');
//$timezone = date_default_timezone_get();
//$date = date('G:i', time());
//echo "The current server timezone is: " . $date;
include "connect.php";
echo '
      <script src="source/js/jquery-1.11.3.min.js"></script>';
	  echo '<script src="source/js/rukiton.js"></script>';
	  echo '<script src="source/js/bootstrap-datepicker.js"></script>';
	  echo '<link rel="stylesheet" href="source/css/datepicker.css">';
      echo '<link href="source/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
      echo '<script src="source/bootstrap/js/bootstrap.min.js" ></script>';
echo '
<script>
var slot;
function changeslot(str){
	slot=str;
}
function loadRegist(str){
	$.get("source/php/registrasi.php?kode="+str,function(data){
	$("#regist").html(data);
});
}
</script>
';
$id=$_GET["id"];
	$klinik=$_GET["k"];
$kode_rumahsakit=$_GET["kode"];
if ($id==NULL) {
	$query="select id, status, waktu from waktu where kode_klinik='".$klinik."'";
$result = mysqli_query($conn, $query);
	echo '<div class="col-md-7">';
	echo '<div class="panel panel-default">
   <div class="panel-heading">';
	echo "<h3>Pilihan Slot : </h3>";
	echo '<a href="#" onclick="openHospital(\''.$kode_rumahsakit.'\');"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>';
	echo '</div>';
	echo '<div class="panel-body">';
	$i=0;
    while($row = mysqli_fetch_assoc($result)){
		$i+=1;
		if(($row["status"]=="kosong")){
			
		echo 'Slot '.$i.': <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="loadRegist(\''.$klinik.'\'); changeslot(\''.$row["id"].'\');">'.$row["waktu"].'</a><br>';
		} if (($row["status"]=="terpesan")){
		echo 'Slot '.$i.': <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="loadRegist(\''.$klinik.'\'); changeslot(\''.$row["id"].'\');" disabled>'.$row["waktu"].'</a><br>';
		}
	}
	echo '</div>';
	echo '</div>';
	echo '<script>
	
	function sendData(nama,id,nohp,nobpjs,keluhan){
$.get("source/php/registration.php?&name="+nama+"&id="+id+"&nohp="+nohp+"&kl="+keluhan+"&slot="+slot+"&kk="+\''.$klinik.'\',function(data){
	$("#regist").html(data);
});
 return false;
}
</script>
';
//nanti dipisah
echo "<style>.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px; /* Adjusts for spacing */
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}</style>";
    echo '</tr></thead></table>';
echo '

';
}
 else{
	 	$query="select status from pesanan where id_user='".$id."'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
if($row["status"]!="pending"){
	$query="select id, status, waktu from waktu where kode_klinik='".$klinik."'";
$result = mysqli_query($conn, $query);
	echo '<div class="col-md-7">';
	echo '<div class="panel panel-default">
   <div class="panel-heading">';
	echo "<h3>Pilihan Slot : </h3>";
	echo '<a href="#" onclick="openHospital(\''.$kode_rumahsakit.'\');"><span class="glyphicon glyphicon-chevron-left"></span>Kembali</a>';
	echo '</div>';
	echo '<div class="panel-body">';
	$i=0;
    while($row = mysqli_fetch_assoc($result)){
		$i+=1;
		if(($row["status"]=="kosong")){
			
		echo 'Slot '.$i.': <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" onclick="loadRegist(\''.$klinik.'\'); changeslot(\''.$row["id"].'\');">'.$row["waktu"].'</a><br>';
		} if (($row["status"]=="terpesan")){
		echo 'Slot '.$i.': <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="loadRegist(\''.$klinik.'\'); changeslot(\''.$row["id"].'\');" disabled>'.$row["waktu"].'</a><br>';
		}
	}
	echo '</div>';
	echo '</div>';
	echo '<script>
	
	function sendData(nama,id,nohp,nobpjs,keluhan){
$.get("source/php/registration.php?&name="+nama+"&id="+id+"&nohp="+nohp+"&kl="+keluhan+"&slot="+slot+"&kk="+\''.$klinik.'\',function(data){
	$("#regist").html(data);
});
 return false;
}
</script>
';
//nanti dipisah
echo "<style>.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px; /* Adjusts for spacing */
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}</style>";
    echo '</tr></thead></table>';
echo '

';
}
}


mysqli_close($conn);
?>