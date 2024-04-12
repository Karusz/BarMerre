<?php
    require "config.php";
    session_start();
    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    $id=$_GET['id'];
    $lekerd = "SELECT * FROM routes WHERE id = $id";
    $talalt = $conn->query($lekerd);
    $route = $talalt->fetch_assoc();

    $creator_lekerd = "SELECT * FROM users WHERE id = $route[creator_id]";
    $creator_talalt = $conn->query($creator_lekerd);
    $creator = $creator_talalt->fetch_assoc();

    if(isset($_POST['post-btn'])){
        $text = $_POST['text'];
        $conn->query("INSERT INTO comments VALUES(id, $id, $_SESSION[userid], '$text')");
    }

    if(isset($_POST['delete-comment-btn'])){
        $comment_id = $_GET['commentid'];
        $conn->query("DELETE FROM comments WHERE id=$comment_id");

    }

    if(isset($_POST['like-btn'])){
        
        $route_id = $_GET['routeid'];
        $conn->query("INSERT INTO likes VALUES(id, $route_id, $_SESSION[userid])");
    }

    if(isset($_POST['unlike-btn'])){
        $route_id = $_GET['routeid'];
        $conn->query("DELETE FROM likes WHERE user_id = $_SESSION[userid] AND route_id = $route_id");
    }

    if(isset($_POST['delete-btn'])){
        $route_id = $_GET['routeid'];
        $conn->query("DELETE FROM routes WHERE creator_id = $_SESSION[userid] AND id = $route_id");
        header("Location: myroutes.php");
    }
    if(isset($_POST['googlemaps-btn'])){
        $routeId = $id; 

    $sql = "SELECT b.name AS bar_name, b.address AS bar_address, b.lat AS bar_latitude, b.lng AS bar_longitude FROM routes r JOIN bars b ON FIND_IN_SET(b.id, r.bars_ids) > 0 WHERE r.id = $routeId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $waypoints = [];
        while ($row = $result->fetch_assoc()) {
            $barName = $row['bar_name'];
            $barAddress = $row['bar_address'];
            $barLatitude = $row['bar_latitude'];
            $barLongitude = $row['bar_longitude'];

            $waypoints[] = "$barLatitude,$barLongitude";
        }

        $destination = end($waypoints); 
        $waypointsString = implode('|', $waypoints);

        $currentLocation = "";

        echo "<script>
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const userLat = position.coords.latitude;
                        const userLng = position.coords.longitude;
                        const userLocation = userLat + ',' + userLng;
                        window.location.href = 'https://www.google.com/maps/dir/?api=1&origin=' + userLocation + '&destination=$destination&waypoints=$waypointsString&travelmode=walking';
                    });
                } else {
                    alert('A helymeghatározás nem támogatott a böngésződben.');
                }
            </script>";
    } else {
        echo "Nincsenek adatok az útvonalhoz.";
    }
        }

        $routeId = $id;
        
        $sql = "SELECT r.bars_ids, b.name, b.lat, b.lng
                FROM routes r
                JOIN bars b ON FIND_IN_SET(b.id, r.bars_ids) > 0
                WHERE r.id = $routeId";
        
        $result = $conn->query($sql);
        
        $routeData = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $routeData[] = $row;
            }
        }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $route['name'] ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/nav-style.css">
    <link rel="stylesheet" href="assets/css/selectroute-style.css">
    <script>var latLngs = [];</script>
</head>
<body class="d-flex flex-column h-100">
    
