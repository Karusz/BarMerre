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