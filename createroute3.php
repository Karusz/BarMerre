<?php 

	$from = "Budapest, Magyarország";
	$to = "Miskolc, Magyarország";

	if(isset($_POST['caclr'])){
		$from = $_POST['from'];
		$to = $_POST['to'];
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Google Api 2</title>
	</head>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		form{
			margin: 20px;
		}
		#map{
			width: 400px;
			height: 400px;
			margin: 0 auto 20px auto;
			border-radius: 20px;
			box-shadow: 0px 0px 10px #222;
		}
		#output{
			width: 600px;
			margin: 0 auto;
			text-align: center;
			background: #dedede;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #222;
		}
	</style>
	<body>
		<form method="post" action="createroute3.php">
			<input type="text" name="from" id="from" placeholder="From" value="<?= $from; ?>">
			<input type="text" name="to" id="to" placeholder="To" value="<?= $to; ?>">
			<button id="calc" name="caclr">Tervezés</button>
		</form>
		<div id="map"></div>
		<div id="output"></div>
	</body>
</html>
<script>

	function initMap(){
	
		var location = {lat: 47.50356186982569, lng: 19.085582763138646};
		
		var mapOptions = {
			center: location,
			zoom: 7
		};
		
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		
		var directionsService = new google.maps.DirectionsService();
		
		var directionsDisplay = new google.maps.DirectionsRenderer();
		
		directionsDisplay.setMap(map);
		
		function calcRoute(){
			
			var request = {
                origin: waypoints[0].getPosition(),
                destination: waypoints[waypoints.length - 1].getPosition(),
                waypoints: waypoints.slice(1, -1),
				travelMode: google.maps.TravelMode.WALKING,
				unitSystem: google.maps.UnitSystem.METRIC
			}
			
			directionsService.route(request, (result, status) => {
			
				if(status == google.maps.DirectionsStatus.OK){
					
					const output = document.querySelector("#output");
					
					output.innerHTML = "From: " + document.getElementById("from").value + "<br>To: " + document.getElementById("to").value + "<br>Distance: " + result.routes[0].legs[0].distance.text + "<br>Duration: " + result.routes[0].legs[0].duration.text;
					
					directionsDisplay.setDirections(result);
					
				}
				else{
				
					directionsDisplay.setDirections({ routes : []});

					map.setCenter(location);
				
				}
			
			});
			
		}
		
		document.getElementById("calc").addEventListener("click", calcRoute());
		
		var options = {
			types: ["address"],
		}
	
		var input1 = document.getElementById("from");
		var autocomplete1 = new google.maps.places.Autocomplete(input1, options);
	
		var input2 = document.getElementById("to");
		var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
	
	}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