<header>
      <a href="index.php" class="logo mx-2 px-2"><h2>BarMerre</h2></a>
      <nav class="navigation">
          <a href="allroutes.php" class="nav-a hideOnMobile">Útvonalak</a>
          <a href="createroute.php" class="nav-a hideOnMobile">Tervezés</a>
          <a class="nav-a hideOnMobile" href="contact.php">Kapcsolat</a>
          <button class="btnLogin dropdown-toggle hideOnMobile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?=$user['username']?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark hideOnMobile">
              <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
              <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
              <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
          </ul>
          <a class="menu-button" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
          
          
          <div class="sidebar">
          <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
          <a href="contact.php.php" class="nav-a active">Kapcsolat</a>
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
          </div>
      </nav>
      
  </header>
  <div class="bg-dark container py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"><?= $route['name'] ?></h1>
                                <p class="lead fw-normal text-white-50 mb-4"><?= $route['text'] ?></p>
                                <p class="lead fw-normal text-white-50 mb-4">Készítő: <?php if(mysqli_num_rows($creator_talalt) == 0){echo "Törölt felhasználó";}else{echo $creator['username'];}  ?></p>
                                <p class="lead fw-normal text-white-50 mb-4">Kocsmák:
                                    <?php
                                        $barids = $route['bars_ids'];
                                        $ids = explode(",",$barids);

                                        $kocsmanevek = "";
                                        for ($i=0; $i < count($ids); $i++) { 
                                            $lekerd = "SELECT * FROM bars WHERE id = $ids[$i]";
                                            $talalt = $conn->query($lekerd);
                                            $bar = $talalt->fetch_assoc();
                                            $kocsmanevek .= $bar['name']. ", ";
                                        }
                                        echo $kocsmanevek;
                                        
                                    ?>
                                </p>
                                <?php
                                    $like_lekerd = "SELECT * FROM likes WHERE route_id = $route[id] AND user_id = $_SESSION[userid]";
                                    $like_talat = $conn->query($like_lekerd);
                                    
                                ?>
                                <p class="lead fw-normal text-white-50 mb-4">Likes: <?= mysqli_num_rows($like_talat); ?></p>
                                <?php
                                    if($route['creator_id'] != $_SESSION['userid']){
                                        if(mysqli_num_rows($like_talat) == 0){
                                            $like = $like_talat->fetch_assoc();
                                    
                                ?>
                                    <form action="selectroute.php?id=<?=$id?>&routeid=<?=$route['id']?>" method="post">
                                        <button class="btn btn-primary" name="like-btn">Like</button>
                                        <button class="btn btn-primary" name="googlemaps-btn">Google maps generálása</button>
                                    </form>
                                <?php
                                    }else{
                                ?>
                                    <form action="selectroute.php?id=<?=$id?>&routeid=<?=$route['id']?>" method="post">
                                        <button class="btn btn-primary" name="unlike-btn">Unlike</button>
                                        <button class="btn btn-primary" name="googlemaps-btn">Google maps generálása</button>
                                    </form>
                                <?php }}else{ ?>
                                    <form action="selectroute.php?id=<?=$id?>&routeid=<?=$route['id']?>" method="post">
                                        <button class="btn btn-danger" name="delete-btn">Törlés</button>
                                        <button class="btn btn-primary" name="googlemaps-btn">Google maps generálása</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block" id="map"><h2>ASD</h2></div>
                    </div>
                </div>
            </div>
    
    <div class="container-fluid bg-dark mt-5">
        <div class="m-2">
            <h2 class="text-white text-center">Komment szekció</h2>
        </div>
        <div class="mt-2 justify-content-center align-items-center">
            <form action="selectroute.php?id=<?=$id?>" method="post">
            <div class="input-group p-3">
                <input type="text" class="form-control" name="text" placeholder="Kommentelj">
                <button class="btn btn-primary" name="post-btn">Küldés</button>
            </div>
            </form>
        </div>
        <?php
            $talalt_user = $conn->query("SELECT * FROM users");
            $user = $talalt_user->fetch_assoc();

            $com_lekerd = "SELECT * FROM comments WHERE route_id = $id ORDER BY id DESC";
            $com_talalt = $conn->query($com_lekerd);
            while($comment = $com_talalt->fetch_assoc()){
                $user_lekerd = "SELECT * FROM users WHERE id = $comment[user_id]";
                $user_talat = $conn->query($user_lekerd);
                $user = $user_talat->fetch_assoc();
            
        ?>
        <div>
            <h5 class="text-white" <?php if($route['creator_id'] == $comment['user_id']){echo 'style="color:red !important"';}?>><?php if(empty($user['username'])){echo "Törölt felhsználó";}else{ echo $user['username'];}?></h5>
            <p class="text-white" <?php if($route['creator_id'] == $comment['user_id']){echo 'style="color:red !important"';}?>><?= $comment['text']?></p>
            
            <?php
                if($comment['user_id'] == $_SESSION['userid'] || $route['creator_id'] == $_SESSION['userid']){
                    echo '<form action="selectroute.php?id='.$id.'&commentid='.$comment['id'].'" method="post"><button class="btn btn-primary mb-2" name="delete-comment-btn">Komment Törlés</button></form>';
                }
            ?>
            
        </div>
        <?php } ?>
        
    </div>
    <div id="map"></div>
    <div class="buborek">
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
    <script src="assets/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
    <script>
        
        function initMap() {
            
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12, 
                center: { lat: 47.497912, lng: 19.040235 },
                mapId: '2b208c0b172fcd00'
            });

            
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true 
            });

            
            var waypoints = [];
            <?php foreach ($routeData as $bar) : ?>
                waypoints.push({
                    location: new google.maps.LatLng(<?php echo $bar['lat']; ?>, <?php echo $bar['lng']; ?>),
                    stopover: true
                });

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $bar['lat']; ?>, <?php echo $bar['lng']; ?>),
                    map: map,
                    title: '<?php echo $bar['name']; ?>'
                });
            <?php endforeach; ?>

            var request = {
                origin: waypoints[0].location,
                destination: waypoints[waypoints.length - 1].location,
                waypoints: waypoints.slice(1, waypoints.length - 1),
                optimizeWaypoints: true,
                travelMode: 'WALKING'
            };

            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                } else {
                    window.alert('Nem sikerült útvonalat találni a megadott pontok között: ' + status);
                }
            });
        }
    </script>
</body>
</html>