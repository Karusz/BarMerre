<?php
  require "config.php";
  session_start();
  $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
  $talalt = $conn->query($lekerd);
  $user = $talalt->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
     <link rel="stylesheet" href="assets/css/createroute-style.css">
<title>CreateRoute</title>
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
  
  <div id="map"></div>
  <div class="container d-flex align-items-center justify-content-center">
    <button id="addAddress" class="m-1 p-1">Add Address</button>
    <button id="generateRoute" class="m-1 p-1">Generate</button>
    <input type="text" placeholder="Név" id="name" class="m-1 p-1" require>
    <input type="text" placeholder="Leírás" id="text" class="m-1 p-1">
    <button id="saveRoute" class="m-1 p-1">Save</button>
    
    
  </div>

<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
<script src="assets/js/cal-routes.js"></script>
</body>
</html>