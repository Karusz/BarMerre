<?php
    require "config.php";
    require "functions.php";
    if(isset($_POST['forgot-btn'])){
        $email = $_POST['email'];
        

        $lekerd = "SELECT * FROM users WHERE email = '$email'";
        $talalt = $conn->query($lekerd);
        if(mysqli_num_rows($talalt) == 0){
            echo '<script>alert("Még nem regisztráltál!")</script>';
        }else{
            $code = CodeGenerate(5);
            $text = "Kód a bejeneltkezéshez";
            $body = "Ezzel a kóddal tudsz egyszer bejelentkezni. Kérjük, hogy bejelentkezés után EGYBŐL változtasd meg a jelszavadat!<br><br><h2>Egyszer használatos jelszó: $code</h2>";
            
            emailsend($email,$text,$body);
            $conn->query("INSERT INTO forgotlogins VALUES(id, '$email', $code, 1)");
        }
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
    <link rel="stylesheet" href="assets/css/nav-style.css">
</head>
<body>
    
<header>
    <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            
            <a href="tutorial.php" class="nav-a hideOnMobile">Bemutató</a>
            <a href="allroutes.php" class="nav-a hideOnMobile">Útvonalak</a>
            <a href="createroute.php" class="nav-a hideOnMobile">Tervezés</a>
            <button class="btnLogin dropdown-toggle hideOnMobile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark hideOnMobile">
                <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
                <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
                <li><a class="dropdown-item" href="mailto:barmerre@gmail.com">Kapcsolat</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
            <a class="menu-button" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
            
            
            <div class="sidebar">
            <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
            <a href="tutorial.php" class="nav-a active">Bemutató</a>
            <a href="allroutes.php" class="nav-a">Útvonalak</a>
            <a href="createroute.php" class="nav-a">Tervezés</a>
            <button class="btnLogin dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
                <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
                <li><a class="dropdown-item" href="mailto:barmerre@gmail.com">Kapcsolat</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
            </div>
        </nav>
        
    </header>
    

    <div class="buborek">
        <div class="wrapper">
            <?php
                if(!isset($_GET['stat'])){

            
                    if(!isset($_GET['code'])){
            ?>
                    <div class="form-box login">
                    <h2>Jelszó Emlékeztető</h2>

                    <form action="reset.php?stat=send" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <button type="submit" name="forgot-btn" class="btn">Email küldése</button>
                    </form>
                    </div>

                <?php
                    }else{
                ?>
                    <div class="form-box login">
                    <h2>Jelszó Megváltoztatása</h2>

                    <form action="reset.php" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="psw" required>
                            <label>Jelszó</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="repsw" required>
                            <label>Jelszó újra</label>
                        </div>
                    </form>
                    </div>

                    </div>
                <?php }}else{ ?>
                    <div class="form-box login">
                    <h2>Email elküldve</h2>
                    </div>
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

    
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>