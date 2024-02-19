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
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="assets/css/style.css">


    
    

    <title>BarMerre</title>
</head>
<body>
    <div class="wrapper">


    <main>
        <div class="container" id="container">
            <div class="form-container sing-up">
                <form action="account.php" method="post">
                    <h1>Regisztracio</h1>
                    <input type="text" name="regname" placeholder="Felhasznalonev">
                    <input type="email" name="regemail" placeholder="Email">
                    <input type="password" name="regpassword" placeholder="Jelszo">
                    <input type="password" name="regrepassword" placeholder="Jelszo ujra">
                    <input type="submit" name="regist-btn" value="Regisztracio">
                </form>
            </div>
            <div class="form-container sing-in">
                
                <form action="account.php" method="post">
                    <h1>Bejelentkezes</h1>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Jelszo">
                    <input type="submit" name="login-btn" value="Bejelentkezes">
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Van mar fiokod?</h1>
                        <p>Jelentkezz be!</p>
                        <button class="hidden" id="login">Bejelentkezes</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Nincs meg fiokod?</h1>
                        <p>Regisztralj be!</p>
                        <button class="hidden" id="regist">Regisztracio</button>
                    </div>
                </div>
            </div>
        </div>
    </main>




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
    <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
    
</body>
</html>
