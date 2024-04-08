<?php
  require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
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
<header>
        <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            <a href="tutorial.php" class="nav-a">Bemutató</a>
            <a href="allroutes.php" class="nav-a">Útvonalak</a>
            <a href="createroute.php" class="nav-a">Tervezés</a>
            <button class="btnLogin dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
                <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$user['id']?>">Beállítások</a></li>
                <li><a class="dropdown-item" href="mailto:barmerre@gmail.com">Kapcsolat</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
        </nav>
    </header>
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
  <div>
    <button id="addAddress">Add Address</button>
    <button id="generateRoute">Generate</button>
    <button id="saveRoute">Save</button>
  </div>
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
        saveRoute(markersLatLng);
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
    function saveRoute(data){
        if(markersLatLng.length <= 0){
            window.alert("Készíts egy útvonalat!");
        }else{

            // JavaScript 
            var allrouteLanLng = data.toString(); 
            var xhr = new XMLHttpRequest(); 
            xhr.open('POST', 'save_route.php', true); 
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
            xhr.onreadystatechange = function() { 
            if (xhr.readyState === 4 && xhr.status === 200) { 
                var phpVariable = xhr.responseText; 
                console.log(phpVariable); // This will log the response from the PHP file 
            } 
            }; 
            xhr.send('allrouteLanLng=' + allrouteLanLng);
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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
</body>
</html>