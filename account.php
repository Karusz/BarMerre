<?php
    require "config.php";
    $lekerd = "SELECT * FROM users WHERE id=$_GET[id]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- CSS -->
     <link rel="stylesheet" href="assets/css/all-style.css">

    <title>BarMerre</title>
</head>
<body>
<header>
        <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            <a href="tutorial.html">Tutoriál</a>
            <a href="">Útvonalak</a>
            <a href="">Tervezés</a>
            <!-- !!!!IDEIGLENES GOMB!!!! --> <button class="btnLogin" onclick="Logout()">Kijelentkezés</button> <!-- !!!!IDEIGLENES GOMB!!!! -->
        </nav>
    </header>
    <div class="buborek">

    <h2>account.php </h2>
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