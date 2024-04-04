<?php
    require "functions.php";

    if(isset($_POST["reg-btn"])){
        $uname = $_POST['regname'];
        $email = $_POST['regemail'];
        $password = $_POST['regpsw'];
        $repassword = $_POST['regrepsw'];
        if($password == $repassword){
            Reg($uname,$email,$password);
        }else{
            //Nem egyezik a jelszo
        }
        
    }

    if(isset($_POST["login-btn"])){
        if(!empty($_POST['logrem'])){
            $password = $_POST['logpsw'];
            $email = $_POST['logemail'];
            Remember($email,$password);
        }
        $email = $_POST['logemail'];
        $password = $_POST['logpsw'];
        Login($email,$password,$remember);
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarMerre</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    
    <header>
        <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            <a href="index.php" class="nav-a">Kezdőlap</a>
        </nav>
    </header>
    

    <div class="buborek">
        <div class="wrapper">

            
            <div class="form-box login">
                <h2>Bejelentkezés</h2>

                <form action="login.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="logemail" required value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email']; } ?>">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="logpsw" required value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
                        <label>Jelszó</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="logrem">Emlékezz rám</label>
                        <a href="reset.php">Elfelejtett jelszó?</a>
                    </div>
                    <button type="submit" name="login-btn" class="btn">Bejelentkezés</button>
                    <div class="login-register">
                        <p>Nincs fiókod? <a href="#" class="register-link">Regisztráció</a></p>
                    </div>
                </form>
            </div>


            <div class="form-box register">
                <h2>Regisztráció</h2>
                <form action="login.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="regemail" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="Text" name="regname" required>
                        <label>Felhasználónév</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="regpsw" required>
                        <label>Jelszó</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="regrepsw" required>
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

    

    <script src="assets/js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>