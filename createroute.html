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
<input type="text" id="addressInput" placeholder="Enter an address">
<button id="addAddress">Add Address</button>
<div id="map"></div>
<button id="calculateRoute">Calculate Route</button>

<script>
  let map;
  let markers = [];

  function initMap() {
    const mapOptions = {
      center: { lat: 47.48016676754132,lng: 19.044462899437274 }, // Default to New York
      zoom: 8,
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // Add click event listener to map
    map.addListener("click", (event) => {
      addMarker(event.latLng);
    });
  }

  function addMarker(location) {
    const marker = new google.maps.Marker({
      position: location,
      map: map,
    });
    markers.push(marker);

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

  function addAddress() {
    const geocoder = new google.maps.Geocoder();
    const address = document.getElementById("addressInput").value;
    geocoder.geocode({ address: address }, (results, status) => {
      if (status === "OK" && results[0]) {
        const location = results[0].geometry.location;
        addMarker(location);
      } else {
        window.alert("Geocode was not successful for the following reason: " + status);
      }
    });
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
  function saveRouteToDatabase(routeData) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_route.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log("Route saved successfully!");
      } else {
        console.error("Error saving route:", xhr.statusText);
      }
    }
  };
  xhr.send(JSON.stringify(routeData));
}

document.getElementById("calculateRoute").addEventListener("click", () => {
  const routeData = {
    origin: markers[0].getPosition(),
    destination: markers[markers.length - 1].getPosition(),
    waypoints: markers.slice(1, -1).map(marker => marker.getPosition())
  };
  calculateRoute(routeData);
  saveRouteToDatabase(routeData); // Call the function to save the route
});

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
</body>
</html>
