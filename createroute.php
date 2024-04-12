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
<link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
     <link rel="stylesheet" href="assets/css/createroute-style.css">
     <link rel="stylesheet" href="assets/css/nav-style.css">
<title>CreateRoute</title>
</head>
<body>
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
  
  
  <div id="map" class="container d-flex align-items-center justify-content-center"></div>
  <div class="container form-container">
    <div class="row">
    <div class="">
      <?php 
        if(!empty($barid)){
            $found_coord = $conn->query("SELECT * FROM bars WHERE id = $barid");
            $bar = $found_coord->fetch_assoc();
        }
      ?>
      <select name="bar" id="barsList" class="m-1 p-1 col-md-12 form-select">
        <option value="0">Válassz egy kocsmát</option>
        <?php
            $lekerdezes = "SELECT * FROM bars ORDER BY name";
            $found_coords = $conn->query($lekerdezes);
            while($coords=$found_coords->fetch_assoc()){
        ?>
          <option value="<?=$coords['lat'].';'.$coords['lng']?>"> <?=$coords['name']?></option>
        <?php } ?>
      </select>
    </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <button id="addAddress" class="btn-block m-1 p-1 form-control">Hozzáadás</button>
      </div>
      <div class="col-md-3">
        <button id="generateRoute" class="btn-block m-1 p-1 form-control">Tervezés</button>
      </div>
      <div class="col-md-3">
        <input type="text" placeholder="Név" id="name" class="form-control m-1 p-1" required>
      </div>
      <div class="col-md-3">
        <input type="text" placeholder="Leírás" id="text" class="form-control m-1 p-1">
      </div>
      <div class="col-md-12">
        <button id="saveRoute" class="btn-block m-1 p-1 form-control">Mentés</button>
      </div>
    </div>
    
  </div>
<script src="assets/js/main.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&callback=initMap" async defer></script>
<script src="assets/js/cal-routes.js"></script>
</body>
</html>