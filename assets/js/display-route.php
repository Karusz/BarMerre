<?php
    require "config.php";

    $bars = $conn->query("SELECT * FROM routes WHERE ");

$routeId = 1; // Példa az útvonal egyedi azonosítója

// SQL lekérdezés az útvonalhoz tartozó bárok adatainak lekérésére
$sql = "SELECT r.bars_ids, b.name, b.lat, b.lng
        FROM routes r
        JOIN bars b ON FIND_IN_SET(b.id, r.bars_ids) > 0
        WHERE r.id = $routeId";

$result = $dbConnection->query($sql);

// Változó az útvonalhoz tartozó adatok tárolására
$routeData = [];

if ($result->num_rows > 0) {
    // Adatok feldolgozása és tömbbe helyezése
    while ($row = $result->fetch_assoc()) {
        $routeData[] = $row;
    }
}
?>
<script>
function initMap() {
        // Térkép létrehozása
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12, // Alapértelmezett nagyítási szint
            center: { lat: 47.497912, lng: 19.040235 } // Példa középpont (Budapest)
        });

        // Útvonal létrehozása a bárok koordinátái alapján
        var routeCoordinates = [];
        var routeNames = [];

        <?php foreach ($routeData as $bar) : ?>
            routeCoordinates.push({ lat: <?php echo $bar['lat']; ?>, lng: <?php echo $bar['lng']; ?> });
            routeNames.push('<?php echo $bar['name']; ?>');
        <?php endforeach; ?>

        // Útvonal kirajzolása a térképre
        var routePath = new google.maps.Polyline({
            path: routeCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 3
        });

        routePath.setMap(map);

        // Bárok neveinek megjelenítése információs ablakokban
        for (var i = 0; i < routeCoordinates.length; i++) {
            var marker = new google.maps.Marker({
                position: routeCoordinates[i],
                map: map,
                title: routeNames[i]
            });

            var infoWindow = new google.maps.InfoWindow({
                content: '<strong>' + routeNames[i] + '</strong>'
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }
    }

    // Térkép inicializálása az oldal betöltésekor
    google.maps.event.addDomListener(window, 'load', initMap);
</script>