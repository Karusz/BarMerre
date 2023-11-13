<?php
    require "functions.php";

    if(isset($_POST['login-btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        Login($username, $password);
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON LINK -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hatter.css">
    <link rel="stylesheet" href="assets/css/reg_login.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <title>BarMerre</title>
</head>
<body>
    <div class="wrapper">


        <div class="bg-szurke regist kozep p-4 text-white">
            <img class="minilogo" src="assets/img/logos/beer.jpg" >
            <h1 class="text-center">Bejelentkezes</h1>
            <form action="regist.php" method="post">
                <div class="i-box">
                    <input type="text" name="username" placeholder="Felhasznalo">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="i-box">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="text" name="password" placeholder="Jelszo">
                </div>
                <div class="btndiv">
                    <input class="btn" type="submit" name="login-btn" value="Bejelentkezes!">
                </div>
                <div class="kukimuki">
                    <p>Nincs meg fiokod?<a href="regist.php">Regisztralj!</a></p>
                </div>
            </form>
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
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
    </div>

    
</body>
</html>