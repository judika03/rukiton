
   <?php
include "header.php";
include "source/php/Barcode39.php";
$query="select latitude, longitude from province";
$result=mysqli_query($conn, $query);
   ?>
   
	
<script>

var lokasi =new google.maps.LatLng(latitude,longitude);
var map;
var zooms;
var x = document.getElementById("demo");




		var latitude, longitude;
		var bounds = new google.maps.LatLngBounds();
		function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert( "Geolocation is not supported by this browser.");
    }
}
		function showPosition(position) {
    latitude=position.coords.latitude;
    longitude=position.coords.longitude;

}
		getLocation();
		var lokasi =new google.maps.LatLng(latitude,longitude);
var marker=new google.maps.Marker({
  position:lokasi,
  icon:'source/images/hospital_logo.png',
  animation:google.maps.Animation.BOUNCE
  });
  
		
function Gmap() {
	var mapProp = {
    center:new google.maps.LatLng(latitude,longitude),
    zoom:zooms,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
   map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
var marker=new google.maps.Marker({
  position:lokasi,
  icon:'source/images/hospital_logo.png'
  
  });
  function changemap(str1,str2,Zoom){
			latitude=str1;
			longitude=str2;
			zooms=Zoom;
			Gmap();
			<?php
 $query="select latitude,longitude from rumahsakit";
 $result=mysqli_query($conn, $query);
 while($row=mysqli_fetch_array($result)){
 echo 'lokasi=new google.maps.LatLng('.$row["latitude"].','.$row["longitude"].'); ';
 echo 'marker=new google.maps.Marker({
  position:lokasi,
  icon:"source/images/hospital_logo.png",
  });';
 echo 'marker.setMap(map);';
 }
 ?>
		}
		
function initialize() {
	
	loadProvince();
  var mapProp = {
    center:new google.maps.LatLng(latitude,longitude),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
 <?php
 $query="select latitude,longitude from rumahsakit";
 $result=mysqli_query($conn, $query);
 while($row=mysqli_fetch_array($result)){
 echo 'lokasi=new google.maps.LatLng('.$row["latitude"].','.$row["longitude"].'); ';
 echo 'marker=new google.maps.Marker({
  position:lokasi,
  icon:"source/images/hospital_logo.png",
  });';
 echo 'marker.setMap(map);';
 }
 ?>

}


google.maps.event.addDomListener(window, 'load', initialize);
</script>

   </head>
   <body class="background" >
   <div id="indexID">
   <div class="row center">
   <div class="col-md-6" style="padding:0px 50px;">
   
   <div class="jumbotron" id="googleMap" style="height:500px;" ></div>
   </div>
                
                
						

                   
                
	<div class="col-md-5" id="panelID" >
	 
	 	

   </div>
   
   </div>
   </div>
   </body>
      <div id="modalID" class="modal fade" role="dialog" >
  <div class="modal-dialog">



  </div>
</div>
    	<form id="formid" >
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="regist">

  </div>
</div>
</form>
<?php
include "source/html/footer.html";
?>