<?php
    require "config.php";
    session_start();
    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    $from = "";
	$to = "";
    $to2 = '';

	if(isset($_POST['caclr'])){
		$from = $_POST['from'];
		$to = $_POST['to'];
	}
?>
<!DOCTYPE html>
<html lang="hu">
    <style>
        form{
			margin: 20px;
		}
        #map{
			width: 40em;
			height: 30em;
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">

    <title>BarMerre</title>
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
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
        </nav>
    </header>
    <div class="buborek">

        <form method="post" action="createroute.php">
			<input type="text" name="from" id="from" placeholder="From" value="<?php if(!empty($from)){echo $from;} ?>">
			<input type="text" name="to" id="to" placeholder="To" value="<?php if(!empty($to)){echo $to;} ?>">
			<button id="calc" name="caclr">Tervezés</button>
		</form>
		<div id="map"></div>
		<div id="output"></div>
        
    
        <!-- Buborekok -->
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
    </div>


    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&libraries=places&callback=initMap"></script>
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
            origin: document.getElementById("from").value,
            destination: document.getElementById("to").value,
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
    <script>
        function Logout() {
            window.location="logout.php";
        }
    </script>
</body>
</html>