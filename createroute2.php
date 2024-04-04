<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Route Planner</title>
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
</head>
<body>
<h1>Select Destinations</h1>

<div id="map"></div>
<button id="calculateRoute">Calculate Route</button>
<button onclick="save()">SAVE</button>

<script>
  let map;
  let markers = [];

  function initMap() {
    const myLatlng = { lat: 47.059, lng: 19.360 };
    const mapOptions = {
      center: { lat: 47.48016676754132,lng: 19.044462899437274 }, // Default to New York
      zoom: 8,
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
      content: "",
    });

    infoWindow.open(map);

    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
      // Close the current InfoWindow.
      infoWindow.close();

      // Create a new InfoWindow.
      infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
      });

      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
      );
      
      addMarker(mapsMouseEvent.latLng.toJSON());
    });
  }


  function addMarker(location) {
    const posation = {lat: location.lat, lng: location.lng};
    const marker = new google.maps.Marker({
      position: posation,
      lat: posation.lat,
      lng: posation.lng,
      map: map,
    });
    markers.push(marker);
    console.log(markers);
    

    // Add click event listener to the marker
    marker.addListener("click", () => {
      removeMarker(marker);
    });
  }

  function removeMarker(marker) {
    marker.setMap(null); // Remove marker from map
    const index = markers.indexOf(marker);
    if (index !== -1) {
      markers.splice(index, 1); // Remove marker from markers array
    }
  }

  function calculateRoute() {
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

  document.getElementById("calculateRoute").addEventListener("click", () => {
    calculateRoute();
  });

  document.getElementById("addAddress").addEventListener("click", () => {
    addAddress();
  });
  function saveMarkerPosition(markers) {
  // Get latitude and longitude of the marker
    phpmarks = [];
    for (let i = 0; i < markers.length; i++) {
      const position = markers[i];
      var latitude = position.lat;
      var longitude = position.lng;

      // Prepare data to send to PHP
      var data = {
          latitude: latitude,
          longitude: longitude
      };
      phpmarks.push(data);
    }
    console.log(phpmarks);
    // Send data to PHP script using AJAX
    $.ajax({
        type: 'POST',
        url: 'save_route.php',
        data: data,
        success: function(response) {
            console.log('Marker position saved:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error saving marker position:', error);
        }
    });

    
}

document.getElementById("calculateRoute").addEventListener("click", () => {
  const routeData = {
    origin: markers[0].getPosition(),
    destination: markers[markers.length - 1].getPosition(),
    waypoints: markers.slice(1, -1).map(marker => marker.getPosition())
  };
  
  calculateRoute(routeData);
});

function save(){
  saveMarkerPosition(markers);
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
</body>
</html>
