
<?php
    require "config.php";
    session_start();
    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    /*if(isset($_POST['like-btn'])){
      
    }*/
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
     <link rel="stylesheet" href="assets/css/allroutes-style.css">

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

      <div class="row">
          <!-- PHP -->
          <?php
            $route_lekerd = "SELECT * FROM routes";
            $route_talalt = $conn->query($route_lekerd);
            while ($route = $route_talalt->fetch_assoc()){
            
          ?>
          <a href="selectroute.php?id=<?=$route['id']?>">
          <div class="col-6 d-block w-100">
              <div class="container bg-dark text-white p-4 rounded">
                  <div class="row gx-5">
                    <div class="col-lg-8 col-xl-7 col-xxl-6 my-5 text-center text-xl-start">
                      <div class="name display-5 fw-bolder text-white mb-2 "><?= $route['name']; ?></div>
                      <div class="lead fw-normal text-white-50 mb-4">Készítő: <?php if($user['id'] == $route['creator_id']){ echo $user['username'];} ?></div>
                      <div class="lead fw-normal text-white-50 mb-4">Leírás: <?= $route['text']; ?></div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end align-items-md-end">
                        <div class="lead fw-normal text-white-50 mb-4">Likes: <?=$route['likes']?></div>
                    </div>
                  </div>
              </div>
          </div>
          </a>
          <!-- while end -->
          <?php } ?>
          
              
          
          
      </div>
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
    <script>
        function Logout() {
            window.location="logout.php";
        }
    </script>
    
</body>
</html>