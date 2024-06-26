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
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/nav-style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    
    <header>
        <a href="index.php" class="logo mx-2 px-2"><h2>BarMerre</h2></a>
        <nav class="navigation">
            <a href="index.php" class="nav-a hideOnMobile">Kezdőlap</a>
            <a class="menu-button px-5" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
            <div class="sidebar">
                <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
                <a href="index.php" class="sidebar-nav-a">Kezdőlap</a>
            </div>
        </nav>
    </header>
    <!-- Modal -->
    <div class="modal fade m-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Adatvédelmi Nyilatkozat</h4>
                        
                    <p>1. Személyes Adatok Gyűjtése és Kezelése</p>
                    <ul>
                        <li>A weboldal regisztrációhoz kötött szolgáltatást nyújt, mely során az alábbi személyes adatokat gyűjtjük: e-mail cím és az Ön 18. életévét betöltötte-e.</li>
                        <li>Az Ön által megadott személyes adatokat bizalmasan kezeljük, és semmilyen körülmények között nem adjuk ki harmadik félnek.</li>
                    </ul>

                    <p>2. Adatkezelési Cél</p>
                    <ul>
                        <li>Az Ön által megadott adatokat kizárólag a weboldal szolgáltatásainak nyújtásához és kommunikációhoz használjuk.</li>
                        <li>Az e-mail címet a weboldal által küldött értesítések, információk és promóciós anyagok továbbítására használjuk.</li>
                    </ul>
                    <p>3. Adatbiztonság</p>
                    <ul>
                        <li>Az adatvédelmi szabályzataink és technikai intézkedéseink biztosítják az adatok biztonságos kezelését és védelmét.</li>
                        <li>Minden szükséges intézkedést megtesszük az adatok jogosulatlan hozzáférés, módosítás vagy illetéktelen megosztás megelőzése érdekében.</li>
                    </ul>
                    <p>4. Harmadik Fél Szolgáltatásai</p>
                    <ul>
                        <li>A weboldal nem felelős harmadik fél által üzemeltetett vagy ellenőrzött weboldalak adatvédelmi gyakorlatáért.</li>
                        <li>Kérjük, ellenőrizze ezeknek a weboldalaknak az adatvédelmi irányelveit, mielőtt személyes adatokat megosztana velük.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                        <input type="Text" name="regname" required maxlength="10">
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
                        <label><input type="checkbox" required>Elfogadom az <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">adatvédelmi szabályzatot</a></label>
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

    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>