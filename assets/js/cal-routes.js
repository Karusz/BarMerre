markersLatLng = [];
markers = [];

//Eventek START:
document.getElementById("addAddress").addEventListener("click", () => {
    addAddress();
});

document.getElementById("generateRoute").addEventListener("click", () => {
    generateRoute();
});

document.getElementById("saveRoute").addEventListener("click", () => {
    var name = document.getElementById("name").value;
    var text = document.getElementById("text").value;
    saveRoute(markersLatLng,name,text);
});
//EVENTEK END
//Functions START:
//Sima map
function initMap(){
    
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 47.503, lng: 19.085},
    zoom: 7,
    mapId: '2b208c0b172fcd00'
    });
}

//addAddress
function addAddress(){
    const latLngtext = document.getElementById("barsList").value;
    const latLng = latLngtext.split(";");
    const location = {lat: latLng[0], lng:latLng[1]};
    addMarker(location.lat, location.lng);

}

//generateRoute
function generateRoute(){
    const waypoints = markers.map((marker) => ({
        location: marker.getPosition(),
        stopover: true,
    }));

    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);
    const request = {
        origin: markers[0].getPosition(),
        destination: markers[markers.length - 1].getPosition(),
        waypoints: waypoints.slice(1, -1),
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.WALKING,
    };

    directionsService.route(request, (response, status) => {
    if (status === "OK") {
        directionsRenderer.setDirections(response);
    } else {
        window.alert("Directions request failed due to " + status);
    }
    });
}


//saveRoute
function saveRoute(data,name,text){
    if(markersLatLng.length <= 0){
        window.alert("Készíts egy útvonalat!");
    }else{

        // JavaScript 
        var allrouteLanLng = data.toString(); 
        var name = name;
        var text = text;
        var xhr = new XMLHttpRequest(); 
        xhr.open('POST', 'save_route.php', true); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
        xhr.onreadystatechange = function() { 
        if (xhr.readyState === 4 && xhr.status === 200) { 
            var phpVariable = xhr.responseText; 
            console.log(phpVariable); // This will log the response from the PHP file 
        } 
        };
        xhr.send('allrouteLanLng=' + allrouteLanLng + "&name=" + name + "&text=" + text);
        
    }   

}

//addMarker
function addMarker(lat,lng) {
    const marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat,lng),
        map: map,
    });
    markersLatLng.push(lat+";"+lng);
    markers.push(marker);
    // Eltavolitja, amelyikre nyomsz
    marker.addListener("click", () => {
    deleteMarker(marker);
    });
}

//deleteMarker
function deleteMarker(marker){
    // !!!!!!!!!!!!!!!!!MINDIG AZ UTOLSOT TAVOLITJA EL !!!!!!!!!!!!!!!!!!!!
    marker.setMap(null); // Remove marker from map
    const index = markers.indexOf(marker);
    markers.splice(index, 1); // Remove marker from markers array
}