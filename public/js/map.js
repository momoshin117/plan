function initMap() {
   /*
   var latitude = document.getElementById('js_latitude');
    var longitude = document.getElementById('js_longitude');
    
    var MyLatLng = new google.maps.LatLng(latitude, longitude);
   */
    var MyLatLng = new google.maps.LatLng(43.06409677626992, 142.63144456810434);
    var Options = {
        zoom: 15,      
        center: MyLatLng, 
        mapTypeId: 'roadmap' 
    };

    var map = new google.maps.Map(document.getElementById('map'), Options);

    new google.maps.Marker({
        position: MyLatLng,
        map,
    //    title:document.getElementById('js_spot_name'),
        title:"星野リゾートトマム"
    });
}

