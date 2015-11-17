
var x = document.getElementById("demo");

function updateData(name, email, nohp, nobpjs, id){
$.get("source/php/updateProfile.php?name="+name+"&email="+email+"&nohp="+nohp+"&nobpjs="+nobpjs+"&id="+id,function(data){
	$("#indexID").html(data);
});
alert("Data Berhasil Diubah");
}
  function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function loadSlot(idnya,str,str2,target){
	target = target?target:'#content';

$.get('source/php/getslot.php?id='+idnya+'&k='+str+"&kode="+str2,function(data){
	$(target).html(data);
});

}
function loadPage(str,target){
	target = target?target:'#indexID';

$.get('source/html/about.html',function(data){
	$(target).html(data);
});

}
 function SearchHospital(str,target){
	target = target?target:'#indexID';

$.get('source/php/search.php?search='+str,function(data){
	$(target).html(data);
});

}
 function loadRegistration(target){
	target = target?target:'#indexID';
$.get('source/html/regist.html',function(data){
	$(target).html(data);
});

}
function loadProvince(){
$.get("source/php/getprovince.php",function(data){
	$("#panelID").html(data);
});
}
function openHospital(str){
$.get("source/php/getpage.php?k="+str,function(data){
	$("#indexID").html(data);
});
}
function loadCity(str){
$.get("source/php/getcity.php?p="+str,function(data){
	$("#panelID").html(data);
});
}

function loadHospital(str){
$.get("source/php/gethospital.php?l="+str,function(data){
	$("#panelID").html(data);
});
}
function loadProfile(str){
$.get("source/php/getprofile.php?id="+str,function(data){
	$("#indexID").html(data);
});
}
function loadHist(str){
$.get("source/php/gethistory.php?id="+str,function(data){
	$("#indexID").html(data);
});
}
function loadStatus(str){
$.get("source/php/getstatus.php?id="+str,function(data){
	$("#indexID").html(data);
});
}

function showPosition(position) {
  latitude=position.coords.latitude;
  longitude=position.coords.longitude;	
  changemap(latitude,longitude);
}

