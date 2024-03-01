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
</body>
</html>