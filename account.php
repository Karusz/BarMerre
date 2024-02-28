<?php
    require "config.php";
    require "functions.php";

    if(isset($_POST['login-btn'])){
        $email = $_POST['login-email'];
        $password = $_POST['login-psw'];
        $cbx = $_POST['rem-cbx'];

        Login($email,$password,$cbx);
    }


    if(isset($_POST['reg-btn'])){
        $password = $_POST['reg-psw'];
        $repassword = $_POST['regre-psw'];

        if($password == $repassword){
            $uname = $_POST['reg-uname'];
            $email = $_POST['reg-email'];
            Regist($uname,$email,$password);
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarMerre</title>
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/account.css">
</head>
<body>
    
    <header>
        <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin">Login</button>
        </nav>
    </header>
    <div class="buborek">
        <div class="wrapper">

            <span class="icon-close">
                <ion-icon name ="close"></ion-icon>
            </span> 

            <div class="form-box login">
                <h2>Bejelentkezés</h2>
                <form action="account.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="login-email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="login-psw" required>
                        <label>Jelszó</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="rem-cbx">Emlékezz rám</label>
                        <a href="#">Elfelejtett jelszó?</a>
                    </div>
                    <button type="submit" name="login-btn" class="btn">Bejelentkezés</button>
                    <div class="login-register">
                        <p>Nincs fiókod?<a href="#" class="register-link">Regisztráció</a></p>
                    </div>
                </form>
            </div>


            <div class="form-box register">
                <h2>Regisztráció</h2>
                <form action="account.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="reg-email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="Text" name="reg-uname" required>
                        <label>Felhasználónév</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="reg-psw" required>
                        <label>Jelszó</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="regre-psw" required>
                        <label>Jelszó újra</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" required>Betöltöttem a 18. életévemet</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" required>Elfogadom az <a href="#" target="_blank">adatvédelmi szabályzatot</a></label>
                    </div>
                    <button type="submit" name="reg-btn" class="btn">Regisztrálok</button>
                    <div class="login-register">
                        <p>Van fiókod? <a href="#" class="login-link">Bejelentkezés</a></p>
                    </div>
                </form>
            </div>
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
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>