<?php
  require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TEST2</title>
<style>
		*{
			margin: 0;
			padding: 0;
		}
		#map{
			width: 80%;
			height: 80vh;
			margin: 50px auto;
			border-radius: 30px;
			box-shadow: 0px 0px 10px #222;
		}
	</style>
</head>
<body>
    <h1>TEST2</h1>
    <div>
        <?php 
            if(!empty($barid)){
                $found_coord = $conn->query("SELECT * FROM bars WHERE id = $barid");
                $bar = $found_coord->fetch_assoc();
            }
            
            ?>
            <select name="bar" id="barsList">
                    <option value="0">Valassz</option>
                <?php
                    $lekerdezes = "SELECT * FROM bars ORDER BY name";
                    $found_coords = $conn->query($lekerdezes);
                    while($coords=$found_coords->fetch_assoc()){
                ?>
                    <option value="<?=$coords['lat'].';'.$coords['lng']?>"> <?=$coords['name']?></option>
                <?php } ?>
            </select>
            
    </div>
<button id="addAddress">Add Address</button>
<button id="generateRoute">Generate</button>
<button id="saveRoute">Save</button>
<div id="map"></div>

<script>
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
        saveRoute();
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

        //A kijeloleseket eltunteti. Csak az marad, amit legeneralt
        for (let i = 0; i < markers.length; i++) {
            deleteMarker(markers[i]);            
        }
    }


    //saveRoute
    function saveRoute(){
        
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
        const index = markersLatLng.indexOf(marker);
        markersLatLng.splice(index, 1); // Remove marker from markers array
        console.log(markersLatLng);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
</body>
</html>