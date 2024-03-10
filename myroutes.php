<?php
    require "config.php";
    session_start();

    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="hu">
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
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$user['id']?>">Beállítások</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
        </nav>
    </header>
    <div class="buborek">

    <h2>myroutes.php </h2>
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