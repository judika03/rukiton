<?php
include "connect.php";
$search=$_GET["search"];
$query="select * from rumahsakit where nama like '$search%'";
$result=mysqli_query($conn,$query );

	echo '
	<div class="container center">
     <div class="col-md-5 center" >
   <div class="panel panel-default">
   <div class="panel-heading">
                   		<h3>Search</h3>	<br>
                </div>
<div class="panel-body">';
echo '<div class="list-group">';
		echo '<div style="height:400px;border:0px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';
    while($row = mysqli_fetch_assoc($result)) {

        echo ('<a class="list-group-item" href="#" onclick="openHospital(\''.$row['kode_rumahsakit'].'\');" ><span class="glyphicon glyphicon-plus"></span> '.$row['nama'].'</a>');
    }
	echo '</div>';
	echo '</div>';
echo '</div>';



?>
